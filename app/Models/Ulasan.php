<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ulasan extends Model
{
    protected $fillable = [
        'user_id',
        'komentar',
        'rating'
    ];

    // ⭐ RELASI KE USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
