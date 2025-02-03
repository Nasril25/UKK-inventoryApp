@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Daftar Lokasi</h1>
    <a href="{{ route('lokasi.create') }}" class="btn btn-primary mb-3">Tambah Lokasi</a>
    <form action="{{ route('lokasi.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Kode Lokasi, Nama Lokasi" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Lokasi</th>
                    <th>Nama Lokasi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lokasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_lokasi }}</td>
                    <td>{{ $item->nama_lokasi }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('lokasi.edit', $item->id_lokasi) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('lokasi.destroy', $item->id_lokasi) }}" method="POST" class="d-inline">
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
