@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Data Hitung Depresiasi</h1>
    <a href="{{ route('user.hitung_depresiasi.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <form action="{{ route('user.hitung_depresiasi.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Kode Pengadaan, Bulan, Durasi" value="{{ request('search') }}">
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
                    <th>Tanggal Hitung</th>
                    <th>Bulan</th>
                    <th>Durasi</th>
                    <th>Harga Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hitungDepresiasi as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->pengadaan->kode_pengadaan ?? 'Tidak Ada' }}</td>
                    <td>{{ $data->tgl_hitung_depresiasi }}</td>
                    <td>{{ $data->bulan }}</td>
                    <td>{{ $data->durasi }}</td>
                    <td>{{ number_format($data->pengadaan->harga_barang - ((int)$data->bulan * ($data->pengadaan->harga_barang / $data->durasi)), 2) }}</td>
                    <td>
                        <a href="{{ route('user.hitung_depresiasi.show', $data->id_hitung_depresiasi) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('user.hitung_depresiasi.edit', $data->id_hitung_depresiasi) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('user.hitung_depresiasi.destroy', $data->id_hitung_depresiasi) }}" method="POST" style="display: inline;">
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
