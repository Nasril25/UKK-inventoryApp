@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Data Sub Kategori</h1>
    <form action="{{ route('user.sub_kategori_asset.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Kode, Kategori, Sub Kategori" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Kategori</th>
                <th>Sub Kategori</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($subKategori as $key => $subKategori)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $subKategori->kode_sub_kategori_asset }}</td>
                <td>{{ $subKategori->kategoriAsset->kategori_asset ?? 'N/A' }}</td>
                <td>{{ $subKategori->sub_kategori_asset }}</td>
            </tr>
            @empty
                    <tr>
                        <td colspan="4" class="text-center">Data Sub Kategori Asset tidak ditemukan</td>
                    </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
