@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Data Opname</h1>
    <a href="{{ route('opname.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('opname.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">ID Pengadaan</label>
            <select class="form-select" id="id_pengadaan" name="id_pengadaan" required>
                @foreach ($pengadaans as $pengadaan)
                <option value="{{ $pengadaan->id_pengadaan }}">{{ $pengadaan->kode_pengadaan }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_opname" class="form-label">Tanggal Opname</label>
            <input type="date" class="form-control" name="tgl_opname" value="{{ date('Y-m-d') }}" readonly>
        </div>

        <div id="opname-rows">
            <div class="row mb-3 opname-row">
                <div class="col">
                    <label>Kondisi</label>
                    <select class="form-select kondisi-select" name="kondisi[]">
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Hilang">Hilang</option>
                    </select>
                </div>
                <div class="col">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah_barang[]" required>
                </div>
                <div class="col">
                    <label>Keterangan</label>
                    <input type="text" class="form-control keterangan-input" name="keterangan[]" disabled>
                </div>
                <div class="col d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-success mb-3" id="addRow">+ Tambah Baris</button>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
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

document.getElementById('addRow').addEventListener('click', function() {
    const container = document.getElementById('opname-rows');
    const newRow = container.querySelector('.opname-row').cloneNode(true);
    newRow.querySelectorAll('input').forEach(input => input.value = '');
    newRow.querySelector('.keterangan-input').disabled = true;
    container.appendChild(newRow);

    newRow.querySelector('.btn-remove').addEventListener('click', function() {
        newRow.remove();
    });

    newRow.querySelector('.kondisi-select').addEventListener('change', function() {
        updateKeteranganState(newRow);
    });
});

document.querySelectorAll('.btn-remove').forEach(button => {
    button.addEventListener('click', function() {
        this.closest('.opname-row').remove();
    });
});

document.querySelectorAll('.kondisi-select').forEach(select => {
    select.addEventListener('change', function() {
        updateKeteranganState(this.closest('.opname-row'));
    });
});
</script>
@endsection
