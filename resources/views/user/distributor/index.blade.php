@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Daftar Distributor</h1>
    <form action="{{ route('user.distributor.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Nama Distributor, Alamat, Email " value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Distributor</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>Email</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($distributor as $key => $distributor)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $distributor->nama_distributor }}</td>
                <td>{{ $distributor->alamat }}</td>
                <td>{{ $distributor->no_telp }}</td>
                <td>{{ $distributor->email }}</td>
                <td>{{ $distributor->keterangan }}</td>
            </tr>
            @empty
                    <tr>
                        <td colspan="4" class="text-center">Data Distributor tidak ditemukan</td>
                    </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
