@extends('layouts.user')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold text-success">Data Pesanan</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>
                            {{ $order->user->name ?? 'Unknown' }}<br>
                            <small>{{ $order->user->email ?? '' }}</small>
                        </td>
                        <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="d-inline">
                                @csrf
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" style="width: 130px;">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                    <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>📦 Diproses</option>
                                    <option value="dikirim" {{ $order->status == 'dikirim' ? 'selected' : '' }}>🚚 Dikirim</option>
                                    <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
                                    <option value="batal" {{ $order->status == 'batal' ? 'selected' : '' }}>❌ Batal</option>
                                </select>
                            </form>
                        </td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">Detail</a>
                            <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus pesanan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada pesanan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection