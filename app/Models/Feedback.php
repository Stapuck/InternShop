<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';

    protected $fillable = [
        'opinion', 
        'users_id'
    ];

    public function Users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
