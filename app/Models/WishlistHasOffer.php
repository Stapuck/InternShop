<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistHasOffer extends Model
{
    use HasFactory;
    protected $table = 'wishlists_has_offers';

    protected $fillable = [
        'wishlists_id', 
        'offers_id', 
    ];
    
    public function Wishlists()
    {
        return $this->belongsTo(Wishlist::class, 'wishlists_id');
    }
    public function Offers()
    {
        return $this->belongsTo(Offer::class, 'offers_id');
    }
}
