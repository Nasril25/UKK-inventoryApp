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
                <option value="{{ $pengadaan->id_pengadaan }}" {{ $pengadaan->id_pengadaan == $opname->id_pengadaan ? 'selected' : '' }} data-quantity="{{ $pengadaan->jumlah_barang }}">
                    {{ $pengadaan->kode_pengadaan }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_opname" class="form-label">Tanggal Opname</label>
            <input type="date" class="form-control" id="tgl_opname" name="tgl_opname" value="{{ $opname->tgl_opname }}" required>
        </div>
        <div id="conditions-container">
            @foreach ($opname->conditions as $condition)
            <div class="condition-item mb-3">
                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control jumlah-barang" name="jumlah_barang[]" value="{{ $condition->jumlah_barang }}" required>
                <div class="text-danger mt-2 jumlah-barang-error" style="display: none;">Jumlah barang melebihi jumlah yang tersedia di pengadaan.</div>
                <label for="kondisi" class="form-label">Kondisi</label>
                <select class="form-select kondisi" name="kondisi[]" required onchange="toggleKeterangan(this)">
                    <option value="Baik" {{ $condition->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak" {{ $condition->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                    <option value="Hilang" {{ $condition->kondisi == 'Hilang' ? 'selected' : '' }}>Hilang</option>
                </select>
                <div class="mb-3 keterangan-container" style="{{ $condition->kondisi == 'Baik' ? 'display: none;' : 'display: block;' }}">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" name="keterangan[]" rows="3">{{ $condition->keterangan }}</textarea>
                </div>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeCondition(this)">Hapus Kondisi</button>
            </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-secondary mb-3" onclick="addCondition()">Tambah Kondisi</button>
        <button type="submit" class="btn btn-primary" id="submitBtn">Update</button>
    </form>
</div>
<script>
    function toggleKeterangan(selectElement) {
        var conditionItem = selectElement.closest('.condition-item');
        var keteranganContainer = conditionItem.querySelector('.keterangan-container');
        if (selectElement.value === 'Baik') {
            keteranganContainer.style.display = 'none';
        } else {
            keteranganContainer.style.display = 'block';
        }
    }

    function addCondition() {
        var conditionsContainer = document.getElementById('conditions-container');
        var conditionItem = document.querySelector('.condition-item').cloneNode(true);
        conditionItem.querySelectorAll('input, select, textarea').forEach(function(input) {
            input.value = '';
        });
        conditionItem.querySelector('.keterangan-container').style.display = 'none';
        conditionsContainer.appendChild(conditionItem);
    }

    function removeCondition(button) {
        var conditionItem = button.closest('.condition-item');
        conditionItem.remove();
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.jumlah-barang').forEach(function(input) {
            input.addEventListener('input', function() {
                var jumlahBarangInput = input;
                var jumlahBarangError = jumlahBarangInput.closest('.condition-item').querySelector('.jumlah-barang-error');
                var submitBtn = document.getElementById('submitBtn');
                var selectedPengadaan = document.getElementById('id_pengadaan').selectedOptions[0];
                var availableQuantity = selectedPengadaan ? parseInt(selectedPengadaan.getAttribute('data-quantity')) : 0;
                var kondisi = jumlahBarangInput.closest('.condition-item').querySelector('.kondisi').value;

                if (jumlahBarangInput.value > availableQuantity && kondisi === 'Baik') {
                    jumlahBarangError.style.display = 'block';
                    submitBtn.disabled = true;
                } else {
                    jumlahBarangError.style.display = 'none';
                    submitBtn.disabled = false;
                }
            });
        });

        document.getElementById('id_pengadaan').addEventListener('change', function() {
            var selectedPengadaan = document.getElementById('id_pengadaan').selectedOptions[0];
            var availableQuantity = selectedPengadaan ? parseInt(selectedPengadaan.getAttribute('data-quantity')) : 0;
            document.querySelectorAll('.jumlah-barang').forEach(function(input) {
                var jumlahBarangError = input.closest('.condition-item').querySelector('.jumlah-barang-error');
                var submitBtn = document.getElementById('submitBtn');
                var kondisi = input.closest('.condition-item').querySelector('.kondisi').value;

                if (input.value > availableQuantity && kondisi === 'Baik') {
                    jumlahBarangError.style.display = 'block';
                    submitBtn.disabled = true;
                } else {
                    jumlahBarangError.style.display = 'none';
                    submitBtn.disabled = false;
                }
            });
        });

        document.querySelectorAll('.kondisi').forEach(function(select) {
            select.addEventListener('change', function() {
                var kondisi = select.value;
                var selectedPengadaan = document.getElementById('id_pengadaan').selectedOptions[0];
                var availableQuantity = selectedPengadaan ? parseInt(selectedPengadaan.getAttribute('data-quantity')) : 0;
                var jumlahBarangInput = select.closest('.condition-item').querySelector('.jumlah-barang');

                if (kondisi === 'Baik' && jumlahBarangInput.value > availableQuantity) {
                    jumlahBarangInput.value = availableQuantity;
                }
            });
        });
    });
</script>
@endsection
