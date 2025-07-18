@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Edit Produk</h3>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ $product->name }}" class="form-control mb-2" required>
        <textarea name="description" class="form-control mb-2">{{ $product->description }}</textarea>
        <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="form-control mb-2" required>
        <select name="category_id" class="form-control mb-2">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
        <label><input type="checkbox" name="is_publish" {{ $product->is_publish ? 'checked' : '' }}> Publish</label>
        <br>
        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection