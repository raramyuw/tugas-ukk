@extends('layouts.user')

@section('content')

<div class="container my-5">

    <h2 class="fw-bold mb-4 text-success">
        Checkout
    </h2>

    <!-- ===== DATA USER (SIMPLE, DI ATAS BARANG) ===== -->
    <div class="mb-4">
        <p><strong>{{ auth()->user()->name }}, </strong> {{ auth()->user()->no_hp }},
        {{ auth()->user()->alamat }}, {{ auth()->user()->kota }} - {{ auth()->user()->kode_pos }}</p>
         
    </div>

    <hr>

    <!-- ===== BARANG YANG DIBELI (DENGAN FOTO) ===== -->
    <h5 class="fw-bold mb-3">Barang yang dibeli:</h5>

    @php $total = 0; @endphp

    @foreach($cart ?? [] as $item)
        @php
            $subtotal = $item['harga'] * $item['qty'];
            $total += $subtotal;
        @endphp

        <div class="d-flex align-items-center gap-3 mb-3">
            
            <!-- INFO BARANG -->
            <div class="flex-grow-1">
                <div class="fw-bold">{{ $item['nama'] }}</div>
                <div class="text-muted small">Jumlah: {{ $item['qty'] }}</div>
            </div>

            <!-- HARGA -->
            <div class="text-success fw-bold">
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
        <button class="btn btn-success mt-3 px-4">
            Buat Pesanan
        </button>
    </form>

</div>

@endsection