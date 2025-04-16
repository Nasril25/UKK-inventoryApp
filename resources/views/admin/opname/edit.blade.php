@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Data Opname</h1>
    <a href="{{ route('opname.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('opname.update', $opname->id_opname) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">ID Pengadaan</label>
            <select class="form-select" id="id_pengadaan" name="id_pengadaan" required>
                @foreach ($pengadaans as $pengadaan)
                <option value="{{ $pengadaan->id_pengadaan }}" {{ $opname->id_pengadaan == $pengadaan->id_pengadaan ? 'selected' : '' }}>
                    {{ $pengadaan->kode_pengadaan }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_opname" class="form-label">Tanggal Opname</label>
            <input type="date" class="form-control" name="tgl_opname" value="{{ $opname->tgl_opname }}" readonly>
        </div>

        <div id="opname-rows">
            <div class="row mb-3 opname-row">
                <div class="col">
                    <label>Kondisi</label>
                    <select class="form-select kondisi-select" name="kondisi[]">
                        <option value="Baik" {{ $opname->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Rusak" {{ $opname->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                        <option value="Hilang" {{ $opname->kondisi == 'Hilang' ? 'selected' : '' }}>Hilang</option>
                    </select>
                </div>
                <div class="col">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah_barang[]" value="{{ $opname->jumlah_barang }}" required>
                </div>
                <div class="col">
                    <label>Keterangan</label>
                    <input type="text" class="form-control keterangan-input" name="keterangan[]" value="{{ $opname->keterangan }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>

<script>
function updateKeteranganState(row) {
    const kondisi = row.querySelector('.kondisi-select').value;
    const keteranganInput = row.querySelector('.keterangan-input');
    if (kondisi === 'Baik') {
        keteranganInput.disabled = true;
        keteranganInput.value = '';
    } else {
        keteranganInput.disabled = false;
    }
}

document.querySelectorAll('.kondisi-select').forEach(select => {
    const row = select.closest('.opname-row');
    select.addEventListener('change', function() {
        updateKeteranganState(row);
    });

    // Jalankan awal waktu load
    updateKeteranganState(row);
});
</script>
@endsection
