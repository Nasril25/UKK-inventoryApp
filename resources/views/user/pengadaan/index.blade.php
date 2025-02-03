@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Data Pengadaan</h1>
    <a href="{{ route('user.pengadaan.create') }}" class="btn btn-primary mb-3">Tambah Pengadaan</a>
    <form action="{{ route('user.pengadaan.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan kode Pengadaan, Nama barang," value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pengadaan</th>
                <th>Nama Barang</th>
                <th>Lama Depresiasi</th>
                <th>Merk</th>
                <th>No Invoice</th>
                <th>No Seri Barang</th>
                <th>Tanggal Pengadaan</th>
                <th>Harga Barang</th>
                <th>Nilai Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengadaan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_pengadaan }}</td>
                    <td>{{ $item->masterBarang->nama_barang }}</td>
                    <td>{{ $item->depresiasi->lama_depresiasi }}</td>
                    <td>{{ $item->merk->merk }}</td>
                    <td>{{ $item->no_invoice }}</td>
                    <td>{{ $item->no_seri_barang }}</td>
                    <td>{{ $item->tgl_pengadaan }}</td>
                    <td>{{ number_format($item->harga_barang, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->nilai_barang, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('user.pengadaan.edit', $item->id_pengadaan) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('user.pengadaan.destroy', $item->id_pengadaan) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center">Data Pengadaan tidak ditemukan</td>
                    </tr>
                @endforelse
        </tbody>
    </table>
</div>
@endsection
