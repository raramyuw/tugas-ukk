<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        // 🔥 ambil data + relasi user
        $orders = Order::with('user')->latest()->get();

        return view('admin.index', compact('orders'));
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->status;
        $order->save();

        return response()->json(['success' => true]);
    }

    public function filter(Request $request)
    {
        $query = Order::with('user');

        if ($request->search) {
            $query->where('produk', 'like', '%' . $request->search . '%');
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $orders = $query->latest()->get();

        return view('admin.index', compact('orders'));
    }
}