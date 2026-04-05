@extends('layouts.admin')

@section('content')

<!-- HERO -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

    <div class="carousel-inner">

        <!-- SLIDE 1 : DIQIR COLLECTION -->
        <div class="carousel-item active">
            <div class="hero-slide slide-1 d-flex align-items-center text-center text-white">
                <div class="container">
                    <h1 class="fw-bold">DIQIR COLLECTION</h1>
                    <p class="fs-5 mt-3">
                        Brand pakaian terpercaya untuk seragam sekolah & baju harian ✨
                    </p>
                    <a href="{{ route('produk') }}" class="btn btn-success btn-lg mt-3">
                        Lihat Produk 
                    </a>
                </div>
            </div>
        </div>

        <!-- SLIDE 2 : RAMADHAN -->
        <div class="carousel-item">
            <div class="hero-slide slide-2 d-flex align-items-center text-center text-white">
                <div class="container">
                    <h1 class="fw-bold">🌙 Koleksi Ramadhan 1447 H</h1>
                    <p class="fs-5 mt-3">
                        Nyaman, sopan, dan elegan untuk ibadah & aktivitas Ramadhan
                    </p>
                    <a href="{{ route('produk') }}" class="btn btn-warning btn-lg mt-3">
                        Lihat Koleksi Ramadhan ✨
                    </a>
                </div>
            </div>
        </div>

        <!-- SLIDE 3 : EVENT USTADZ -->
        <div class="carousel-item">
            <div class="hero-slide slide-3 d-flex align-items-center text-center text-white">
                <div class="container">
                    <h1 class="fw-bold">📢 Seminar Ramadhan Spesial</h1>
                    <p class="fs-5 mt-3">
                        Bersama <strong>Oki Setiana Dewi</strong><br>
                        🗓️ 15 Ramadhan 1447 H
                    </p>
                    <a href="#" class="btn btn-danger btn-lg mt-3">
                        Daftar Sekarang 📌
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- NAVIGATION -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<style>
.hero-slide {
    min-height: 75vh;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

/* slide 1 */
.slide-1 {
    background-image: 
        linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
        url('/images/tampilan.jpg');
}

/* slide 2 */
.slide-2 {
    background-image: 
        linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
        url('/images/tampilanramadhan.jpg');
}

/* slide 3 */
.slide-3 {
    background-image: 
        linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
        url('/images/tampilanoki.jpg');
}
</style>

<!-- ABOUT -->
<div class="row mb-5">
    <div class="col-md-6">
        <h3 class="fw-bold">Tentang Kami 💚</h3>
        <p class="text-muted">
            DIQIR COLLECTION adalah perusahaan yang bergerak di bidang fashion,
            khususnya pakaian dan seragam sekolah dari SD, SMP, SMA/SMK hingga Guru.
            Kami mengutamakan kualitas bahan, kenyamanan, dan harga terjangkau ✨
        </p>
    </div>

    <div class="col-md-6">
        <h3 class="fw-bold">Kenapa Pilih Kami? ⭐</h3>
        <ul class="text-muted">
            <li>✔️ Bahan nyaman & berkualitas</li>
            <li>✔️ Ukuran lengkap</li>
            <li>✔️ Harga ramah kantong</li>
            <li>✔️ Cocok untuk sekolah & formal</li>
        </ul>
    </div>
</div>

<!-- PROMO -->
<div class="alert alert-success text-center shadow-sm">
    <h4 class="fw-bold mb-2">🎉 PROMO SPESIAL 🎉</h4>
    <p class="mb-1 fs-5">
        Potongan <strong>Rp 20.000</strong> untuk pembelian di atas
        <strong>Rp 450.000</strong> 💸
    </p>
    <small class="text-muted">
        *Syarat dan ketentuan berlaku dari tanggal 28 januari - 28 februari 2026
    </small>
</div>

<!-- FOOTER -->
<footer class="mt-5 pt-5 pb-4" style="background:#F8F9FA;">
    <div class="container">
        <div class="row">

            <!-- ABOUT -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">About Diqir</h5>
                <p class="text-muted">
                    Diqir Collection menyediakan pakaian berkualitas
                    dengan desain modern dan nyaman digunakan 👕✨
                </p>
            </div>

            <!-- SUPPORT -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Customer Support</h5>
                <ul class="list-unstyled text-muted">
                    <li>Terms & Conditions</li>
                    <li>Shipping Policy</li>
                    <li>Return Policy</li>
                    <li>Measurement Guide</li>
                </ul>
            </div>

            <!-- CONTACT -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Contact Us</h5>
                <p class="text-muted mb-1">
                    🕘 Mon - Fri (09.00 - 17.00)
                </p>
                <p class="text-muted mb-2">
                    📧 diqircollection@gmail.com
                </p>

                <div class="d-flex gap-3 fs-4">
                    <span><img src="" alt=""></span>
                    <span>▶️</span>
                    <span>🎵</span>
                </div>
            </div>

        </div>

        <hr>

        <p class="text-center text-muted mb-0">
            © {{ date('Y') }} Diqir Collection. All Rights Reserved.
        </p>
    </div>
</footer>

@endsection