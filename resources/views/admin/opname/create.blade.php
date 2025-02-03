@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Data Opname</h1>
    <a href="{{ route('opname.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('opname.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">ID Pengadaan</label>
            <select class="form-select" id="id_pengadaan" name="id_pengadaan" required>
                <option value="" selected disabled>Pilih Pengadaan</option>
                @foreach ($pengadaans as $pengadaan)
                <option value="{{ $pengadaan->id_pengadaan }}">{{ $pengadaan->kode_pengadaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_opname" class="form-label">Tanggal Opname</label>
            <input type="date" class="form-control" id="tgl_opname" name="tgl_opname" required>
        </div>
        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <input type="text" class="form-control" id="kondisi" name="kondisi" placeholder="Masukkan kondisi" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
