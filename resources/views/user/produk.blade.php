@extends('layouts.user')

@section('content')
<h2 class="mb-4 fw-bold text-success text-center">Daftar Produk DIQIR COLLECTION</h2>

<div class="row">
    @if(isset($products) && $products->count() > 0)
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                @if($product->image && file_exists(storage_path('app/public/' . $product->image)))
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-produk" style="height: 250px; object-fit: cover;">
                @else
                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 250px;">
                        <span class="text-white">No Image</span>
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="text-muted">{{ Str::limit($product->description, 50) }}</p>
                    <p class="fw-bold">Stok: {{ $product->stock }} pcs</p>
                    <p class="text-success fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    
                    <!-- TOMBOL BACA SELENGKAPNYA -->
                    <button type="button" class="btn btn-outline-primary btn-sm w-100 mb-2" data-bs-toggle="modal" data-bs-target="#modal-{{ $product->id }}">
                        Baca Selengkapnya
                    </button>
                    
                    @auth
                    <form action="{{ route('keranjang.tambah') }}" method="POST">
                        @csrf
                        <input type="hidden" name="nama" value="{{ $product->name }}">
                        <input type="hidden" name="harga" value="{{ $product->price }}">
                        <button type="submit" class="btn btn-success w-100">Beli</button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-success w-100">Login untuk Beli</a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="modal-{{ $product->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="modalLabel-{{ $product->id }}">{{ $product->name }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        @if($product->image && file_exists(storage_path('app/public/' . $product->image)))
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded mb-3" style="width: 100%;">
                        @endif
                        <h6 class="fw-bold">Deskripsi Lengkap:</h6>
                        <p>{{ $product->description ?: 'Tidak ada deskripsi untuk produk ini.' }}</p>
                        <hr>
                        <p><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p><strong>Stok:</strong> {{ $product->stock }} pcs</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        @auth
                        <form action="{{ route('keranjang.tambah') }}" method="POST">
                            @csrf
                            <input type="hidden" name="nama" value="{{ $product->name }}">
                            <input type="hidden" name="harga" value="{{ $product->price }}">
                            <button type="submit" class="btn btn-success">Beli Sekarang</button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-success">Login untuk Beli</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="col-12 text-center">
            <p>Belum ada produk. Silakan admin menambahkan produk.</p>
        </div>
    @endif
</div>

<style>
.img-produk {
    width: 100%;
    height: 250px;
    object-fit: cover;
}
.btn-outline-primary {
    background-color: transparent;
    border: 1px solid #2ecc71;
    color: #2ecc71;
}
.btn-outline-primary:hover {
    background-color: #2ecc71;
    color: white;
}
</style>
@endsection