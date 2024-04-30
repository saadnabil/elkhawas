<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = Wishlist::where('user_id',auth()->user()->id)->with('item')->latest()->get();
        return view('user.wishlists.index',compact('wishlists'));
    }

    public function favourite($id){
        $item = Item::find($id);
        $wishlist = Wishlist::where([
            'user_id' => auth()->user()->id,
            'item_id' => $item->id
        ])->first();

        if (!$wishlist) {
            // Create the wishlist item if it doesn't exist
            $wishlist = Wishlist::create([
                'user_id' => auth()->user()->id,
                'item_id' => $item->id
            ]);
            return 1;
        } else {
            // Delete the wishlist item if it already exists
            $wishlist->delete();
            return 0;
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
    public function edit(string $id)
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
        Wishlist::find($id)->delete();
        $wishlists = Wishlist::where('user_id',auth()->user()->id)->with('item')->latest()->get();
        return view('user.wishlists.wishlist-items',compact('wishlists'));
    }
}
