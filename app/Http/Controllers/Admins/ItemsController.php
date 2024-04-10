<?php

namespace App\Http\Controllers\Admins;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateItemForm;
use App\Models\Item;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::latest()->get();
        return view('admin.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs = availableLanguages();
        $item = new Item();
        $action = route('admin.items.store');
        return view('admin.items.form',compact('langs','item','action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateItemForm $request)
    {
        $data = $request->validated();
        // dd($data);

       

        if(isset($data['image'])){
            $data['image'] = FileHelper::upload_file('items', $data['image']);
        }
        Item::create($data);
        session()->flash('success', __('translation.Item created successfully'));
        return redirect()->route('admin.items.index');
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
    public function edit(Item $item)
    {
        $langs = availableLanguages();
        $action = route('admin.items.update', $item);
        $method = true;
        return view('admin.items.form',compact('langs','item','action','method'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateItemForm $request, Item $item)
    {
        $data = $request->validated();
        if(isset($data['image'])){
            $data['image'] = FileHelper::update_file('items', $data['image'],$item->image);
        }
        $item->update($data);
        session()->flash('success', __('translation.Item updated successfully'));
        return redirect()->route('admin.items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        session()->flash('success', __('translation.Item deleted successfully'));
        return redirect()->route('admin.items.index');
    }

}
