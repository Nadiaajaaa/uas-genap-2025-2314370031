@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="fw-bold mb-3">Detail Produk</h3>

            <dl class="row">
                <dt class="col-sm-3">Nama Produk</dt>
                <dd class="col-sm-9">{{ $product->name }}</dd>

                <dt class="col-sm-3">Deskripsi</dt>
                <dd class="col-sm-9">{{ $product->description ?? '-' }}</dd>

                <dt class="col-sm-3">Harga</dt>
                <dd class="col-sm-9">Rp{{ number_format($product->price, 0, ',', '.') }}</dd>

                <dt class="col-sm-3">Kategori</dt>
                <dd class="col-sm-9">{{ $product->category->name ?? '-' }}</dd>

                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">
                    @if($product->is_publish)
                        <span class="badge bg-success">Publish</span>
                    @else
                        <span class="badge bg-secondary">Draft</span>
                    @endif
                </dd>

                <dt class="col-sm-3">Tanggal Publish</dt>
                <dd class="col-sm-9">
                    {{ $product->published_at ? \Carbon\Carbon::parse($product->published_at)->format('d M Y H:i') : '-' }}
                </dd>

                <dt class="col-sm-3">Dibuat</dt>
                <dd class="col-sm-9">{{ $product->created_at->format('d M Y H:i') }}</dd>

                <dt class="col-sm-3">Diperbarui</dt>
                <dd class="col-sm-9">{{ $product->updated_at->format('d M Y H:i') }}</dd>
            </dl>

            <div class="text-end">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">← Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
