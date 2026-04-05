<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'produk_id',
        'jumlah',
        'status'
    ];


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
