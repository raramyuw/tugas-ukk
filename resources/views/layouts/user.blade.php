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
        .navbar-brand {
            font-weight: bold;
        }
        .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg" style="background-color:#8ae0ae;">
        <div class="container">

            {{-- BRAND --}}
            <a class="navbar-brand fw-bold text-white" href="{{ auth()->check() && auth()->user()->role === 'admin' ? route('admin.dashboard') : route('home') }}">
                DIQIR KONVEKSI
                @auth
                    @if(auth()->user()->role === 'admin')
                        <small class="text-warning">(Admin)</small>
                    @endif
                @endauth
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                {{-- ======================= MENU KIRI ======================= --}}
                <ul class="navbar-nav me-auto">

                    @auth
                        {{-- MENU UNTUK USER --}}
                        @if(auth()->user()->role === 'user')
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
                            <li class="nav-item">
                                <a href="{{ route('riwayat') }}" class="nav-link text-white">Riwayat</a>
                            </li>
                        @endif

                        {{-- MENU UNTUK ADMIN --}}
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a>
                            </li>
                        @endif
                    @endauth

                    @guest
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
                    @endguest

                </ul>

                {{-- ======================= MENU KANAN ======================= --}}
                <div class="ms-auto d-flex align-items-center gap-3">

                    @auth
                        {{-- MENU UNTUK USER --}}
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

                            <div class="dropdown">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    👤 {{ auth()->user()->name }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profil Saya</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif

                        {{-- MENU UNTUK ADMIN --}}
                        @if(auth()->user()->role === 'admin')
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    👤 Admin: {{ auth()->user()->name }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('admin.profile') }}">Profil Admin</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.orders.index') }}">Pesanan</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
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