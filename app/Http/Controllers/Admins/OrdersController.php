<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateOrderStatusFormValidateion;
use App\Http\Requests\Users\CheckOutValidation;
use App\Jobs\SendEmailJob;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:order-list', ['only' => ['index']]);
        $this->middleware('permission:order-show', ['only' => ['show']]);
        $this->middleware('permission:order-export', ['only' => ['export']]);
        $this->middleware('permission:order-send-invoice', ['only' => ['sendInvoice']]);
        $this->middleware('permission:order-edit-status', ['only' => ['updateStatus']]);


    }

    public function index(){
        $orders = Order::with('order_details.item','address','coupon','user')->latest();
        if(request()->has('status')){
            $orders =  $orders->where('status', request('status'));
        }
        $orders = $orders->get();
        $status = request()->has('status') ? request('status') : 'all';
        return view('admin.orders.index',compact('orders','status'));
    }

    public function show(Order $order){

        $order = $order->load('order_details.item','address','coupon','user');
        $user = auth()->user();
        return view('admin.orders.show',compact('order','user'));

    }

    public function sendInvoice(Request $request){
        $order = Order::with('order_details.item','coupon')->findorfail($request->order_id);
        $details['order'] = $order;
        $details['email'] = $request->email;
        dispatch(new SendEmailJob($details));
        session()->flash('success', __('translation.Invoice send successfully'));
        return redirect()->back();

    }

    public function updateStatus(UpdateOrderStatusFormValidateion $request){
        $data = $request->validated();
        $order = Order::findorfail($data['order_id']);
        unset($data['order_id']);
        if($order->status == 'pending'){
            $data['pending_date'] = $data['date'];
        }elseif($order->status == 'delivered'){
            $data['delivered_date'] = $data['date'];
        }elseif($order->status == 'shipped'){
            $data['shipped_date'] = $data['date'];
        }elseif($order->status == 'canceled'){
            $data['canceled_date'] = $data['date'];
        }
        unset($data['date']);
        $order->update($data);
        session()->flash('success', __('translation.Order status updated successfully'));
        return redirect()->back();
    }

    public function trackorderdetails(Order $order){
        $order = $order->load('order_details.item','address','coupon','user');
        return view('admin.orders.track-orders-details',compact('order'));
    }



}
