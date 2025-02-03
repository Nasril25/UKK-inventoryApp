@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Mutasi Lokasi</h1>
    <a href="{{ route('mutasi_lokasi.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('mutasi_lokasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_lokasi" class="form-label">Lokasi</label>
            <select name="id_lokasi" id="id_lokasi" class="form-control" required>
                @foreach($lokasi as $lokasiItem)
                    <option value="{{ $lokasiItem->id_lokasi }}">{{ $lokasiItem->nama_lokasi }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select name="id_pengadaan" id="id_pengadaan" class="form-control" required>
                @foreach($pengadaan as $pengadaanItem)
                    <option value="{{ $pengadaanItem->id_pengadaan }}">{{ $pengadaanItem->kode_pengadaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="flag_lokasi" class="form-label">Flag Lokasi</label>
            <input type="text" name="flag_lokasi" class="form-control" id="flag_lokasi" required>
        </div>
        <div class="mb-3">
            <label for="flag_pindah" class="form-label">Flag Pindah</label>
            <input type="text" name="flag_pindah" class="form-control" id="flag_pindah" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
