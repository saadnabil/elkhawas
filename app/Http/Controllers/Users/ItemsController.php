<?php

namespace App\Http\Controllers\Users;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
    {

        $this->middleware(['auth']);
    }


    public function index()
    {
        $items = Item::with('wishlisted')->latest();
        if(request('search')) {
            $search = '%' .  request('search') . '%';
            $items = $items->where(function($q) use ($search) {
                $q->whereRaw('json_unquote(json_extract(title, "$.ar")) COLLATE utf8mb4_unicode_ci like ?', [$search])
                ->orWhereRaw('json_unquote(json_extract(title, "$.en")) COLLATE utf8mb4_unicode_ci like ?', [$search])
                ->orWhereRaw('json_unquote(json_extract(title, "$.de")) COLLATE utf8mb4_unicode_ci like ?', [$search])

                ->orWhereRaw('json_unquote(json_extract(item_name, "$.ar")) COLLATE utf8mb4_unicode_ci like ?', [$search])
                ->orWhereRaw('json_unquote(json_extract(item_name, "$.en")) COLLATE utf8mb4_unicode_ci like ?', [$search])
                ->orWhereRaw('json_unquote(json_extract(item_name, "$.de")) COLLATE utf8mb4_unicode_ci like ?', [$search])

                ->orWhereRaw('json_unquote(json_extract(unit, "$.ar")) COLLATE utf8mb4_unicode_ci like ?', [$search])
                ->orWhereRaw('json_unquote(json_extract(unit, "$.en")) COLLATE utf8mb4_unicode_ci like ?', [$search])
                ->orWhereRaw('json_unquote(json_extract(unit, "$.de")) COLLATE utf8mb4_unicode_ci like ?', [$search])

                ->orWhere('units_number', 'like' , $search)
                ->orWhere('unit_price', 'like' , $search)
                ->orWhere('total_price', 'like' , $search);
            });
        }
        $items = $items->paginate(5);

        //check if request is from ajax request ?
        if(request()->ajax()){
            return view('user.items.itemscomponent', compact('items'));
        }

        return view('user.items.index', compact('items'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function thankyou()
    {
        return response()->view('user.items.thankyou');

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
