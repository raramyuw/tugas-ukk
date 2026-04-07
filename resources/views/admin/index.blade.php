@extends('layouts.user')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h2 class="fw-bold text-success">Dashboard Admin</h2>
                <p>Selamat datang, {{ auth()->user()->name }}!</p>
                <hr>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5>Manajemen Produk</h5>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-light mt-2">Kelola Produk</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5>Data Pesanan</h5>
                                <a href="{{ route('admin.orders.index') }}" class="btn btn-light mt-2">Kelola Pesanan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection