<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\AddCartsValidation;
use App\Models\Cart;
use Illuminate\Http\Request;

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
        $cart = Cart::where([
            'user_id' => auth()->user()->id,
            'id' => $id,
        ])->firstorfail();
        $cart->update([
            'quantity' => $cart->quantity + 1,
        ]);
        return view('layout.usercart');
    }

    public function minus($id){
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
        return view('layout.usercart');
    }
    public function remove($id){
        Cart::where([
            'user_id' => auth()->user()->id,
            'id' => $id,
        ])->delete();
        return view('layout.usercart');
    }
}
