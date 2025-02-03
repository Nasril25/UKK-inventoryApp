@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Data Sub Kategori</h1>
    <a href="{{ route('sub_kategori_asset.create') }}" class="btn btn-primary mb-3">Tambah Sub Kategori</a>
    <form action="{{ route('sub_kategori_asset.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Kode, Kategori, Sub Kategori" value="{{ request('search') }}">
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
                    <th>Kode</th>
                    <th>Kategori</th>
                    <th>Sub Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subKategori as $key => $subKategori)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $subKategori->kode_sub_kategori_asset }}</td>
                    <td>{{ $subKategori->kategoriAsset->kategori_asset ?? 'N/A' }}</td>
                    <td>{{ $subKategori->sub_kategori_asset }}</td>
                    <td>
                        <a href="{{ route('sub_kategori_asset.edit', $subKategori->id_sub_kategori_asset) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sub_kategori_asset.destroy', $subKategori->id_sub_kategori_asset) }}" method="POST" style="display:inline;">
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
