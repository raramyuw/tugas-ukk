<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // =======================
    // USER
    // =======================

    public function index()
    {
        return view('user.profile');
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'no_hp'    => 'nullable|string|max:20',
            'alamat'   => 'nullable|string|max:255',
            'kota'     => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:20',
            'images'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['images'] = $filename;
        }

        $user->update($data);

        return back()->with('success', 'Profil berhasil diupdate');
    }


    // =======================
    // ADMIN
    // =======================

    public function adminIndex()
    {
        if (Auth::user()->role !== 'admin') abort(403);

        return view('admin.profile'); // arahkan ke blade admin
    }

    public function adminUpdate(Request $request)
    {
        if (Auth::user()->role !== 'admin') abort(403);

        $user = User::findOrFail(Auth::id());

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'no_hp'    => 'nullable|string|max:20',
            'alamat'   => 'nullable|string|max:255',
            'kota'     => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:20',
            'images'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['images'] = $filename;
        }

        $user->update($data);

        return back()->with('success', 'Profil admin berhasil diupdate');
    }
}