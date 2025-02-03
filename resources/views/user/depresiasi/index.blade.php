@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Data Depresiasi</h1>
    <form action="{{ route('user.depresiasi.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Lama Depresiasi" value="{{ request('search') }}">
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
                <th>Lama Depresiasi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($depresiasi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->lama_depresiasi }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
            @empty
                    <tr>
                        <td colspan="4" class="text-center">Data Depresiasi tidak ditemukan</td>
                    </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
