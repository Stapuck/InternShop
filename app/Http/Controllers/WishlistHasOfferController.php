<?php

namespace App\Http\Controllers;
use App\Models\WishlistHasOffer;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistHasOfferController extends Controller
{

    public function index()
    {
        $Wishlists_has_OffersList = WishlisthasOffer::all();

        return view('Wishlists_has_Offers.index', ["Wishlists_has_OffersList" => $Wishlists_has_OffersList] );
    }

    // Create
    public function create()
    {
        return view('Wishlists_has_Offers.create');
    }

    // Store
    public function store(Request $request)
    {
        $Wishlists_has_OffersList = WishlisthasOffer::create($request->all());
        return redirect('/Wishlists_has_Offers');
    }

    // Show
    public function show(string $id){
        return view('Wishlists_has_Offers.show', ['item' => WishlisthasOffer::findOrFail($id)]);
    }



    public function edit(string $id){
        return view('Wishlists_has_Offers.edit', [
            'requestItem' => WishlisthasOffer::findOrFail($id)
        ]);

    }
    public function update(Request $request, string $id){
        WishlisthasOffer::where('id', $id)->update($request->except('_token'));
        return redirect("/Wishlists_has_Offers");
    }

    public function destroy(Request $request, string $id){
        WishlisthasOffer::where('id',$id)->delete($request->except('_token'));
        return redirect("/Wishlists_has_Offers");
    }

    public function addToWishlist($offerId)
    {
        $userId = Auth::id();
        
        // check if the offer is already in the user's wishlist
        $wishlist = Wishlist::where('users_id', $userId)
            ->where('offers_id', $offerId)
            ->first();
    
        if ($wishlist) {
            // if the offer is already in the wishlist, remove it
            $wishlist->delete();
            return back()->with('success', 'Offer removed from wishlist!');
        } else {
            // if the offer is not in the wishlist, add it
            $wishlist = new Wishlist();
            $wishlist->offers_id = $offerId;
            $wishlist->users_id = $userId;
            $wishlist->save();
    
            return back()->with('success', 'Offer added to wishlist successfully!');
        }
    }

    public function removeFromWishlist(Request $request, $offerId)
    {
        $wishlist = Wishlist::where('users_id', Auth::id())
            ->where('offers_id', $offerId)
            ->delete();

        return redirect('/Offers');
    }
}

