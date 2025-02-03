@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Daftar Lokasi</h1>
    <form action="{{ route('user.lokasi.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Kode Lokasi, Nama Lokasi" value="{{ request('search') }}">
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
                <th>Kode Lokasi</th>
                <th>Nama Lokasi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lokasi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kode_lokasi }}</td>
                <td>{{ $item->nama_lokasi }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
            @empty
                    <tr>
                        <td colspan="4" class="text-center">Data Lokasi tidak ditemukan</td>
                    </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
