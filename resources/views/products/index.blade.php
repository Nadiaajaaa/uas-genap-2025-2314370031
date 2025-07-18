@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Produk</h2>
        <a href="{{ route('products.create') }}" class="btn btn-success">+ Tambah Produk</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Waktu Publish</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($products as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>Rp{{ number_format($p->price, 0, ',', '.') }}</td>
                        <td>{{ $p->category->name ?? '-' }}</td>
                        <td>
                            @if($p->is_publish)
                                <span class="badge bg-success">Publish</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>
                            {{ $p->published_at ? \Carbon\Carbon::parse($p->published_at)->format('d M Y H:i') : '-' }}
                        </td>
                        <td class="text-end">
                            <a href="{{ route('products.show', $p) }}" class="btn btn-sm btn-info text-white">Lihat</a>
                            <a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $p) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus produk?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-3">Belum ada produk</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection