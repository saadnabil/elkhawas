<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\AddCartsValidation;
use App\Http\Requests\Users\ApplyCouponValidation;
use App\Http\Requests\Users\CheckOutValidation;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Support\Str;
class CartsController extends Controller
{

    public function disapplycoupon(){
        $user = auth()->user();
        $user->update([
            'coupon_id' => null,
        ]);
        return view('user.cart.cartcomponent');
    }

    public function add(AddCartsValidation $request){
        $data = $request->validated();

        $item = Item::find($data['item_id']);

        /**check item quantity */
        if($data['quantity'] > $item->quantity){
            return response()->json(['error' => __('translation.Quantity requested exceeds available stock.')], 422);
        }

        $ItemInCart = Cart::where([
            'user_id' => auth()->user()->id,
            'item_id' => $data['item_id'],
        ])->first();

        if(!$ItemInCart){
            Cart::create([
                'user_id' => auth()->user()->id,
                'item_id' => $data['item_id'],
                'quantity' => $data['quantity'],
            ]);
        }else{
            $ItemInCart->update([
                'user_id' => auth()->user()->id,
                'item_id' => $data['item_id'],
                'quantity' => $ItemInCart->quantity +  $data['quantity'],
            ]);
        }
        return view('layout.usercart');
    }

    public function applycoupon(ApplyCouponValidation $request){
        $data = $request->validated();
        $user = auth()->user()->load('coupons.couponusers');
        $currentDateTime = Carbon::now();
        $coupon = $user->coupons()
                        ->where([
                            'code' => $data['code'],
                        ])
                        ->where(function ($q) use ($currentDateTime) {
                            $q->where('valid_from', '<=', $currentDateTime)
                                  ->where('valid_to', '>=', $currentDateTime);
                        })
                        ->whereHas('couponusers',function($query){
                            $query->where('is_used',0)
                                  ->where('user_id',auth()->user()->id);
                        })->first();
        if(!$coupon){
            return response()->json([
                'message' => __('translation.Invalid Coupon'),
                'errors' => [
                    'code' => [__('translation.Invalid Coupon')]
                ]
            ], 422);
        }
        $user->update([
            'coupon_id' => $coupon->id,
        ]);
        return view('user.cart.cartcomponent');
    }

    public function plus($id){
        $route = request('route');
        /**get item */

        $cart = Cart::where([
            'user_id' => auth()->user()->id,
            'id' => $id,
        ])->firstorfail();

        $item = Item::find($cart->item_id);

        /**check item quantity */
        if($cart->quantity + 1 > $item->quantity){
            return response()->json(['error' => __('translation.Quantity requested exceeds available stock.')], 422);
        }

        $cart->update([
            'quantity' => $cart->quantity + 1,
        ]);
        if($route == 'cartsidebar'){
            return [
                'route' => $route,
                'view' => view('layout.usercart')->render()
            ];
        }elseif($route=='cartpagedetails'){
            return [
                'route' => $route,
                'view' => view('user.cart.cartcomponent')->render()
            ];
        }
    }



    public function minus($id){
        $route = request('route');
        $cart = Cart::where([
            'user_id' => auth()->user()->id,
            'id' => $id,
        ])->firstorfail();
        if($cart->quantity == 1){ //must delete becuase element will be negative
            $cart->delete();
        }else{
            $cart->update([
                'quantity' => $cart->quantity - 1,
            ]);
        }
        if($route == 'cartsidebar'){
            return [
                'route' => $route,
                'view' => view('layout.usercart')->render()
            ];
        }elseif($route=='cartpagedetails'){
            return [
                'route' => $route,
                'view' => view('user.cart.cartcomponent')->render()
            ];
        }
    }

    public function remove($id){
        $route = request('route');
        Cart::where([
            'user_id' => auth()->user()->id,
            'id' => $id,
        ])->delete();

        if($route == 'cartsidebar'){
            return [
                'route' => $route,
                'view' => view('layout.usercart')->render()
            ];
        }elseif($route=='cartpagedetails'){
            return [
                'route' => $route,
                'view' => view('user.cart.cartcomponent')->render()
            ];
        }
    }

  
    public function cartsdetails(){
        $cartitems = Cart::with('item')->where('user_id', auth()->user()->id)->get();
        return view('user.cart.cartdetails',compact('cartitems'));
    }

    public function checkoutform(){
        $addresses = Address::where('user_id', auth()->user()->id)->latest()->get();
        $cartitems = Cart::with('item')->where('user_id', auth()->user()->id)->get();
        return view('user.cart.checkout',compact('addresses','cartitems'));
    }

  

    public function checkout(CheckOutValidation $request){
        $data = $request->validated();
        $cartitems = Cart::with('item')->where('user_id', auth()->user()->id)->get();

        //check cart is empty
        if(count($cartitems)==0){
            session()->flash('error', __('translation.Oops! It seems like your cart is empty. Please add items to your cart before proceeding.'));
            return redirect()->back();
        }

        //load user with applied coupon and coupon users
        $user = auth()->user()->load('appliedcoupon.couponusers');

        //store order with initial data
        $data['user_id'] = $user->id;
        $data['order_id'] = generate_code_unique();
        if($user->applycoupon){
            $data['coupon_id'] =$user->applycoupon->id;
        }
        $order = Order::create($data);

        //store order details
        $result = 0;
        foreach($cartitems as $cartitem){
            $total_price = $cartitem->quantity * $cartitem->item->total_price;
            OrderDetail::create([
                'item_id' => $cartitem->item_id,
                'order_id' => $order->id,
                'quantity' => $cartitem->quantity,
                'total_price' =>  $total_price,
            ]);
            $result += $total_price ;
            //reset user cart
            $cartitem->delete();
        }

        //update order if coupon is applied
        $updatedData = [
            'total_price' => $result,
            'subtotal' => $result
        ];
        if($user->applycoupon){
            $updatedData['coupon_id'] =$user->applycoupon->id;
            $updatedData['total_price'] =$result - ( $result * $user->applycoupon->discount / 100 ) ;
        }
        $order->update($updatedData);

        //reset appllied coupon
        $user->update([
            'coupon_id' => null,
        ]);

        //mark this coupon as used
        $user->appliedcoupon->couponusers->where(['user_id' => auth()->user()->id])->update(['is_used' =>  1]);



        session()->flash('success', __('translation.Your order has been completed successfully. Thank you for your purchase'));
        return redirect()->route('user.items.index');
    }
}
