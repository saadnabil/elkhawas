<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\AddCartsValidation;
use App\Http\Requests\Users\CheckOutValidation;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Support\Str;
class CartsController extends Controller
{

    public function add(AddCartsValidation $request){
        $data = $request->validated();
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

    public function plus($id){
        $route = request('route');

        $cart = Cart::where([
            'user_id' => auth()->user()->id,
            'id' => $id,
        ])->firstorfail();
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

        /**check cart is empty**/
        if(count($cartitems)==0){
            session()->flash('error', __('translation.Oops! It seems like your cart is empty. Please add items to your cart before proceeding.'));
            return redirect()->back();
        }
       /**check cart is empty**/

        $data['user_id'] = auth()->user()->id;
        $data['order_id'] = generate_code_unique();
        $order = Order::create($data);
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
        $order->update([
            'total_price' =>  $result,
        ]);

        session()->flash('success', __('translation.Your order has been completed successfully. Thank you for your purchase'));
        return redirect()->route('user.items.index');
    }
}
