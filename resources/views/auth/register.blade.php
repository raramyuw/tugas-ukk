@extends('layouts.user')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-5">

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                <h3 class="text-center fw-bold mb-4" style="color:#4C8C6B;">
                    Daftar Akun 
                </h3>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- NAME -->
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}"
                               required autofocus>

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}"
                               required>

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               required>

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- CONFIRM PASSWORD -->
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control @error('password_confirmation') is-invalid @enderror"
                               required>

                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- BUTTON -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            Daftar Sekarang 
                        </button>
                    </div>
                </form>

                <hr>

                <p class="text-center mb-0">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="fw-bold text-success">
                        Login sekarang 
                    </a>
                </p>

            </div>
        </div>

    </div>
</div>

@endsection
