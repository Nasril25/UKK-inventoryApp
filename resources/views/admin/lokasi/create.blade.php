@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Lokasi</h1>
    <a href="{{ route('lokasi.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('lokasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode_lokasi" class="form-label">Kode Lokasi</label>
            <input type="text" class="form-control" id="kode_lokasi" name="kode_lokasi" placeholder="Masukkan kode lokasi" required>
        </div>
        <div class="mb-3">
            <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
            <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" placeholder="Masukkan nama lokasi" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Opsional" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
