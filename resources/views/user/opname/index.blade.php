@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Data Opname</h1>
    <form action="{{ route('user.opname.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Kode Pengadaan, Tanggal Opname, Kondisi" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pengadaan</th>
                <th>Tanggal Opname</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($opname as $key => $opname)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $opname->pengadaan->kode_pengadaan ?? 'N/A' }}</td>
                <td>{{ $opname->tgl_opname }}</td>
                <td>{{ $opname->kondisi }}</td>
                <td>{{ $opname->keterangan }}</td>
            </tr>
            @empty
                    <tr>
                        <td colspan="4" class="text-center">Data Opname tidak ditemukan</td>
                    </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
