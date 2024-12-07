<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalisationHasCompany extends Model
{
    use HasFactory;
    protected $table = 'localisations_has_companies';

    protected $fillable = [
        'localisations_id', 
        'companies_id', 
        'is_headquarter', 
    ];

    public function Localisations()
    {
        return $this->belongsTo(Localisation::class, 'localisations_id');
    }

    public function Companies()
    {
        return $this->belongsTo(Company::class, 'companies_id');
    }
}
