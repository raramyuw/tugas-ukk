@extends('layouts.admin')

@section('content')

    <div class="container my-5">

        <h2 class="fw-bold text-success mb-4">
            Manajemen Transaksi
        </h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @forelse($orders as $item)
            @php
                $produk = json_decode($item->produk, true);
                $total = 0;
                $jumlah = 0;
            @endphp

            <div class="card mb-3 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">

                    <!-- PRODUK + USER -->
                    <div>

                        <!-- 🔥 NAMA PEMBELI -->
                        <div class="mb-1">
                            <div class="mb-2">
                                <strong>Pembeli:</strong>
                                {{ $item->user->name ?? 'User tidak ditemukan' }}

                                <br>
                                <small class="text-muted">
                                    📧 {{ $item->user->email ?? '-' }} <br>
                                    📱 {{ $item->user->no_hp ?? '-' }} <br>
                                    📍
                                    {{ $item->user->alamat ?? '-' }},
                                    {{ $item->user->kota ?? '' }}
                                    {{ $item->user->kode_pos ?? '' }}
                                </small>
                            </div>
                        </div>

                        <h6 class="fw-bold">
                            @if ($produk)
                                @foreach ($produk as $p)
                                    {{ $p['nama'] }} ({{ $p['qty'] }}) <br>
                                    @php
                                        $total += $p['harga'] * $p['qty'];
                                        $jumlah += $p['qty'];
                                    @endphp
                                @endforeach
                            @endif
                        </h6>

                        <small>Total Item: {{ $jumlah }}</small><br>

                        <span class="text-success fw-bold">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </span>
                    </div>

                    <!-- STATUS -->
                    <div>
                        <span
                            class="badge 
                    @if ($item->status == 'Proses') bg-warning
                    @elseif($item->status == 'Dikirim') bg-primary
                    @else bg-success @endif">
                            {{ $item->status }}
                        </span>
                    </div>

                    <!-- AKSI -->
                    <div class="d-flex gap-2">
                        @php
                            $phone = $item->user->no_hp ?? '';
                            $phone = preg_replace('/^0/', '62', $phone); // ubah 08 jadi 628
                            $message = urlencode(
                                'Halo kak ' . ($item->user->name ?? '') . ', pesanan kamu sedang diproses ya 😊',
                            );
                        @endphp

                        <a href="https://wa.me/{{ $phone }}?text={{ $message }}" target="_blank"
                            class="btn btn-success btn-sm">
                            💬 Chat
                        </a>
                        @php
                            if ($item->status == 'Proses') {
                                $text = 'Pesanan kamu sedang diproses ya 😊';
                            } elseif ($item->status == 'Dikirim') {
                                $text = 'Pesanan kamu sedang dikirim 🚚';
                            } else {
                                $text = 'Pesanan kamu sudah selesai, terima kasih 🙏';
                            }

                            $message = urlencode('Halo kak ' . $item->user->name . ', ' . $text);
                        @endphp

                        <!-- UPDATE DROPDOWN -->
                        <div class="dropdown">
                            <button class="btn btn-success btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                Update
                            </button>

                            <ul class="dropdown-menu">
                                <li>
                                    <button class="dropdown-item" onclick="updateStatus({{ $item->id }}, 'Proses')">
                                        📦 Proses
                                    </button>
                                </li>
                                <li>
                                    <button class="dropdown-item" onclick="updateStatus({{ $item->id }}, 'Dikirim')">
                                        🚚 Dikirim
                                    </button>
                                </li>
                                <li>
                                    <button class="dropdown-item" onclick="updateStatus({{ $item->id }}, 'Selesai')">
                                        ✅ Selesai
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <!-- DELETE -->
                        <form action="{{ route('admin.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>
            </div>

        @empty
            <p>Belum ada transaksi</p>
        @endforelse

    </div>

    <!-- SCRIPT UPDATE -->
    <script>
        function updateStatus(id, status) {
            fetch(`/admin/update-status/${id}`, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        status: status
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                })
                .catch(err => {
                    alert('Gagal update status');
                });
        }
    </script>

@endsection
