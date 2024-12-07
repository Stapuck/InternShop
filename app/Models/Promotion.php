<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotions';

    protected $fillable = [
        'name', 
        'establishments_id', 
    ];

    public function Establishements()
    {
        return $this->belongsTo(Establishment::class, 'establishements_id');
    }
}
