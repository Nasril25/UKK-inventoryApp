@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Distributor</h1>
    <a href="{{ route('distributor.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('distributor.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_distributor" class="form-label">Nama Distributor</label>
            <input type="text" class="form-control" id="nama_distributor" name="nama_distributor" placeholder="Masukkan nama distributor" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required>
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No. Telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan no. telp" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
