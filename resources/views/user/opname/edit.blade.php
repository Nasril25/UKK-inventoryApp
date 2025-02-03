@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Edit Data Opname</h1>
    <a href="{{ route('user.opname.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('user.opname.update', $opname->id_opname) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">ID Pengadaan</label>
            <select class="form-select" id="id_pengadaan" name="id_pengadaan" required>
                @foreach ($pengadaans as $pengadaan)
                <option value="{{ $pengadaan->id_pengadaan }}" {{ $pengadaan->id_pengadaan == $opname->id_pengadaan ? 'selected' : '' }}>
                    {{ $pengadaan->kode_pengadaan }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_opname" class="form-label">Tanggal Opname</label>
            <input type="date" class="form-control" id="tgl_opname" name="tgl_opname" value="{{ $opname->tgl_opname }}" required>
        </div>
        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <input type="text" class="form-control" id="kondisi" name="kondisi" value="{{ $opname->kondisi }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $opname->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
