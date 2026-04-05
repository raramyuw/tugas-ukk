<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>DIQIR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F4FBF7;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg" style="background-color:#6FBF8E;">
        <div class="container">

            <a class="navbar-brand fw-bold text-white" href="/">
                DIQIR KONVEKSI
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                {{-- Menu Kiri --}}
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link text-white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('produk') }}" class="nav-link text-white">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tentang') }}" class="nav-link text-white">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ulasan') }}" class="nav-link text-white">Ulasan</a>
                    </li>

                    @auth
                        @if(auth()->user()->role === 'user')
                            <li class="nav-item">
                                <a href="{{ route('riwayat') }}" class="nav-link text-white">Riwayat</a>
                            </li>
                        @endif
                    @endauth
                </ul>

                {{-- Menu Kanan --}}
                {{-- Menu Kanan --}}
<div class="ms-auto d-flex align-items-center gap-3">

    @auth
        @if(auth()->user()->role === 'user')
            <a href="{{ route('keranjang') }}" class="nav-link text-white position-relative">
                🛒 Keranjang
                @php
                    $cart = session('cart', []);
                    $jumlah = count($cart);
                @endphp
                @if ($jumlah > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $jumlah }}
                    </span>
                @endif
            </a>

            <a href="{{ route('profile') }}" class="btn btn-light btn-sm">Profil</a>
        @endif

        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
        </form>
    @endauth

    @guest
        <a href="{{ route('login') }}" class="btn btn-light btn-sm">Login</a>
        <a href="{{ route('register') }}" class="btn btn-light btn-sm">Register</a>
    @endguest

</div>

            </div>
        </div>
    </nav>

    <div class="container my-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>