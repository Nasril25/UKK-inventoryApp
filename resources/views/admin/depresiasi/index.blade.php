@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Data Depresiasi</h1>
    <a href="{{ route('depresiasi.create') }}" class="btn btn-primary mb-3">Tambah Depresiasi</a>
    <form action="{{ route('depresiasi.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Lama Depresiasi (dalam bulan)" value="{{ request('search') }}">
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
                    <th>Lama Depresiasi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($depresiasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->lama_depresiasi }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('depresiasi.edit', $item->id_depresiasi) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('depresiasi.destroy', $item->id_depresiasi) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
