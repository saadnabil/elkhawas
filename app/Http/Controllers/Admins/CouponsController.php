<?php

namespace App\Http\Controllers\Admins;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateCouponForm;
use App\Http\Requests\Admin\ValidateItemTypeForm;
use App\Models\Admin;
use App\Models\Coupon;
use App\Models\ItemType;
use App\Models\User;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    function __construct()
    {
         $this->middleware('permission:coupon-list', ['only' => ['index']]);
         $this->middleware('permission:coupon-create', ['only' => ['create','store']]);
         $this->middleware('permission:coupon-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:coupon-delete', ['only' => ['destroy']]);
         $this->middleware('permission:coupon-export', ['only' => ['export']]);
    }

    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coupon = new Coupon();
        $action = route('admin.coupons.store');
        $users = User::orderBy('email','asc')->get();
        return view('admin.coupons.form',compact('coupon','action','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateCouponForm $request)
    {
        $data = $request->validated();
        $user_ids = $data['user_ids'];
        unset($data['user_ids']);
        $coupon = Coupon::create($data);
        $coupon->users()->attach($user_ids);
        session()->flash('success', __('translation.Item created successfully'));
        return redirect()->route('admin.coupons.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        $action = route('admin.coupons.update', $coupon);
        $method = true;
        $coupon = $coupon->load('users');
        $users = User::orderBy('email','asc')->get();
        return view('admin.coupons.form',compact('coupon','action','method','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateCouponForm $request, Coupon $coupon)
    {
        $data = $request->validated();
        $user_ids = $data['user_ids'];
        unset($data['user_ids']);
        $coupon->update($data);
        $coupon->users()->sync($user_ids);
        session()->flash('success', __('translation.Item updated successfully'));
        return redirect()->route('admin.coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        session()->flash('success', __('translation.Item deleted successfully'));
        return redirect()->route('admin.coupons.index');
    }
}
