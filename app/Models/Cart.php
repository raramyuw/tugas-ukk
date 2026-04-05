<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'produk_id',
        'jumlah',
        'status'
    ];

    public function produk()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }
}