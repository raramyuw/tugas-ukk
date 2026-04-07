@extends('layouts.user')

@section('content')
    <h1>Edit Produk</h1>
    
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label>Nama Produk *</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        
        <div class="form-group mb-3">
            <label>Harga (Rp) *</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required min="1000">
        </div>
        
        <div class="form-group mb-3">
            <label>Stok *</label>
            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required min="0">
        </div>
        
        <div class="form-group mb-3">
            <label>Gambar Saat Ini</label>
            @if($product->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 150px; height: 150px; object-fit: cover;">
                </div>
            @else
                <p class="text-muted">Tidak ada gambar</p>
            @endif
        </div>

        <div class="form-group mb-3">
            <label>Ganti Gambar (opsional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="text-muted">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB</small>
        </div>
        
        <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="5">{{ $product->description }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection