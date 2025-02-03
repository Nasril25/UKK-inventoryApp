@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Depresiasi</h1>
    <a href="{{ route('depresiasi.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('depresiasi.update', $depresiasi->id_depresiasi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="lama_depresiasi" class="form-label">Lama Depresiasi</label>
            <input type="number" class="form-control" id="lama_depresiasi" name="lama_depresiasi" value="{{ $depresiasi->lama_depresiasi }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $depresiasi->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
