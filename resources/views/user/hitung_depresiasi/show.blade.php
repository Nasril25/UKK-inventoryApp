@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Detail Hitung Depresiasi</h1>
    <a href="{{ route('user.hitung_depresiasi.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <h2 class="mt-4">Tabel Depresiasi</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Harga Barang</th>
            </tr>
        </thead>
        <tbody>
            @php
                $hargaBarang = $hitungDepresiasi->pengadaan->harga_barang;
                $usiaBarang = $hitungDepresiasi->durasi;
                $depresiasiBulanan = $hargaBarang / $usiaBarang;
            @endphp
            @for ($i = 1; $i <= $usiaBarang; $i++)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ number_format($hargaBarang - ($depresiasiBulanan * $i), 2) }}</td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection
