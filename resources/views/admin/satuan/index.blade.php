@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Daftar Satuan</h1>
    <a href="{{ route('satuan.create') }}" class="btn btn-primary mb-3">Tambah Satuan</a>
    <form action="{{ route('satuan.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Nama Satuan" value="{{ request('search') }}">
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
                    <th>Nama Satuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($satuan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->satuan }}</td>
                    <td>
                        <a href="{{ route('satuan.edit', $item->id_satuan) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('satuan.destroy', $item->id_satuan) }}" method="POST" style="display:inline;">
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
