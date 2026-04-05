@extends('layouts.user')

@section('content')

<div class="container my-5">

    <h2 class="fw-bold mb-4 text-success">
        Checkout
    </h2>

    @php $total = 0; @endphp

    @foreach($cart ?? [] as $item)
        @php
            $subtotal = $item['harga'] * $item['qty'];
            $total += $subtotal;
        @endphp

        <div class="d-flex justify-content-between mb-2">
            <div>
                {{ $item['nama'] }} ({{ $item['qty'] }})
            </div>
            <div>
                Rp {{ number_format($subtotal,0,',','.') }}
            </div>
        </div>
    @endforeach

    <hr>

    <h5>Total Bayar:
        <span class="text-success">
            Rp {{ number_format($total,0,',','.') }}
        </span>
    </h5>

    <form method="POST" action="{{ route('checkout.proses') }}">
        @csrf
        <button class="btn btn-success mt-3">
            Bayar Sekarang
        </button>
    </form>

</div>

@endsection