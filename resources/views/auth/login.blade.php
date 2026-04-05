@extends('layouts.user')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-5">

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                <h3 class="text-center fw-bold mb-4" style="color:#4C8C6B;">
                    Login Akun 💚
                </h3>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}"
                               required autofocus>

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

                    <!-- REMEMBER -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" class="form-check-input">
                        <label class="form-check-label">Ingat saya</label>
                    </div>

                    <!-- BUTTON -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            Login 🚀
                        </button>
                    </div>
                </form>

                <hr>

                <p class="text-center mb-0">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="fw-bold text-success">
                        Daftar sekarang ✨
                    </a>
                </p>

            </div>
        </div>

    </div>
</div>

@endsection
