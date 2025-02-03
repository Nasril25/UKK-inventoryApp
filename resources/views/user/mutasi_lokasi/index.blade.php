@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Mutasi Lokasi</h1>
    <form action="{{ route('user.mutasi_lokasi.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Lokasi, Kode Pengadaan " value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Lokasi</th>
                <th>Kode Pengadaan</th>
                <th>Flag Lokasi</th>
                <th>Flag Pindah</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mutasiLokasi as $key => $mutasi)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $mutasi->lokasi->nama_lokasi }}</td>
                <td>{{ $mutasi->pengadaan->kode_pengadaan }}</td>
                <td>{{ $mutasi->flag_lokasi }}</td>
                <td>{{ $mutasi->flag_pindah }}</td>
            </tr>
            @empty
                    <tr>
                        <td colspan="5" class="text-center">Data Mutasi Lokasi tidak ditemukan</td>
                    </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
