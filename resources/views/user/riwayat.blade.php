@extends('layouts.user')

@section('content')

<div class="container my-5">

    <h2 class="fw-bold mb-4 text-success">
        Riwayat Pesanan 
    </h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @forelse($orders ?? [] as $order)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">

                <p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y') }}</p>
@php
    $admin = '62895395233349'; // ganti nomor kamu
    $message = urlencode("Halo admin, saya ingin bertanya tentang pesanan saya 🙏");
@endphp

<a href="https://wa.me/{{ $admin }}?text={{ $message }}" 
   target="_blank"
   class="btn btn-success btn-sm mt-2">
   💬 Chat Admin
</a>
                @php
                    $produk = json_decode($order->produk, true);
                @endphp

                @foreach ($produk ?? [] as $item)
                    <div>
                        {{ $item['nama'] }} ({{ $item['qty'] }})
                    </div>
                @endforeach

                <hr>

                <!-- STATUS -->
                <p>
                    <strong>Status:</strong>
                    <span class="badge 
                        @if($order->status == 'Proses') bg-warning text-dark
                        @elseif($order->status == 'Dikirim') bg-info text-white
                        @elseif($order->status == 'Selesai') bg-success text-white
                        @else bg-secondary
                        @endif
                    ">
                        {{ $order->status }}
                    </span>
                </p>

                <!-- TOTAL -->
                <h6>Total:
                    <span class="text-success">
                        Rp {{ number_format($order->total, 0, ',', '.') }}
                    </span>
                </h6>

            </div>
        </div>

    @empty

        <div class="alert alert-info">
            Belum ada pesanan.
        </div>

    @endforelse

</div>

@endsection