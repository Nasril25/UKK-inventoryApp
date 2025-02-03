@extends('layouts.user')

@section('content')  <!-- This section will inject content into the layout -->
    <div class="container mt-4">
        <h1>Data Barang</h1>
        <!-- Button to create new Barang -->
        <form action="{{ route('user.master_barang.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Kode Lokasi, Nama Lokasi" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

        <!-- Table for displaying Barang data -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Spesifikasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barang as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->spesifikasi_teknis }}</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Data Barang tidak ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
