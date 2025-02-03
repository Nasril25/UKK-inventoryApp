@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Edit Kategori Asset</h1>
        <a href="{{ route('kategori_asset.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        <form action="{{ route('kategori_asset.update', $kategori_asset->id_kategori_asset) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kode_kategori_asset" class="form-label">Kode Kategori Asset</label>
                <input type="text" class="form-control" id="kode_kategori_asset" name="kode_kategori_asset" value="{{ $kategori_asset->kode_kategori_asset }}" required>
            </div>
            <div class="mb-3">
                <label for="kategori_asset" class="form-label">Kategori Asset</label>
                <input type="text" class="form-control" id="kategori_asset" name="kategori_asset" value="{{ $kategori_asset->kategori_asset }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection