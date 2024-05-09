<?php

namespace App\Http\Controllers\Admins;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateItemTypeForm;
use App\Models\Admin;
use App\Models\ItemType;

class ItemTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    function __construct()
    {
         $this->middleware('permission:item-type-list', ['only' => ['index']]);
         $this->middleware('permission:item-type-create', ['only' => ['create','store']]);
         $this->middleware('permission:item-type-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:item-type-delete', ['only' => ['destroy']]);
         $this->middleware('permission:item-type-export', ['only' => ['export']]);
    }

    public function index()
    {
        $itemtypes = ItemType::latest()->get();
        return view('admin.itemtypes.index',compact('itemtypes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $itemtype = new ItemType();
        $langs = availableLanguages();
        $action = route('itemtypes.store');
        return view('admin.itemtypes.form',compact('itemtype','action','langs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateItemTypeForm $request)
    {
        $data = $request->validated();
        ItemType::create($data);
        session()->flash('success', __('translation.Item created successfully'));
        return redirect()->route('itemtypes.index');
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
    public function edit(ItemType $itemtype)
    {
        $langs = availableLanguages();
        $action = route('itemtypes.update', $itemtype);
        $method = true;
        return view('admin.itemtypes.form',compact('itemtype','action','method','langs'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateItemTypeForm $request, ItemType $itemtype)
    {
        $data = $request->validated();
        $itemtype->update($data);
        session()->flash('success', __('translation.Item updated successfully'));
        return redirect()->route('itemtypes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemType $itemtype)
    {
        //
        $itemtype->delete();
        session()->flash('success', __('translation.Item deleted successfully'));
        return redirect()->route('itemtypes.index');
    }
}
