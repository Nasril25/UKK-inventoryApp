@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Mutasi Lokasi</h1>
    <a href="{{ route('mutasi_lokasi.create') }}" class="btn btn-primary mb-3">Tambah Mutasi Lokasi</a>
    <form action="{{ route('mutasi_lokasi.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Lokasi, Kode Pengadaan " value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lokasi</th>
                    <th>Kode Pengadaan</th>
                    <th>Flag Lokasi</th>
                    <th>Flag Pindah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mutasiLokasi as $key => $mutasi)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $mutasi->lokasi->nama_lokasi }}</td>
                    <td>{{ $mutasi->pengadaan->kode_pengadaan }}</td>
                    <td>{{ $mutasi->flag_lokasi }}</td>
                    <td>{{ $mutasi->flag_pindah }}</td>
                    <td>
                        <a href="{{ route('mutasi_lokasi.edit', $mutasi->id_mutasi_lokasi) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('mutasi_lokasi.destroy', $mutasi->id_mutasi_lokasi) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
