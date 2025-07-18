@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Tambah Kategori</h3>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <input type="text" name="name" class="form-control mb-2" placeholder="Nama Kategori" required>
        <button class="btn btn-primary mt-2">Simpan</button>
    </form>
</div>
@endsection