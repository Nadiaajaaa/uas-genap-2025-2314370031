@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Edit Kategori</h3>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ $category->name }}" class="form-control mb-2" required>
        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection