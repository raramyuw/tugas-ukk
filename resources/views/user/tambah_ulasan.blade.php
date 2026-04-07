@extends('layouts.user')

@section('content')

<div class="container my-5">

    <h2 class="fw-bold mb-4" style="color:#8ae0ae;">
        Tambah Ulasan/Komentar Anda
    </h2>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" action="{{ route('ulasan.store') }}">
                @csrf

                <div class="mb-3">
                    <label>Komentar</label>
                    <textarea name="komentar" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label>Rating</label>
                    <select name="rating" class="form-control" required>
                        <option value="5">5 ⭐</option>
                        <option value="4">4 ⭐</option>
                        <option value="3">3 ⭐</option>
                        <option value="2">2 ⭐</option>
                        <option value="1">1 ⭐</option>
                    </select>
                </div>

                <button class="btn btn-success">Simpan Ulasan</button>
                <a href="{{ route('ulasan') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

@endsection
