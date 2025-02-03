@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Daftar Kategori Asset</h1>
        <a href="{{ route('kategori_asset.create') }}" class="btn btn-primary mb-3">Tambah Kategori Asset</a>
        <form action="{{ route('kategori_asset.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Kode Kategori, Kategori" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kategori Asset</th>
                        <th>Kategori Asset</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori_asset as $kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->kode_kategori_asset }}</td>
                            <td>{{ $kategori->kategori_asset }}</td>
                            <td>
                                <a href="{{ route('kategori_asset.edit', $kategori->id_kategori_asset) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kategori_asset.destroy', $kategori->id_kategori_asset) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data Kategori Asset tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection