<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'wishlists';

    protected $fillable = [
        'users_id',
        'offers_id'
    ];

    public function Users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function Offers()
    {
        return $this->belongsTo(Offer::class, 'offers_id');
    }
}