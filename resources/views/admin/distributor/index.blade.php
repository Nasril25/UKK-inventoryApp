@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Daftar Distributor</h1>
    <a href="{{ route('distributor.create') }}" class="btn btn-primary mb-3">Tambah Distributor</a>
    <form action="{{ route('distributor.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Nama Distributor, Alamat, Email " value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Distributor</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Email</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($distributor as $key => $distributor)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $distributor->nama_distributor }}</td>
                    <td>{{ $distributor->alamat }}</td>
                    <td>{{ $distributor->no_telp }}</td>
                    <td>{{ $distributor->email }}</td>
                    <td>{{ $distributor->keterangan }}</td>
                    <td>
                        <a href="{{ route('distributor.edit', $distributor->id_distributor) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('distributor.destroy', $distributor->id_distributor) }}" method="POST" style="display: inline-block;">
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
