<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('produk'); // menyimpan data produk dalam bentuk JSON
            $table->integer('total');
            $table->string('status')->default('pending'); // pending, diproses, dikirim, selesai, batal
            $table->string('payment_method')->nullable(); // metode pembayaran
            $table->text('shipping_address')->nullable(); // alamat pengiriman
            $table->string('no_hp')->nullable(); // nomor telepon
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};