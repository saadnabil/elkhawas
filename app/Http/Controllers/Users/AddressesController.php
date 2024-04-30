<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\AddAddressValidation;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressesController extends Controller
{
    //
    public function store(AddAddressValidation $request){
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Address::create($data);
        $addresses = Address::where('user_id', auth()->user()->id)->latest()->get();
        return view('user.cart.addresses',compact('addresses'));
    }

    public function destroy(Request $request , $id){

        Address::find($id)->delete();
        $addresses = Address::where('user_id', auth()->user()->id)->latest()->get();
        return view('user.cart.addresses',compact('addresses'));
    }
}
