<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;
    protected $table = 'establishments';

    protected $fillable = [
        'name', 
        'phone_number',
        'localisations_id',
    ];

    public function Localisations()
    {
        return $this->belongsTo(Localisation::class, 'localisations_id');
    }
}
