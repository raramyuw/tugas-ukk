<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>DIQIR - Admin</title>
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

            <a class="navbar-brand fw-bold text-white" href="{{ route('admin') }}">
                DIQIR KONVEKSI
                <br>
                - Admin
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                {{-- Menu Kiri --}}
                <ul class="navbar-nav me-auto">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a href="{{ route('admin') }}" class="nav-link text-white">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.profile') }}" class="nav-link text-white">Profil</a>
                            </li>
                        @endif
                    @endauth
                </ul>

                {{-- Menu Kanan --}}
                <div class="ms-auto d-flex align-items-center gap-3">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <span class="text-white small">{{ auth()->user()->name }}</span>

                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                            </form>
                        @endif
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-light btn-sm">Login</a>
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