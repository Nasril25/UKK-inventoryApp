@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Daftar Merk</h1>
    <a href="{{ route('merk.create') }}" class="btn btn-primary mb-3">Tambah Merk</a>
    <form action="{{ route('merk.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Nama Merk" value="{{ request('search') }}">
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
                    <th>Nama Merk</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($merk as $merk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $merk->merk }}</td>
                        <td>{{ $merk->keterangan }}</td>
                        <td>
                            <a href="{{ route('merk.edit', $merk->id_merk) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('merk.destroy', $merk->id_merk) }}" method="POST" class="d-inline">
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
