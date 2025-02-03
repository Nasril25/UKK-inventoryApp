@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Pengadaan</h1>
    <a href="{{ route('pengadaan.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('pengadaan.update', $pengadaan->id_pengadaan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode_pengadaan" class="form-label">Kode Pengadaan</label>
            <input type="text" class="form-control" id="kode_pengadaan" name="kode_pengadaan" value="{{ $pengadaan->kode_pengadaan }}" required>
        </div>
        <div class="mb-3">
            <label for="id_master_barang" class="form-label">Nama Barang</label>
            <select class="form-control" id="id_master_barang" name="id_master_barang" required>
                @foreach ($master_barang as $barang)
                    <option value="{{ $barang->id_barang }}" {{ $barang->id_barang == $pengadaan->id_master_barang ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_depresiasi" class="form-label">Lama Depresiasi</label>
            <select class="form-control" id="id_depresiasi" name="id_depresiasi" required>
                @foreach ($depresiasi as $item)
                    <option value="{{ $item->id_depresiasi }}" {{ $item->id_depresiasi == $pengadaan->id_depresiasi ? 'selected' : '' }}>
                        {{ $item->lama_depresiasi }} - {{ $item->keterangan }}
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
            <label for="id_satuan" class="form-label">Satuan</label>
            <select class="form-control" id="id_satuan" name="id_satuan" required>
                @foreach ($satuan as $item)
                    <option value="{{ $item->id_satuan }}" {{ $item->id_satuan == $pengadaan->id_satuan ? 'selected' : '' }}>
                        {{ $item->satuan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_sub_kategori_asset" class="form-label">Sub Kategori Asset</label>
            <select class="form-control" id="id_sub_kategori_asset" name="id_sub_kategori_asset" required>
                @foreach ($sub_kategori_asset as $item)
                    <option value="{{ $item->id_sub_kategori_asset }}" {{ $item->id_sub_kategori_asset == $pengadaan->id_sub_kategori_asset ? 'selected' : '' }}>
                        {{ $item->sub_kategori_asset }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_distributor" class="form-label">Distributor</label>
            <select class="form-control" id="id_distributor" name="id_distributor" required>
                @foreach ($distributor as $item)
                    <option value="{{ $item->id_distributor }}" {{ $item->id_distributor == $pengadaan->id_distributor ? 'selected' : '' }}>
                        {{ $item->nama_distributor }}
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
            <label for="tahun_produksi" class="form-label">Tahun Produksi</label>
            <input type="text" class="form-control" id="tahun_produksi" name="tahun_produksi" value="{{ $pengadaan->tahun_produksi }}" required>
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
            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="{{ $pengadaan->jumlah_barang }}" required>
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
