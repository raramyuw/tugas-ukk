<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
public function index()
{
    $ulasans = \App\Models\Ulasan::with('user')->latest()->get();

    return view('user.ulasan', compact('ulasans'));
}


    public function create()
    {
        return view('user.tambah_ulasan');
    }

    public function store(Request $request)
{
    Ulasan::create([
        'user_id' => Auth::id(),
        'komentar' => $request->komentar,
        'rating' => $request->rating,
    ]);

    return redirect()->route('ulasan');
}

}
