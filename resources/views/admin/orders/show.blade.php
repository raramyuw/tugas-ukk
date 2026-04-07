@extends('layouts.user')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold text-success">Detail Pesanan #{{ $order->id }}</h1>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Informasi Customer</h5>
            </div>
            <div class="card-body">
                <p><strong>Nama:</strong> {{ $order->user->name ?? '-' }}</p>
                <p><strong>Email:</strong> {{ $order->user->email ?? '-' }}</p>
                <p><strong>No HP:</strong> {{ $order->no_hp ?? $order->user->no_hp ?? '-' }}</p>
                <p><strong>Alamat:</strong> {{ $order->shipping_address ?? $order->user->alamat ?? '-' }}</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Informasi Pesanan</h5>
            </div>
            <div class="card-body">
                <p><strong>Status:</strong> 
                    @if($order->status == 'pending') <span class="badge bg-warning text-dark">⏳ Pending</span>
                    @elseif($order->status == 'diproses') <span class="badge bg-info">📦 Diproses</span>
                    @elseif($order->status == 'dikirim') <span class="badge bg-primary">🚚 Dikirim</span>
                    @elseif($order->status == 'selesai') <span class="badge bg-success">✅ Selesai</span>
                    @elseif($order->status == 'batal') <span class="badge bg-danger">❌ Batal</span>
                    @endif
                </p>
                <p><strong>Total:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                <p><strong>Tanggal Pesan:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Terakhir Update:</strong> {{ $order->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">🛍️ Produk yang Dipesan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $produk = $order->produk;
                        if (is_string($produk)) {
                            $produk = json_decode($produk, true);
                        }
                    @endphp
                    @foreach($produk as $item)
                    <tr>
                        <td>{{ $item['nama'] }}</td>
                        <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>Rp {{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-success">
                        <th colspan="3" class="text-end">Total:</th>
                        <th>Rp {{ number_format($order->total, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="mt-4">
    <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="d-inline">
        @csrf
        <select name="status" class="form-select w-auto d-inline-block" style="width: 150px;">
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
            <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>📦 Diproses</option>
            <option value="dikirim" {{ $order->status == 'dikirim' ? 'selected' : '' }}>🚚 Dikirim</option>
            <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
            <option value="batal" {{ $order->status == 'batal' ? 'selected' : '' }}>❌ Batal</option>
        </select>
        <button type="submit" class="btn btn-success">Update Status</button>
    </form>
</div>
@endsection