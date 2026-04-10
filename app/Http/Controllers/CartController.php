<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Halaman keranjang
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->with('produk')->get();
        return view('user.keranjang', compact('carts'));
    }

    // Tambah ke keranjang
    public function add($id)
    {
        $produk = Product::findOrFail($id);

        Cart::create([
            'user_id' => Auth::id(),
            'produk_id' => $produk->id,
            'jumlah' => 1
        ]);

        return redirect()->route('keranjang');
    }

    // HALAMAN CHECKOUT
    public function checkout()
    {
        $carts = Cart::where('user_id', Auth::id())
            ->with('produk')
            ->get();

        // Format ulang cart agar sesuai dengan view checkout
        $cart = [];
        foreach ($carts as $item) {
            $cart[] = [
                'produk_id' => $item->produk->id,
                'nama' => $item->produk->nama,
                'harga' => $item->produk->harga,
                'qty' => $item->jumlah,
                'foto' => $item->produk->image ?? null, // ← kolom 'image'
            ];
        }

        return view('user.checkout', compact('cart'));
    }

    // PROSES BAYAR
    public function prosesBayar(Request $request)
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('riwayat')->with('success', 'Pesanan berhasil!');
    }
}