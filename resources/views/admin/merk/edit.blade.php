@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Merk</h1>
    <a href="{{ route('merk.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('merk.update', $merk->id_merk) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="merk" class="form-label">Nama Merk</label>
            <input type="text" class="form-control" id="merk" name="merk" value="{{ $merk->merk }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $merk->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
