<?php

namespace App\Http\Controllers\Admins;

use App\Exports\ItemExport;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateItemForm;
use App\Imports\ItemsImport;
use App\Models\Inquiry;
use App\Models\Item;
use App\Models\ItemTax;
use App\Models\ItemType;
use App\Models\Tax;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('permission:item-list', ['only' => ['index']]);
         $this->middleware('permission:item-create', ['only' => ['create','store']]);
         $this->middleware('permission:item-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:item-delete', ['only' => ['destroy']]);
         $this->middleware('permission:item-export', ['only' => ['export']]);
     }
    public function index()
    {
        $items = Item::with('type')->latest()->get();
        return view('admin.items.index',compact('items'));
    }

    public function ExportItems(Request $request){
        return Excel::download(new ItemExport, 'items.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs = availableLanguages();
        $item = new Item();
        $types = ItemType::get();
        $taxes = ItemTax::orderBy('tax','asc')->get();
        $action = route('admin.items.store');
        return view('admin.items.form',compact('langs','item','action','taxes','types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateItemForm $request)
    {
        $data = $request->validated();
        if(isset($data['image'])){
            $data['image'] = FileHelper::upload_file('items', $data['image']);
        }
        $total_price = $data['units_number'] * $data['unit_price'];
        $data['total_price'] =  $total_price +  ($total_price * $data['tax'] / 100);
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
        $taxes = ItemTax::orderBy('tax','asc')->get();
        $method = true;
        $types = ItemType::get();
        return view('admin.items.form',compact('langs','item','action','method','taxes','types'));
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
        $total_price = $data['units_number'] * $data['unit_price'];
        $data['total_price'] =  $total_price +  ($total_price * $data['tax'] / 100);
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
