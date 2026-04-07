<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>DIQIR - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #F4FBF7; }
        .btn { display: inline-block; padding: 10px 15px; margin: 5px; text-decoration: none; border-radius: 5px; }
        .btn-primary { background: #0e7146; color: white; border: none; }
        .btn-success { background: #8ae0ae; color: white; border: none; }
        .btn-danger { background: #e74c3c; color: white; border: none; }
        .btn-warning { background: #f39c12; color: white; border: none; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #16423b; color: white; }
        tr:hover { background: #f5f5f5; }
        .alert { padding: 10px; margin-bottom: 20px; border-radius: 5px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color:#8ae0ae;">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="{{ route('admin.dashboard') }}">
                DIQIR KONVEKSI - Admin
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="{{ route('admin.profile') }}" class="nav-link text-white">Profil</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>