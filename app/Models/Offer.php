<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table = 'offers';

    protected $fillable = [
        'detail', 
        'duration', 
        'skill', 
        'gratification', 
        'number_of_places_available', 
        'target_promotion', 
        'offer_date', 
        'companies_id'
    ];

    public function Companies()
    {
        return $this->belongsTo(Company::class, 'companies_id');
    }
}
