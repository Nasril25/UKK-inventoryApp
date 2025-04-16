@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Data Opname</h1>
    <a href="{{ route('opname.create') }}" class="btn btn-primary mb-3">Tambah Opname</a>
    <form action="{{ route('opname.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Kode Pengadaan, Tanggal Opname, Kondisi" value="{{ request('search') }}">
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
                    <th>Kode Pengadaan</th>
                    <th>Tanggal Opname</th>
                    <th>Kondisi</th>
                    <th>Jumlah Barang</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($opname as $key => $opname)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $opname->pengadaan->kode_pengadaan ?? 'N/A' }}</td>
                    <td>{{ $opname->tgl_opname }}</td>
                    <td>{{ $opname->kondisi }}</td>
                    <td>{{ $opname->jumlah_barang }}</td>
                    <td>{{ $opname->keterangan }}</td>
                    <td>
                        <a href="{{ route('opname.show', $opname->id_opname) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('opname.edit', $opname->id_opname) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('opname.destroy', $opname->id_opname) }}" method="POST" class="d-inline">
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
