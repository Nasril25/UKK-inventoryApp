@extends('layouts.user')

@section('content')
    <div class="container mt-4">
        <h1>Daftar Kategori Asset</h1>
        <form action="{{ route('user.kategori_asset.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Kode Kategori, Kategori" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kategori Asset</th>
                    <th>Kategori Asset</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategori_asset as $kategori)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kategori->kode_kategori_asset }}</td>
                        <td>{{ $kategori->kategori_asset }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Data Kategori Asset tidak ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection