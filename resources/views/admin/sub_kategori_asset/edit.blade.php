@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Sub Kategori</h1>
    <form action="{{ route('sub_kategori_asset.update', $subKategori->id_sub_kategori_asset) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode_sub_kategori_asset" class="form-label">Kode Sub Kategori</label>
            <input type="text" class="form-control" id="kode_sub_kategori_asset" name="kode_sub_kategori_asset" value="{{ $subKategori->kode_sub_kategori_asset }}" required>
        </div>
        <div class="mb-3">
            <label for="id_kategori_asset" class="form-label">Kategori Asset</label>
            <select class="form-select" id="id_kategori_asset" name="id_kategori_asset" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoriAssets as $kategori)
                    <option value="{{ $kategori->id_kategori_asset }}" {{ $subKategori->id_kategori_asset == $kategori->id_kategori_asset ? 'selected' : '' }}>
                        {{ $kategori->kategori_asset }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="sub_kategori_asset" class="form-label">Sub Kategori</label>
            <input type="text" class="form-control" id="sub_kategori_asset" name="sub_kategori_asset" value="{{ $subKategori->sub_kategori_asset }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
