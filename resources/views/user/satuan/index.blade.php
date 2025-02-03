@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Daftar Satuan</h1>
    <form action="{{ route('user.satuan.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Nama Satuan" value="{{ request('search') }}">
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
                <th>Nama Satuan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($satuan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->satuan }}</td>
            </tr>
            @empty
                    <tr>
                        <td colspan="4" class="text-center">Data Satuan tidak ditemukan</td>
                    </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
