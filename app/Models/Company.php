<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';

    protected $fillable = [
        'name', 
        'students_from_cesi',
        'business_line',
        'users_id'
    ];

    public function Users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    
    public function Offer()
    {
        return $this->hasMany(Offer::class,  'companies_id');
    }
    
}
