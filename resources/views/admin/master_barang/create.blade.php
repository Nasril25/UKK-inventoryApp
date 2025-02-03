@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Tambah Barang</h1>
        <a href="{{ route('master_barang.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        <form action="{{ route('master_barang.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukkan kode barang" required>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan nama barang" required>
            </div>
            <div class="mb-3">
                <label for="spesifikasi_teknis" class="form-label">Spesifikasi Teknis</label>
                <textarea class="form-control" id="spesifikasi_teknis" name="spesifikasi_teknis" placeholder="Masukkan spesifikasi teknis" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection