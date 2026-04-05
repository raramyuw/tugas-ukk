@extends('layouts.user')

@section('content')

<div class="container my-5">


<div class="card p-4 shadow-sm">

    <h5>Total Bayar:</h5>
    <h3 class="text-success">
        Rp {{ number_format($order->total,0,',','.') }}
    </h3>

    <hr>

    <h5>Transfer ke:</h5>

    <p>
        🏦 <strong>BRI</strong><br>
        0153766184<br>
        a.n DIQIR COLLECTION
    </p>

    <p>
        💳 <strong>DANA</strong><br>
        0895395233349
    </p>

    <hr>

    <p class="text-danger">
        Setelah transfer, klik tombol di bawah ya 👇
    </p>

    <a href="{{ route('riwayat') }}" class="btn btn-success">
        Saya Sudah Bayar
    </a>

</div>

</div>

@endsection