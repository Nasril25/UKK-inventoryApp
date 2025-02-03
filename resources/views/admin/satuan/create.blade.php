@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Satuan</h1>
    <a href="{{ route('satuan.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('satuan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="satuan" class="form-label">Nama Satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan nama satuan" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
