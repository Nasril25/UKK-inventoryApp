@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Daftar Merk</h1>
    <form action="{{ route('user.merk.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Nama Merk" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Merk</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($merk as $merk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $merk->merk }}</td>
                    <td>{{ $merk->keterangan }}</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Data Merk tidak ditemukan</td>
                    </tr>
                @endforelse
        </tbody>
    </table>
</div>
@endsection
