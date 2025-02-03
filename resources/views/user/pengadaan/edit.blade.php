@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Edit Pengadaan</h1>
    <a href="{{ route('user.pengadaan.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('user.pengadaan.update', $pengadaan->id_pengadaan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode_pengadaan" class="form-label">Kode Pengadaan</label>
            <input type="text" class="form-control" id="kode_pengadaan" name="kode_pengadaan" value="{{ $pengadaan->kode_pengadaan }}" required>
        </div>
        <div class="mb-3">
            <label for="id_master_barang" class="form-label">Barang</label>
            <select class="form-control" id="id_master_barang" name="id_master_barang" required>
                @foreach ($master_barang as $barang)
                    <option value="{{ $barang->id_barang }}" {{ $barang->id_barang == $pengadaan->id_master_barang ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_merk" class="form-label">Merk</label>
            <select class="form-control" id="id_merk" name="id_merk" required>
                @foreach ($merk as $item)
                    <option value="{{ $item->id_merk }}" {{ $item->id_merk == $pengadaan->id_merk ? 'selected' : '' }}>
                        {{ $item->merk }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="no_invoice" class="form-label">No Invoice</label>
            <input type="text" class="form-control" id="no_invoice" name="no_invoice" value="{{ $pengadaan->no_invoice }}" required>
        </div>
        <div class="mb-3">
            <label for="no_seri_barang" class="form-label">No Seri Barang</label>
            <input type="text" class="form-control" id="no_seri_barang" name="no_seri_barang" value="{{ $pengadaan->no_seri_barang }}" required>
        </div>
        <div class="mb-3">
            <label for="tgl_pengadaan" class="form-label">Tanggal Pengadaan</label>
            <input type="date" class="form-control" id="tgl_pengadaan" name="tgl_pengadaan" value="{{ $pengadaan->tgl_pengadaan }}" required>
        </div>
        <div class="mb-3">
            <label for="harga_barang" class="form-label">Harga Barang</label>
            <input type="number" class="form-control" id="harga_barang" name="harga_barang" value="{{ $pengadaan->harga_barang }}" required>
        </div>
        <div class="mb-3">
            <label for="nilai_barang" class="form-label">Nilai Barang</label>
            <input type="number" class="form-control" id="nilai_barang" name="nilai_barang" value="{{ $pengadaan->nilai_barang }}" required>
        </div>
        <div class="mb-3">
            <label for="usia_barang" class="form-label">Usia Barang (Bulan)</label>
            <input type="number" class="form-control" id="usia_barang" name="usia_barang" value="{{ $pengadaan->usia_barang }}" required>
        </div>
        <div class="mb-3">
            <label for="fb" class="form-label">Flag Barang</label>
            <select class="form-control" id="fb" name="fb" required>
                <option value="1" {{ $pengadaan->fb == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ $pengadaan->fb == 0 ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pengadaan->keterangan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
