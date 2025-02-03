@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Merk</h1>
    <a href="{{ route('merk.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('merk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="merk" class="form-label">Nama Merk</label>
            <input type="text" class="form-control" id="merk" name="merk" placeholder="Masukkan nama merk" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
