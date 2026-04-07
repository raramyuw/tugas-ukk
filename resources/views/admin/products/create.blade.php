@extends('layouts.user')

@section('content')
    <h1>Tambah Produk Baru</h1>
    
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group mb-3">
            <label>Nama Produk *</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        
        <div class="form-group mb-3">
            <label>Harga (Rp) *</label>
            <input type="number" name="price" class="form-control" required min="1000">
        </div>
        
        <div class="form-group mb-3">
            <label>Stok *</label>
            <input type="number" name="stock" class="form-control" required min="0">
        </div>
        
        <div class="form-group mb-3">
            <label>Gambar Produk</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="text-muted">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB</small>
        </div>
        
        <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="5"></textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan Produk</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection