<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Models\Order;

// =======================
// HALAMAN PUBLIK
// =======================

Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::get('/produk', function () {
    return view('user.produk');
})->name('produk');

Route::get('/tentang', function () {
    return view('user.tentang');
})->name('tentang');

Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan');


// =======================
// HALAMAN USER
// =======================

Route::middleware(['auth'])->group(function () {

    // Keranjang
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

    // Checkout
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
        }

        $order = \App\Models\Order::create([
            'user_id' => Auth::id(),
            'produk'  => json_encode($cart),
            'total'   => $total,
            'status'  => 'Menunggu Pembayaran',
        ]);

        session()->forget('cart');
        return redirect()->route('pembayaran', $order->id)
            ->with('success', 'Pesanan berhasil!');
    })->name('checkout.proses');

    Route::get('/pembayaran/{id}', function ($id) {

    $order = \App\Models\Order::findOrFail($id);

    return view('user.pembayaran', compact('order'));

})->name('pembayaran');

    // Riwayat
    Route::get('/riwayat', function () {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('user.riwayat', compact('orders'));
    })->name('riwayat');

    // Ulasan
    Route::get('/ulasan/tambah', [UlasanController::class, 'create'])->name('ulasan.create');
    Route::post('/ulasan/simpan', [UlasanController::class, 'store'])->name('ulasan.store');

    // Profil User
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

});


// =======================
// HALAMAN ADMIN
// =======================

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/', function () {
        if (Auth::user()?->role !== 'admin') abort(403);
        return app(AdminController::class)->index(request());
    })->name('admin');

    Route::post('/update-status/{id}', [AdminController::class, 'updateStatus'])
        ->name('admin.updateStatus');

    Route::delete('/delete/{id}', [AdminController::class, 'delete'])
        ->name('admin.delete');

    Route::get('/filter', [AdminController::class, 'filter'])
        ->name('admin.filter');

    // Profil Admin
    Route::get('/profile', [ProfileController::class, 'adminIndex'])->name('admin.profile');
    Route::post('/profile/update', [ProfileController::class, 'adminUpdate'])->name('admin.profile.update');

});


// =======================
// AUTH
// =======================

Auth::routes();