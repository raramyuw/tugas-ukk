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
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Seragam SD Merah Putih</h5>
                <p class="text-muted">Bahan Drill. Semua ukuran tersedia</p>

                <button type="button" class="btn btn-outline-secondary btn-sm mb-2 w-100" data-bs-toggle="modal" data-bs-target="#modalSD">
                     Deskripsi Detail
                </button>

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
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Seragam SMP Putih Biru</h5>
                <p class="text-muted">Bahan Drill. Semua ukuran tersedia</p>

                <button type="button" class="btn btn-outline-secondary btn-sm mb-2 w-100" data-bs-toggle="modal" data-bs-target="#modalSMP">
                     Deskripsi Detail
                </button>

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
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Seragam SMA/SMK Putih Abu</h5>
                <p class="text-muted">Bahan Drill. Semua ukuran tersedia</p>

                <button type="button" class="btn btn-outline-secondary btn-sm mb-2 w-100" data-bs-toggle="modal" data-bs-target="#modalSMA">
                     Deskripsi Detail
                </button>

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

    {{-- PNS --}}
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <img src="/images/pns.jpeg" class="card-img-top img-produk">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Seragam Guru PNS</h5>
                <p class="text-muted">Bahan Drill. Semua ukuran tersedia</p>

                <button type="button" class="btn btn-outline-secondary btn-sm mb-2 w-100" data-bs-toggle="modal" data-bs-target="#modalPNS">
                     Deskripsi Detail
                </button>

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

    {{-- KORPRI --}}
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <img src="/images/korpri.jpg" class="card-img-top img-produk">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Seragam Guru Korpri</h5>
                <p class="text-muted">Bahan Drill. Semua ukuran tersedia</p>

                <button type="button" class="btn btn-outline-secondary btn-sm mb-2 w-100" data-bs-toggle="modal" data-bs-target="#modalKorpri">
                    Deskripsi Detail
                </button>

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


{{-- ===================== MODAL DESKRIPSI ===================== --}}

{{-- Modal SD --}}
<div class="modal fade" id="modalSD" tabindex="-1" aria-labelledby="modalSDLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalSDLabel">Detail Produk – Seragam SD Merah Putih</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <img src="/images/seragamsdbocil.jpg" class="img-fluid rounded mb-3" style="max-height:260px; width:100%; object-fit:cover;">

                <h6 class="fw-bold text-success">Bahan & Kualitas</h6>
                <p>Seragam SD Merah Putih dari <strong>DIQIR COLLECTION</strong> menggunakan bahan <strong>Drill Katun Premium</strong> pilihan yang terkenal kuat, adem, dan tidak mudah kusut. Bahan drill dengan gramasi sedang ini sangat ideal dipakai dalam aktivitas sehari-hari di sekolah karena mampu menyerap keringat dengan baik, menjaga tubuh tetap nyaman meski dipakai seharian. Jahitan menggunakan teknik <em>overdeck</em> di bagian dalam agar tidak menggores kulit halus anak-anak, dan benang yang digunakan adalah benang jahit kualitas ekspor yang tahan lama meski sering dicuci.</p>

                <h6 class="fw-bold text-success mt-3">Ukuran yang Tersedia</h6>
                <p>Kami menyediakan ukuran lengkap untuk semua jenjang kelas SD, mulai dari kelas 1 hingga kelas 6. Berikut panduan ukuran yang tersedia:</p>
                <table class="table table-bordered table-sm">
                    <thead class="table-success">
                        <tr><th>Kode Ukuran</th><th>Perkiraan Usia</th><th>Lingkar Dada</th><th>Panjang Baju</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>S / 6</td><td>6–7 tahun</td><td>60–64 cm</td><td>42 cm</td></tr>
                        <tr><td>M / 8</td><td>7–8 tahun</td><td>64–68 cm</td><td>46 cm</td></tr>
                        <tr><td>L / 10</td><td>9–10 tahun</td><td>68–72 cm</td><td>50 cm</td></tr>
                        <tr><td>XL / 12</td><td>11–12 tahun</td><td>72–76 cm</td><td>54 cm</td></tr>
                        <tr><td>XXL / 14</td><td>Anak berbadan besar</td><td>76–82 cm</td><td>57 cm</td></tr>
                    </tbody>
                </table>
                <p class="text-muted small">*Jika ragu dengan ukuran, silakan hubungi kami via WhatsApp untuk konsultasi gratis.</p>

                <h6 class="fw-bold text-success mt-3">Warna & Desain</h6>
                <p>Seragam ini tersedia dalam warna <strong>Merah Putih</strong> sesuai standar Kemendikbud. Atasan berwarna putih bersih dan bawahan (rok/celana) berwarna merah terang. Warna dijamin tidak mudah luntur meski dicuci berkali-kali menggunakan deterjen biasa sekalipun, karena kami menggunakan pewarna kain bermutu tinggi dengan proses fiksasi yang baik.</p>

                <h6 class="fw-bold text-success mt-3">Keunggulan Produk</h6>
                <ul>
                    <li>Bahan tidak mudah melar meskipun sering dipakai dan dicuci</li>
                    <li>Jahitan rapi dan kuat, tahan aktivitas bermain anak</li>
                    <li>Tersedia dalam pilihan <strong>rok</strong> untuk perempuan dan <strong>celana pendek/panjang</strong> untuk laki-laki</li>
                    <li>Pengiriman ke seluruh Indonesia</li>
                    <li>Bisa pesan dalam jumlah banyak (grosir sekolah) dengan harga spesial</li>
                </ul>

                <div class="alert alert-success mt-3">
                    <strong>Harga: Rp 120.000 / stel</strong> (sudah termasuk atasan + bawahan)
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal SMP --}}
<div class="modal fade" id="modalSMP" tabindex="-1" aria-labelledby="modalSMPLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalSMPLabel">Detail Produk – Seragam SMP Putih Biru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <img src="/images/seragamsmpbocil.jpg" class="img-fluid rounded mb-3" style="max-height:260px; width:100%; object-fit:cover;">

                <h6 class="fw-bold text-primary">Bahan & Kualitas</h6>
                <p>Seragam SMP Putih Biru dari <strong>DIQIR COLLECTION</strong> dibuat dari bahan <strong>Drill Premium 210 GSM</strong> yang lebih tebal dibandingkan seragam SD, menyesuaikan kebutuhan aktivitas siswa SMP yang lebih banyak bergerak. Bahan ini terasa ringan di badan namun tetap memberikan tampilan yang rapi dan formal. Kain tidak tembus pandang sehingga sangat nyaman digunakan. Setiap jahitan dikerjakan dengan mesin jahit industri berteknologi tinggi untuk memastikan setiap sambungan kuat dan presisi.</p>

                <h6 class="fw-bold text-primary mt-3">Ukuran yang Tersedia</h6>
                <p>Tersedia dalam ukuran remaja dari kecil hingga dewasa, cocok untuk siswa kelas 7 sampai kelas 9:</p>
                <table class="table table-bordered table-sm">
                    <thead class="table-primary">
                        <tr><th>Ukuran</th><th>Lingkar Dada</th><th>Panjang Baju</th><th>Keterangan</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>S</td><td>76–80 cm</td><td>58 cm</td><td>Kelas 7 badan kecil</td></tr>
                        <tr><td>M</td><td>80–84 cm</td><td>62 cm</td><td>Standar kelas 7–8</td></tr>
                        <tr><td>L</td><td>84–88 cm</td><td>65 cm</td><td>Standar kelas 8–9</td></tr>
                        <tr><td>XL</td><td>88–94 cm</td><td>68 cm</td><td>Badan besar/tinggi</td></tr>
                        <tr><td>XXL</td><td>94–100 cm</td><td>71 cm</td><td>Ekstra besar</td></tr>
                    </tbody>
                </table>

                <h6 class="fw-bold text-primary mt-3">Warna & Desain</h6>
                <p>Menggunakan kombinasi warna <strong>Putih dan Biru Dongker</strong> sesuai standar nasional seragam SMP. Atasan putih dengan kerah dan kancing standar sekolah, serta bawahan biru tua untuk rok maupun celana. Sablon atau bordir logo OSIS/sekolah bisa ditambahkan atas permintaan (biaya terpisah).</p>

                <h6 class="fw-bold text-primary mt-3">Keunggulan Produk</h6>
                <ul>
                    <li>Bahan anti-kusut, ideal untuk siswa aktif</li>
                    <li>Warna putih tahan kuning meski sering dijemur di bawah terik matahari</li>
                    <li>Tersedia rok biru panjang/pendek dan celana panjang biru</li>
                    <li>Tersedia layanan sablon nama dan kelas</li>
                    <li>Cocok untuk pemesanan seragam kelas/sekolah dalam jumlah besar</li>
                </ul>

                <div class="alert alert-primary mt-3">
                    <strong>Harga: Rp 175.000 / stel</strong> (sudah termasuk atasan + bawahan)
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal SMA --}}
<div class="modal fade" id="modalSMA" tabindex="-1" aria-labelledby="modalSMALabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="modalSMALabel">Detail Produk – Seragam SMA/SMK Putih Abu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <img src="/images/seragamsma.jpg" class="img-fluid rounded mb-3" style="max-height:260px; width:100%; object-fit:cover;">

                <h6 class="fw-bold text-secondary">Bahan & Kualitas</h6>
                <p>Seragam SMA/SMK Putih Abu dari <strong>DIQIR COLLECTION</strong> menggunakan bahan <strong>Drill Tropical Premium 220 GSM</strong> yang memberikan kenyamanan sepanjang hari bahkan untuk kegiatan pelajaran praktik di SMK sekalipun. Bahan ini memiliki tekstur halus namun tetap kuat terhadap gesekan. Pilihan bahan yang matang membuat seragam ini tidak mudah berbulu (pilling) setelah berkali-kali dicuci, sehingga tetap terlihat baru dan rapi dalam jangka panjang.</p>

                <h6 class="fw-bold text-secondary mt-3">Ukuran yang Tersedia</h6>
                <p>Tersedia dalam ukuran remaja hingga dewasa besar, menyesuaikan keragaman postur tubuh siswa SMA dan SMK:</p>
                <table class="table table-bordered table-sm">
                    <thead class="table-secondary">
                        <tr><th>Ukuran</th><th>Lingkar Dada</th><th>Panjang Baju</th><th>Keterangan</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>S</td><td>82–86 cm</td><td>62 cm</td><td>Badan kecil/kurus</td></tr>
                        <tr><td>M</td><td>86–90 cm</td><td>65 cm</td><td>Standar umum</td></tr>
                        <tr><td>L</td><td>90–96 cm</td><td>68 cm</td><td>Standar besar</td></tr>
                        <tr><td>XL</td><td>96–102 cm</td><td>71 cm</td><td>Badan besar</td></tr>
                        <tr><td>XXL</td><td>102–110 cm</td><td>74 cm</td><td>Ekstra besar</td></tr>
                        <tr><td>XXXL</td><td>110–118 cm</td><td>77 cm</td><td>Jumbo</td></tr>
                    </tbody>
                </table>

                <h6 class="fw-bold text-secondary mt-3">Warna & Desain</h6>
                <p>Tersedia warna <strong>Putih dan Abu-Abu</strong> sesuai standar seragam nasional SMA/SMK. Abu-abu yang kami gunakan adalah abu-abu medium (tidak terlalu terang dan tidak terlalu gelap) sehingga terlihat elegan dan formal. Warna abu-abu tahan pudar dan tidak berubah kecoklatan meski sering dicuci dengan berbagai jenis deterjen.</p>

                <h6 class="fw-bold text-secondary mt-3">Keunggulan Produk</h6>
                <ul>
                    <li>Cocok untuk kegiatan formal maupun upacara bendera</li>
                    <li>Bahan tebal namun tetap breathable, tidak pengap</li>
                    <li>Tersedia model rok abu panjang (syar'i) dan rok standar, serta celana abu panjang</li>
                    <li>Bisa dipesan dengan tambahan bordir nama, kelas, atau logo sekolah</li>
                    <li>Tersedia untuk pemesanan grosir dengan harga lebih hemat</li>
                </ul>

                <div class="alert alert-secondary mt-3">
                 <strong>Harga: Rp 250.000 / stel</strong> (sudah termasuk atasan + bawahan)
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal PNS --}}
<div class="modal fade" id="modalPNS" tabindex="-1" aria-labelledby="modalPNSLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #6f4e37;">
                <h5 class="modal-title" id="modalPNSLabel">Detail Produk – Seragam Guru PNS</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <img src="/images/pns.jpeg" class="img-fluid rounded mb-3" style="max-height:260px; width:100%; object-fit:cover;">

                <h6 class="fw-bold" style="color:#6f4e37;">Bahan & Kualitas</h6>
                <p>Seragam Guru PNS dari <strong>DIQIR COLLECTION</strong> dibuat menggunakan bahan <strong>Drill Wool-Look Premium 240 GSM</strong> yang memberikan kesan profesional dan elegan. Bahan ini memiliki permukaan halus menyerupai kain wool namun tetap ringan dan sejuk dipakai di iklim tropis Indonesia. Cocok untuk dipakai dalam kegiatan belajar mengajar, rapat dinas, maupun upacara resmi. Proses finishing kain melalui tahap <em>heat setting</em> untuk memastikan serat kain tidak mudah melar dan tetap mempertahankan bentuknya.</p>

                <h6 class="fw-bold mt-3" style="color:#6f4e37;">Ukuran yang Tersedia</h6>
                <p>Tersedia dalam ukuran lengkap untuk pria dan wanita, dari ukuran S hingga XXXL dengan panduan sebagai berikut:</p>
                <table class="table table-bordered table-sm">
                    <thead style="background-color:#6f4e37; color:white;">
                        <tr><th>Ukuran</th><th>Lingkar Dada</th><th>Panjang Baju</th><th>Pinggang Bawahan</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>S</td><td>84–88 cm</td><td>64 cm</td><td>68–72 cm</td></tr>
                        <tr><td>M</td><td>88–94 cm</td><td>67 cm</td><td>72–78 cm</td></tr>
                        <tr><td>L</td><td>94–100 cm</td><td>70 cm</td><td>78–84 cm</td></tr>
                        <tr><td>XL</td><td>100–108 cm</td><td>73 cm</td><td>84–92 cm</td></tr>
                        <tr><td>XXL</td><td>108–116 cm</td><td>76 cm</td><td>92–100 cm</td></tr>
                        <tr><td>XXXL</td><td>116–124 cm</td><td>79 cm</td><td>100–110 cm</td></tr>
                    </tbody>
                </table>

                <h6 class="fw-bold mt-3" style="color:#6f4e37;">Warna & Desain</h6>
                <p>Seragam Guru PNS tersedia dalam warna <strong>Khaki/Coklat Muda</strong> (seragam hari Kamis-Jumat) dan <strong>Abu-Abu</strong> (seragam hari Senin-Rabu) sesuai peraturan instansi masing-masing. Warna tahan lama dan tidak cepat pudar. Desain mengikuti standar seragam ASN/PNS sesuai Peraturan Pemerintah yang berlaku, dilengkapi dengan saku dada dan kancing resmi.</p>

                <h6 class="fw-bold mt-3" style="color:#6f4e37;">Keunggulan Produk</h6>
                <ul>
                    <li>Tampilan profesional dan rapi sepanjang hari</li>
                    <li>Bahan tidak mudah kusut, cocok untuk aktivitas mengajar intensif</li>
                    <li>Tersedia model wanita (rok/celana) dan pria (celana panjang)</li>
                    <li>Bisa ditambahkan atribut pangkat, nama dada (bordir/sablon)</li>
                    <li>Pengerjaan cepat untuk pemesanan sekolah/instansi</li>
                </ul>

                <div class="alert mt-3" style="background-color:#f5ede0; border-left: 4px solid #6f4e37;">
                    <strong>Harga: Rp 350.000 / stel</strong> (sudah termasuk atasan + bawahan)
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal Korpri --}}
<div class="modal fade" id="modalKorpri" tabindex="-1" aria-labelledby="modalKorpriLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #1a4c91;">
                <h5 class="modal-title" id="modalKorpriLabel">Detail Produk – Seragam Guru Korpri</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <img src="/images/korpri.jpg" class="img-fluid rounded mb-3" style="max-height:260px; width:100%; object-fit:cover;">

                <h6 class="fw-bold" style="color:#1a4c91;">Bahan & Kualitas</h6>
                <p>Seragam Korpri dari <strong>DIQIR COLLECTION</strong> merupakan produk unggulan kami yang dibuat dari bahan <strong>Rapier / Serena Premium</strong> yang dikenal khas untuk seragam Korpri. Bahan ini memiliki motif tenunan khas warna biru dongker dengan sedikit kilap yang memberikan kesan formal dan berwibawa. Teksturnya halus di kulit namun kuat dan tidak mudah sobek. Kain melalui proses anti-kusut sehingga tetap rapi meskipun dipakai dari pagi hingga sore hari tanpa disetrika ulang.</p>

                <h6 class="fw-bold mt-3" style="color:#1a4c91;">Ukuran yang Tersedia</h6>
                <p>Seragam Korpri tersedia dalam pilihan ukuran lengkap untuk pegawai dengan berbagai postur tubuh:</p>
                <table class="table table-bordered table-sm">
                    <thead style="background-color:#1a4c91; color:white;">
                        <tr><th>Ukuran</th><th>Lingkar Dada</th><th>Panjang Baju</th><th>Pinggang Bawahan</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>S</td><td>84–88 cm</td><td>65 cm</td><td>68–72 cm</td></tr>
                        <tr><td>M</td><td>88–94 cm</td><td>68 cm</td><td>72–78 cm</td></tr>
                        <tr><td>L</td><td>94–100 cm</td><td>71 cm</td><td>78–86 cm</td></tr>
                        <tr><td>XL</td><td>100–108 cm</td><td>74 cm</td><td>86–94 cm</td></tr>
                        <tr><td>XXL</td><td>108–116 cm</td><td>77 cm</td><td>94–104 cm</td></tr>
                        <tr><td>XXXL</td><td>116–126 cm</td><td>80 cm</td><td>104–114 cm</td></tr>
                    </tbody>
                </table>

                <h6 class="fw-bold mt-3" style="color:#1a4c91;">Warna & Desain</h6>
                <p>Seragam Korpri berwarna <strong>Biru Dongker</strong> dengan motif logo Korpri yang sudah menjadi identitas resmi ASN/PNS Indonesia. Warna biru yang kami gunakan telah disesuaikan dengan standar warna Korpri resmi yang ditetapkan oleh BAKN/BKN. Motif dan bordir logo Korpri dikerjakan dengan mesin bordir komputer 6 warna untuk hasil yang tajam, presisi, dan tidak mudah pudar meski sering dicuci.</p>

                <h6 class="fw-bold mt-3" style="color:#1a4c91;">Keunggulan Produk</h6>
                <ul>
                    <li>Sesuai standar resmi seragam Korpri nasional</li>
                    <li>Bordir logo Korpri menggunakan mesin bordir komputer, hasil rapi dan tahan lama</li>
                    <li>Tersedia model wanita (rok panjang, rok pendek) dan model pria (celana panjang)</li>
                    <li>Bahan anti-kusut dan anti-apek, nyaman dipakai seharian</li>
                    <li>Cocok untuk pemesanan kolektif per sekolah/instansi dengan harga spesial</li>
                    <li>Tersedia juga lengkap dengan atribut: tanda pangkat, papan nama bordir, lencana</li>
                </ul>

                <div class="alert mt-3" style="background-color:#e8eef8; border-left: 4px solid #1a4c91;">
                    <strong>Harga: Rp 400.000 / stel</strong> (sudah termasuk atasan + bawahan + bordir logo Korpri)
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- ===================== END MODAL ===================== --}}


<style>
.img-produk {
    width: 100%;
    height: 280px;
    object-fit: cover;
}
</style>

@endsection