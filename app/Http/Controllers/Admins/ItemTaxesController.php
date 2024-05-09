<?php

namespace App\Http\Controllers\Admins;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateItemTaxForm;
use App\Http\Requests\Admin\ValidateItemTypeForm;
use App\Models\Admin;
use App\Models\ItemTax;
use App\Models\ItemType;

class ItemTaxesController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    function __construct()
    {
         $this->middleware('permission:item-tax-list', ['only' => ['index']]);
         $this->middleware('permission:item-tax-create', ['only' => ['create','store']]);
         $this->middleware('permission:item-tax-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:item-tax-delete', ['only' => ['destroy']]);
         $this->middleware('permission:item-tax-export', ['only' => ['export']]);
    }

    public function index()
    {
        $itemtaxes = ItemTax::latest()->get();
        return view('admin.itemtaxes.index',compact('itemtaxes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $itemtax = new ItemTax();
        $action = route('itemtaxes.store');
        return view('admin.itemtaxes.form',compact('itemtax','action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateItemTaxForm $request)
    {
        $data = $request->validated();
        ItemTax::create($data);
        session()->flash('success', __('translation.Item created successfully'));
        return redirect()->route('itemtaxes.index');
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
    public function edit(ItemTax $itemtax)
    {
        $action = route('itemtaxes.update', $itemtax);
        $method = true;
        return view('admin.itemtaxes.form',compact('itemtax','action','method'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateItemTaxForm $request, ItemTax $itemtax)
    {
        $data = $request->validated();
        $itemtax->update($data);
        session()->flash('success', __('translation.Item updated successfully'));
        return redirect()->route('itemtaxes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemTax $itemtax)
    {
        //
        $itemtax->delete();
        session()->flash('success', __('translation.Item deleted successfully'));
        return redirect()->route('itemtaxes.index');
    }
}
