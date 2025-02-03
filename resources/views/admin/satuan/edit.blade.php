@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Satuan</h1>
    <a href="{{ route('satuan.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('satuan.update', $satuan->id_satuan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="satuan" class="form-label">Nama Satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" value="{{ $satuan->satuan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
