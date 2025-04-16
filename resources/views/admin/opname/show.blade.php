@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Detail Data Opname</h1>
    <a href="{{ route('opname.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Kode Pengadaan: {{ $opname->pengadaan->kode_pengadaan }}</h5>
            <p class="card-text">Tanggal Opname: {{ $opname->tgl_opname }}</p>
            <p class="card-text">Kondisi: {{ $opname->kondisi }}</p>
            <p class="card-text">Jumlah Barang: {{ $opname->jumlah_barang }}</p>
            <p class="card-text">Keterangan: {{ $opname->keterangan }}</p>
            <hr>
            <h5>Detail Kondisi Barang</h5>
            <p class="card-text">Baik: {{ $baikCount }}</p>
            <p class="card-text">Rusak: {{ $rusakCount }}</p>
            <p class="card-text">Hilang: {{ $hilangCount }}</p>
        </div>
    </div>
</div>
@endsection
