<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'produk', 'total', 'status', 'payment_method', 'shipping_address', 'no_hp'
    ];

    protected $casts = [
        'produk' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Status badge helper
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => '<span class="badge bg-warning text-dark">⏳ Pending</span>',
            'diproses' => '<span class="badge bg-info">📦 Diproses</span>',
            'dikirim' => '<span class="badge bg-primary">🚚 Dikirim</span>',
            'selesai' => '<span class="badge bg-success">✅ Selesai</span>',
            'batal' => '<span class="badge bg-danger">❌ Batal</span>',
        ];
        return $badges[$this->status] ?? '<span class="badge bg-secondary">' . $this->status . '</span>';
    }
}