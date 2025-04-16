@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Data Pengadaan</h1>
    <form action="{{ route('user.pengadaan.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan kode Pengadaan, Nama barang," value="{{ request('search') }}">
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
                    <th>Nama Barang</th>
                    <th>Lama Depresiasi</th>
                    <th>Merk</th>
                    <th>Satuan</th>
                    <th>Sub Kategori Aset</th>
                    <th>Distributor</th>
                    <th>No Invoice</th>
                    <th>No Seri Barang</th>
                    <th>Tahun Produksi</th>
                    <th>Tanggal Pengadaan</th>
                    <th>Harga Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Nilai Barang</th>
                    <th>Depresiasi Barang</th>
                    <th>Flag Barang</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengadaan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_pengadaan }}</td>
                        <td>{{ $item->masterBarang->nama_barang }}</td>
                        <td>{{ $item->depresiasi->lama_depresiasi }}</td>
                        <td>{{ $item->merk->merk }}</td>
                        <td>{{ $item->satuan->satuan }}</td>
                        <td>{{ $item->subKategoriAsset->sub_kategori_asset }}</td>
                        <td>{{ $item->distributor->nama_distributor }}</td>
                        <td>
                            @php
                                $invoices = explode(';', $item->no_invoice);
                            @endphp
                            @foreach ($invoices as $invoice)
                                @php
                                    $invoiceParts = explode(':', $invoice);
                                    $no_invoice = $invoiceParts[0] ?? 'N/A';
                                    $jumlah_barang = $invoiceParts[1] ?? '0';
                                @endphp
                                {{ $no_invoice }} ({{ $jumlah_barang }})<br>
                            @endforeach
                        </td>
                        <td>{{ $item->no_seri_barang }}</td>
                        <td>{{ $item->tahun_produksi }}</td>
                        <td>{{ $item->tgl_pengadaan }}</td>
                        <td>{{ number_format($item->harga_barang, 0, ',', '.') }}</td>
                        <td>{{ $item->jumlah_barang }}</td>
                        <td>{{ number_format($item->nilai_barang, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->depresiasi_barang, 0, ',', '.') }}</td>
                        <td>{{ $item->fb == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('user.pengadaan.show', $item->id_pengadaan) }}" class="btn btn-info btn-sm mb-1">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
