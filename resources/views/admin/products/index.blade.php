@extends('layouts.admin')

@section('content')
    <h1>Manajemen Produk</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Tambah Produk</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center">Belum ada produk. Silakan tambah produk!</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection