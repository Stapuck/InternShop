<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table = 'applications';

    protected $fillable = [
        'synopsis', 
        'application_letter',
        'offers_id',
        'users_id',
        'advancements_id',
    ];

    public function Offers()
    {
        return $this->belongsTo(Offer::class, 'offers_id');
    }

    public function Users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function Advancements()
    {
        return $this->belongsTo(Advancement::class, 'advancements_id');
    }
}
