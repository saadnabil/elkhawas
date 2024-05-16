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
        $items = Item::with('wishlisted')->latest()->get();
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
