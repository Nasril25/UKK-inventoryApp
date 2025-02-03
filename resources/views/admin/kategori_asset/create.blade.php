@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Tambah Kategori Asset</h1>
        <a href="{{ route('kategori_asset.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        <form action="{{ route('kategori_asset.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kode_kategori_asset" class="form-label">Kode Kategori Asset</label>
                <input type="text" class="form-control" id="kode_kategori_asset" name="kode_kategori_asset" placeholder="Masukkan kode kategori asset" required>
            </div>
            <div class="mb-3">
                <label for="kategori_asset" class="form-label">Kategori Asset</label>
                <input type="text" class="form-control" id="kategori_asset" name="kategori_asset" placeholder="Masukkan kategori asset" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
