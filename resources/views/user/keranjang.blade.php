@extends('layouts.user')

@section('content')

<div class="container my-5">


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <h2 class="fw-bold mb-4" style="color:#4C8C6B;">
        🛒 Keranjang Belanja
    </h2>

    @if(!empty($cart))

        @php $total = 0; @endphp

        @foreach($cart as $index => $item)

            @php
                $subtotal = $item['harga'] * $item['qty'];
                $total += $subtotal;
            @endphp

            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>
                        <h6 class="mb-1 fw-bold">
                            {{ $item['nama'] }}
                        </h6>

                        <div class="d-flex align-items-center mt-2">

                            {{-- Kurang --}}
                            <form action="{{ route('keranjang.kurangQty', $index) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-outline-danger">-</button>
                            </form>

                            <span class="mx-3 fw-bold">
                                {{ $item['qty'] }}
                            </span>

                            {{-- Tambah --}}
                            <form action="{{ route('keranjang.tambahQty', $index) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-outline-success">+</button>
                            </form>

                        </div>
                    </div>

                    <div class="text-end">
                        <div class="fw-bold text-success">
                            Rp {{ number_format($subtotal,0,',','.') }}
                        </div>

                        {{-- Hapus --}}
                        <form action="{{ route('keranjang.hapus', $index) }}" method="POST" class="mt-2">
                            @csrf
                            <button class="btn btn-sm btn-danger">
                                Hapus
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        @endforeach

        <div class="text-end mt-4">

            <h5>Total:
                <span class="text-success">
                    Rp {{ number_format($total,0,',','.') }}
                </span>
            </h5>

            <a href="{{ route('checkout') }}" class="btn btn-success mt-2">
    Checkout
</a>

            <a href="{{ route('produk') }}" class="btn btn-outline-success mt-2">
                + Tambah Produk
            </a>

            <form action="{{ route('keranjang.kosongkan') }}" method="POST" class="mt-2">
                @csrf
                <button class="btn btn-outline-danger">
                    Kosongkan Keranjang
                </button>
            </form>

        </div>

    @else

        <div class="alert alert-info">
            Keranjang masih kosong.
        </div>

        <a href="{{ route('produk') }}" class="btn btn-success">
            Belanja Sekarang
        </a>

    @endif
<form action="{{ route('checkout') }}" method="POST">
    @csrf
    
</form>

</div>

@endsection
