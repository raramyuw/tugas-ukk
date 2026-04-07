@extends('layouts.user')

@section('content')

<div class="container my-5">

    <!-- JUDUL -->
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color:#8ae0ae;">
            Tentang Kami 
        </h1>
        <p class="text-muted mt-2">
            Kenali lebih dekat Diqir Collection ✨
        </p>
    </div>

    <!-- ABOUT -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-4">
            <img src="/images/logoatas.png" class="img-fluid rounded shadow">
        </div>

        <div class="col-md-6">
            <h3 class="fw-bold" style="color:#3A6F57;">
                DIQIR COLLECTION 
            </h3>

            <p class="mt-3 text-muted">
                <strong>Diqir Collection</strong> adalah usaha yang bergerak di bidang
                penjualan pakaian dan seragam sekolah mulai dari SD, SMP, SMA/SMK,
                hingga seragam Guru.
            </p>

            <p class="text-muted">
                Kami mengutamakan <strong>kualitas bahan</strong>, <strong>kenyamanan</strong>,
                serta <strong>desain modern</strong> agar pelanggan merasa puas dan percaya
                dengan produk kami 
            </p>
        </div>
    </div>

    <!-- VISI MISI -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h4 class="fw-bold" style="color:#8ae0ae;">Visi</h4>
                    <p class="text-muted mt-2">
                        Menjadi penyedia pakaian dan seragam terbaik yang
                        mengutamakan kualitas, kenyamanan, dan kepuasan pelanggan.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h4 class="fw-bold" style="color:#8ae0ae;">Misi</h4>
                    <ul class="text-muted mt-2">
                        <li>Menyediakan produk berkualitas tinggi</li>
                        <li>Memberikan harga yang terjangkau</li>
                        <li>Pelayanan yang ramah dan profesional</li>
                        <li>Terus berinovasi mengikuti tren</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- PROMO -->
    <div class="card border-0 shadow-sm p-4 text-center" style="background:#E8F5EE;">
        <h3 class="fw-bold" style="color:#3A6F57;">
            Promo Spesial 
        </h3>

        <p class="mt-3">
            Dapatkan <strong>potongan harga Rp20.000</strong> untuk
            setiap pembelian minimal <strong>Rp450.000</strong> 
        </p>

        <p class="mb-0 fst-italic">
            Yuk belanja sekarang sebelum kehabisan 
        </p>
    </div>

</div>

@endsection