@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Data Kategori</h3>
    <a href="{{ route('categories.create') }}" class="btn btn-success">Tambah</a>
    <table class="table mt-3">
        <thead><tr><th>Nama</th><th>Aksi</th></tr></thead>
        <tbody>
            @foreach($categories as $c)
                <tr>
                    <td>{{ $c->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $c) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="{{ route('categories.destroy', $c) }}" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection