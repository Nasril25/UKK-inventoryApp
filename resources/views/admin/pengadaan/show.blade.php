@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Detail Pengadaan</h1>
    <a href="{{ route('pengadaan.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <div class="card">
        <div class="card-header">
            Detail Pengadaan
        </div>
        <div class="card-body">
            <h5 class="card-title">Kode Pengadaan: {{ $pengadaan->kode_pengadaan }}</h5>
            <p class="card-text">Nama Barang: {{ $pengadaan->masterBarang->nama_barang }}</p>
            <p class="card-text">Lama Depresiasi: {{ $pengadaan->depresiasi->lama_depresiasi }} - {{ $pengadaan->depresiasi->keterangan }}</p>
            <p class="card-text">Merk: {{ $pengadaan->merk->merk }}</p>
            <p class="card-text">Satuan: {{ $pengadaan->satuan->satuan }}</p>
            <p class="card-text">Sub Kategori Asset: {{ $pengadaan->subKategoriAsset->sub_kategori_asset }}</p>
            <p class="card-text">Distributor: {{ $pengadaan->distributor->nama_distributor }}</p>
            <p class="card-text">No Invoice: {{ $pengadaan->no_invoice }}</p>
            <p class="card-text">No Seri Barang: {{ $pengadaan->no_seri_barang }}</p>
            <p class="card-text">Tahun Produksi: {{ $pengadaan->tahun_produksi }}</p>
            <p class="card-text">Tanggal Pengadaan: {{ $pengadaan->tgl_pengadaan }}</p>
            <p class="card-text">Harga Barang: {{ number_format($pengadaan->harga_barang, 0, ',', '.') }}</p>
            <p class="card-text">Jumlah Barang: {{ $pengadaan->jumlah_barang }}</p>
            <p class="card-text">Nilai Barang: {{ number_format($pengadaan->nilai_barang, 0, ',', '.') }}</p>
            <p class="card-text">Flag Barang: {{ $pengadaan->fb == 1 ? 'Aktif' : 'Tidak Aktif' }}</p>
            <p class="card-text">Keterangan: {{ $pengadaan->keterangan }}</p>
        </div>
    </div>
    <div class="mt-4">
        <h3>Penyusutan Harga</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Harga Setelah Penyusutan</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= $pengadaan->depresiasi->lama_depresiasi; $i++)
                    <tr>
                        <td>Bulan {{ $i }}</td>
                        <td>{{ number_format($pengadaan->harga_barang - ($pengadaan->depresiasi_barang * $i), 0, ',', '.') }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
@endsection
