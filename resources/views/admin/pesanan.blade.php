@extends('layouts.admin')

@section('content')

<div class="container my-5">

    <h2 class="fw-bold text-success mb-4">
        Data Pesanan Admin
    </h2>

    @forelse($orders as $item)

    @php
        $produk = json_decode($item->produk, true);
        $total = 0;
    @endphp

    <div class="card mb-3 shadow-sm">
        <div class="card-body">

            <h6 class="fw-bold">
                @if($produk)
                    @foreach($produk as $p)
                        {{ $p['nama'] }} ({{ $p['qty'] }}) <br>
                        @php
                            $total += $p['harga'] * $p['qty'];
                        @endphp
                    @endforeach
                @endif
            </h6>

            <p class="mb-1">
                Total: <strong>Rp {{ number_format($total,0,',','.') }}</strong>
            </p>

            <span class="badge 
                @if($item->status=='Proses') bg-warning
                @elseif($item->status=='Dikirim') bg-primary
                @else bg-success
                @endif">
                {{ $item->status }}
            </span>

        </div>
    </div>

    @empty
        <p>Belum ada pesanan</p>
    @endforelse

</div>

@endsection