@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Edit Barang</h1>
        <a href="{{ route('master_barang.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        <form action="{{ route('master_barang.update', $barang->id_barang) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ $barang->kode_barang }}" required>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" required>
            </div>
            <div class="mb-3">
                <label for="spesifikasi_teknis" class="form-label">Spesifikasi Teknis</label>
                <textarea class="form-control" id="spesifikasi_teknis" name="spesifikasi_teknis" rows="3" required>{{ $barang->spesifikasi_teknis }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection