@extends('layouts.user')

@section('content')

<div class="container my-5">

<h3 class="fw-bold text-success mb-4">
    👤 Profil Saya
</h3>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('profile.update') }}" method="POST">
@csrf

<div class="card shadow-sm border-0">
<div class="card-body">

<div class="mb-3">
<label>Nama</label>
<input type="text" name="name"
class="form-control"
value="{{ auth()->user()->name }}">
</div>

<div class="mb-3">
<label>No HP</label>
<input type="text" name="no_hp"
class="form-control"
value="{{ auth()->user()->no_hp }}">
</div>

<div class="mb-3">
<label>Alamat</label>
<textarea name="alamat"
class="form-control">{{ auth()->user()->alamat }}</textarea>
</div>

<div class="mb-3">
<label>Kota</label>
<input type="text" name="kota"
class="form-control"
value="{{ auth()->user()->kota }}">
</div>

<div class="mb-3">
<label>Kode Pos</label>
<input type="text" name="kode_pos"
class="form-control"
value="{{ auth()->user()->kode_pos }}">
</div>

<button class="btn btn-success">
Simpan Profil
</button>

</div>
</div>

</form>

</div>

@endsection