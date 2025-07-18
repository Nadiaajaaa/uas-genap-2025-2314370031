@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Tambah Produk</h3>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <input type="text" name="name" class="form-control mb-2" placeholder="Nama Produk" required>
        <textarea name="description" class="form-control mb-2" placeholder="Deskripsi"></textarea>
        <input type="number" step="0.01" name="price" class="form-control mb-2" placeholder="Harga" required>
        <select name="category_id" class="form-control mb-2" required>
            <option value="">--Pilih Kategori--</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        <label><input type="checkbox" name="is_publish"> Publish</label>
        <br>
        <button class="btn btn-primary mt-2">Simpan</button>
    </form>
</div>
@endsection