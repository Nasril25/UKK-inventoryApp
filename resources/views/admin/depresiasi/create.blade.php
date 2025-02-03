@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Depresiasi</h1>
    <a href="{{ route('depresiasi.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('depresiasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="lama_depresiasi" class="form-label">Lama Depresiasi</label>
            <input type="number" class="form-control" id="lama_depresiasi" name="lama_depresiasi" placeholder="Masukkan lama depresiasi (dalam bulan)" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan (opsional)" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
