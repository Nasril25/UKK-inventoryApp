@extends('layouts.app')

@section('content')  <!-- This section will inject content into the layout -->
    <div class="container mt-4">
        <h1>Data Barang</h1>
        
        <!-- Button to create new Barang -->
        <a href="{{ route('master_barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
        <form action="{{ route('master_barang.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Kode Barang, Nama Barang" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Table for displaying Barang data -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Spesifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barang as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->spesifikasi_teknis }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('master_barang.edit', $item->id_barang) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Delete Button (with confirmation) -->
                            <form action="{{ route('master_barang.destroy', $item->id_barang) }}" method="POST" style="display:inline;">
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
