<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->with('produk')->get();
        return view('user.keranjang', compact('carts'));
    }

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

    public function checkout()
    {
        $carts = Cart::where('user_id', Auth::id())
            ->with('produk')
            ->get();

        return view('user.riwayat', compact('carts'));
    }
}
