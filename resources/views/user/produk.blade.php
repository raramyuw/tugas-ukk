@extends('layouts.user')

@section('content')

<h2 class="mb-4 fw-bold text-success text-center">
    Daftar Produk DIQIR COLLECTION
</h2>

<div class="row">

    {{-- SD --}}
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <img src="/images/seragamsdbocil.jpg" class="card-img-top img-produk">
            <div class="card-body">
                <h5 class="card-title">Seragam SD Merah Putih</h5>
                <p class="text-muted">Bahan Drill. Semua ukuran tersedia</p><form action="{{ route('keranjang.tambah') }}" method="POST">

                @auth
                <form action="{{ route('keranjang.tambah') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nama" value="Seragam SD Merah Putih">
                    <input type="hidden" name="harga" value="120000">

                    <button type="submit" class="btn btn-success w-100">
                        Rp 120.000
                    </button>
                </form>
                @else
                <a href="/login" class="btn btn-success w-100">
                    Rp 120.000
                </a>
                @endauth

            </div>
        </div>
    </div>

    {{-- SMP --}}
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <img src="/images/seragamsmpbocil.jpg" class="card-img-top img-produk">
            <div class="card-body">
                <h5 class="card-title">Seragam SMP Putih Biru</h5>
                <p class="text-muted">Bahan Drill. Semua ukuran tersedia</p>

                @auth
                <form action="{{ route('keranjang.tambah') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nama" value="Seragam SMP Putih Biru">
                    <input type="hidden" name="harga" value="175000">

                    <button type="submit" class="btn btn-success w-100">
                        Rp 175.000
                    </button>
                </form>
                @else
                <a href="/login" class="btn btn-success w-100">
                    Rp 175.000
                </a>
                @endauth

            </div>
        </div>
    </div>

    {{-- SMA --}}
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <img src="/images/seragamsma.jpg" class="card-img-top img-produk">
            <div class="card-body">
                <h5 class="card-title">Seragam SMA/SMK Putih Abu</h5>
                <p class="text-muted">Bahan Drill. Semua ukuran tersedia</p>

                @auth
                <form action="{{ route('keranjang.tambah') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nama" value="Seragam SMA/SMK Putih Abu">
                    <input type="hidden" name="harga" value="250000">

                    <button type="submit" class="btn btn-success w-100">
                        Rp 250.000
                    </button>
                </form>
                @else
                <a href="/login" class="btn btn-success w-100">
                    Rp 250.000
                </a>
                @endauth

            </div>
             </div>
    </div>


            {{-- pns --}}
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <img src="/images/pns.jpeg" class="card-img-top img-produk">
            <div class="card-body">
                <h5 class="card-title">Seragam Guru PNS</h5>
                <p class="text-muted">Bahan Drill. Semua ukuran tersedia</p>

                @auth
                <form action="{{ route('keranjang.tambah') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nama" value="Seragam Guru PNS">
                    <input type="hidden" name="harga" value="350000">

                    <button type="submit" class="btn btn-success w-100">
                        Rp 350.000
                    </button>
                </form>
                @else
                <a href="/login" class="btn btn-success w-100">
                    Rp 350.000
                </a>
                @endauth

            </div>
             </div>
    </div>


            {{-- korpri --}}
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <img src="/images/korpri.jpg" class="card-img-top img-produk">
            <div class="card-body">
                <h5 class="card-title">Seragam Guru Korpri</h5>
                <p class="text-muted">Bahan Drill. Semua ukuran tersedia</p>

                @auth
                <form action="{{ route('keranjang.tambah') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nama" value="Seragam Guru Korpri">
                    <input type="hidden" name="harga" value="400000">

                    <button type="submit" class="btn btn-success w-100">
                        Rp 400.000
                    </button>
                </form>
                @else
                <a href="/login" class="btn btn-success w-100">
                    Rp 400.000
                </a>
                @endauth

            </div>
             </div>
    </div>

        </div>
    </div>

</div>

<style>
.img-produk {
    width: 100%;
    height: 280px;
    object-fit: cover;
}
</style>

@endsection
