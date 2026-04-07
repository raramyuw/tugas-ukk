@extends('layouts.user')

@section('content')

<div class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color:#8ae0ae;">
            ⭐ Kata Orang Tentang Kami
        </h2>

        @auth
        <a href="{{ route('ulasan.create') }}" class="btn btn-success">
            + Masukkan Ulasan Anda
        </a>
        @endauth
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($ulasans as $ulasan)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <strong>{{ $ulasan->user->name }}</strong>
                    <p class="text-warning">
                        {{ str_repeat('⭐', $ulasan->rating) }}
                    </p>
                    <p class="text-muted">
                        {{ $ulasan->komentar }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection
