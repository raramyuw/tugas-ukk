<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Models\Order;

// =======================
// HALAMAN PUBLIK
// =======================

Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::get('/produk', [ProductController::class, 'index'])->name('produk');

Route::get('/tentang', function () {
    return view('user.tentang');
})->name('tentang');

Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan');

// =======================
// HALAMAN USER (AUTH)
// =======================

Route::middleware(['auth'])->group(function () {

    Route::post('/keranjang/tambah', function () {
        $cart = session()->get('cart', []);
        $cart[] = [
            'nama'  => request('nama'),
            'harga' => request('harga'),
            'qty'   => 1,
        ];
        session()->put('cart', $cart);
        return redirect('/keranjang')->with('success', 'Produk berhasil ditambahkan!');
    })->name('keranjang.tambah');

    Route::get('/keranjang', function () {
        $cart = session()->get('cart', []);
        return view('user.keranjang', compact('cart'));
    })->name('keranjang');

    Route::post('/keranjang/tambah-qty/{index}', function ($index) {
        $cart = session()->get('cart', []);
        if (isset($cart[$index])) {
            $cart[$index]['qty']++;
            session()->put('cart', $cart);
        }
        return back();
    })->name('keranjang.tambahQty');

    Route::post('/keranjang/kurang-qty/{index}', function ($index) {
        $cart = session()->get('cart', []);
        if (isset($cart[$index])) {
            if ($cart[$index]['qty'] > 1) {
                $cart[$index]['qty']--;
            } else {
                unset($cart[$index]);
            }
            session()->put('cart', array_values($cart));
        }
        return back();
    })->name('keranjang.kurangQty');

    Route::post('/keranjang/hapus/{index}', function ($index) {
        $cart = session()->get('cart', []);
        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('cart', array_values($cart));
        }
        return back();
    })->name('keranjang.hapus');

    Route::post('/keranjang/kosongkan', function () {
        session()->forget('cart');
        return back();
    })->name('keranjang.kosongkan');

    Route::get('/checkout', function () {
        $cart = session()->get('cart', []);
        if (empty($cart)) return redirect()->route('keranjang');
        return view('user.checkout', compact('cart'));
    })->name('checkout');

    Route::post('/checkout/proses', function () {
        $cart = session()->get('cart', []);
        if (empty($cart)) return redirect()->route('keranjang');

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['harga'] * $item['qty'];
            
            $product = \App\Models\Product::where('name', $item['nama'])->first();
            if ($product) {
                $product->stock -= $item['qty'];
                $product->save();
            }
        }

        $order = \App\Models\Order::create([
            'user_id' => Auth::id(),
            'produk'  => json_encode($cart),
            'total'   => $total,
            'status'  => 'pending',
            'no_hp'   => Auth::user()->no_hp,
            'shipping_address' => Auth::user()->alamat,
        ]);

        session()->forget('cart');
        return redirect()->route('pembayaran', $order->id)->with('success', 'Pesanan berhasil!');
    })->name('checkout.proses');

    Route::get('/pembayaran/{id}', function ($id) {
        $order = \App\Models\Order::findOrFail($id);
        return view('user.pembayaran', compact('order'));
    })->name('pembayaran');

    Route::get('/riwayat', function () {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('user.riwayat', compact('orders'));
    })->name('riwayat');

    Route::get('/ulasan/tambah', [UlasanController::class, 'create'])->name('ulasan.create');
    Route::post('/ulasan/simpan', [UlasanController::class, 'store'])->name('ulasan.store');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// =======================
// HALAMAN ADMIN
// =======================

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
    return view('admin.index');
})->name('dashboard');

    Route::resource('products', AdminProductController::class);
    Route::resource('orders', OrderController::class);
    
    // ROUTE UPDATE STATUS UNTUK ORDER
    Route::post('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

    Route::post('/update-status/{id}', [AdminController::class, 'updateStatus'])->name('updateStatus');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
    Route::get('/filter', [AdminController::class, 'filter'])->name('filter');

    Route::get('/profile', [ProfileController::class, 'adminIndex'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'adminUpdate'])->name('profile.update');
});

// =======================
// AUTH
// =======================

Auth::routes();