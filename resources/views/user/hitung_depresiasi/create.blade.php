@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Tambah Hitung Depresiasi</h1>
    <a href="{{ route('user.hitung_depresiasi.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('user.hitung_depresiasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select name="id_pengadaan" id="id_pengadaan" class="form-control" required>
                <option value="">Pilih Pengadaan</option>
                @foreach ($pengadaan as $data)
                <option value="{{ $data->id_pengadaan }}">{{ $data->kode_pengadaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_hitung_depresiasi" class="form-label">Tanggal Hitung</label>
            <input type="date" class="form-control" name="tgl_hitung_depresiasi" id="tgl_hitung_depresiasi" required>
        </div>
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="text" class="form-control" name="bulan" id="bulan" required>
        </div>
        <div class="mb-3">
            <label for="durasi" class="form-label">Durasi</label>
            <input type="number" class="form-control" name="durasi" id="durasi" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
