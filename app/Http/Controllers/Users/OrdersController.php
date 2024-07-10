<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CheckOutValidation;
use App\Jobs\SendEmailJob;
use App\Jobs\SendNotificationAdminJob;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Notifications\TestPusherNotification;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //
    public function index(){
        $orders = Order::where([
            'user_id' => auth()->user()->id,
        ])->latest();
        if(request()->has('status')){
            $orders =  $orders->where('status', request('status'));
        }
        $orders = $orders->get();
        $status = request()->has('status') ? request('status') : 'all';
        return view('user.orders.index',compact('orders','status'));
    }

    public function show(Order $order){
        $order = $order->load('order_details.item','address','coupon');
        $user = auth()->user();
        return view('user.orders.show',compact('order','user'));
    }

    public function cancel(Request $request, Order $order){
        $order->update(['status' => 'canceled']);
        session()->flash('success', __('translation.Order canceled successfully'));
        return redirect()->back();
    }

    public function checkout(CheckOutValidation $request){
        $data = $request->validated();
        $cartitems = Cart::with('item')->where('user_id', auth()->user()->id)->get();

        /** check cart is empty */
        if(count($cartitems)==0){
            session()->flash('error', __('translation.Oops! It seems like your cart is empty. Please add items to your cart before proceeding.'));
            return redirect()->back();
        }

        /** load user with applied coupon and coupon users */
        $user = auth()->user()->load('appliedcoupon.couponusers');

        /**store order with initial data */
        $data['user_id'] = $user->id;
        $data['order_id'] = generate_code_unique();
        if($user->appliedcoupon){
            $data['coupon_id'] = $user->appliedcoupon->id;
        }
        $order = Order::create($data);

        /** store order details */
        $result = 0;
        foreach($cartitems as $cartitem){
            $total_price = $cartitem->quantity * $cartitem->item->total_price;
            $orderDetail = OrderDetail::create([
                'item_id' => $cartitem->item_id,
                'order_id' => $order->id,
                'quantity' => $cartitem->quantity,
                'total_price' =>  $total_price,
            ]);
            $result += $total_price ;

            /**reset user cart */
            $cartitem->delete();

            /**load item */
            $orderDetail = $orderDetail->load('item');

            /**minus quantity */
            $orderDetail->item->update([
                'quantity' => $orderDetail->item->quantity - $cartitem->quantity
            ]);
        }

        //update order if coupon is applied
        $updatedData = [
            'total_price' => $result,
            'subtotal' => $result
        ];

        if($user->appliedcoupon){
            $updatedData['coupon_id'] =$user->appliedcoupon->id;
            $updatedData['total_price'] =$result - ( $result * $user->appliedcoupon->discount / 100 ) ;
        }
        $order->update($updatedData);

        //reset appllied coupon
        $user->update([
            'coupon_id' => null,
        ]);

        //mark this coupon as used
        if($user->appliedcoupon){
            $user->appliedcoupon->couponusers()->where(['user_id' => auth()->user()->id])->update(['is_used' =>  1]);

            //update coupon quantities
            $user->appliedcoupon->update([
                'quantity' => $user->appliedcoupon->quantity - 1,
                'used_quantity' => $user->appliedcoupon->used_quantity + 1,
            ]);
        }

        //Send Mail With Job
        $details['email'] = $user->email;
        $order = $order->load('order_details.item','coupon');
        $details['order'] = $order;
        dispatch(new SendEmailJob($details));

        /***push notification */
            dispatch(new SendNotificationAdminJob(__('translation.New order by'). ' '. $user->name. ' ' . __('translation.with value'). ' '.  number_format($order->total_price, 2, ',', '.'). ' €' ));
        /***push notification */

        session()->flash('success', __('translation.Your order has been completed successfully. Thank you for your purchase'));
        return redirect()->route('user.orders.index');
    }

}
