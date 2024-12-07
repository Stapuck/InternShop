<?php

namespace App\Http\Controllers;
use App\Models\Wishlist;
use App\Models\User;
use App\Models\Offer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    public function index()
    {
        $WishlistsList = Wishlist::where('users_id', Auth::id())->with('offers')->get();
        

        // return view('Wishlists.index', ["WishlistsList" => $WishlistsList] );
        return view('Wishlists.index', compact('WishlistsList'));
    }

    // Create
    public function create()
    {
        return view('Wishlists.create');
    }

    // Store
    public function store(Request $request)
    {
        $WishlistsList = Wishlist::create($request->all());
        return redirect('/Wishlists');
    }

    // Show
    public function show(string $id){
        return view('Wishlists.show', ['item' => Wishlist::findOrFail($id)]);
    }

    public function edit(string $id){
        return view('Wishlists.edit', [
            'requestItem' => Wishlist::findOrFail($id)
        ]);

    }
    public function update(Request $request, string $id){
        Wishlist::where('id', $id)->update($request->except('_token'));
        return redirect("/Wishlists");
    }

    public function destroy(Request $request, string $id){
        Wishlist::where('id',$id)->delete($request->except('_token'));
        return redirect("/Wishlists");
    }

    public function addToWishlist($offer_id)
    {
        $user_id = Auth::id();
        $offer = Offer::all();

        
        // check if the offer is already in the user's wishlist
        $wishlist = Wishlist::where('users_id', $user_id)
            ->where('offers_id', $offer_id)
            ->first();
    
        if ($wishlist) {
            // if the offer is already in the wishlist, remove it
            $wishlist->delete();
            return back()->with('success', 'Offer removed from wishlist!');
        } else {
            // if the offer is not in the wishlist, add it
            $wishlist = new Wishlist();
            $wishlist->offers_id = $offer_id;
            $wishlist->users_id = $user_id;
            $wishlist->save();
    
            return back()->with('success', 'Offer added to wishlist successfully!');
        }
    }

    public function removeFromWishlist(Request $request, $offer_id)
    {
        $wishlist = Wishlist::where('users_id', Auth::id())
            ->where('offers_id', $offer_id)
            ->delete();

        return redirect('/Offers');
    }
}