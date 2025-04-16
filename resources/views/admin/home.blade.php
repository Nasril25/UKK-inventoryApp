@extends('layouts.app')

@section('content')

<style>
 /* Global Card Style */
.card {
    border-radius: 10px; /* Lengkungan yang halus pada sudut */
    margin-bottom: 20px; /* Memberikan jarak antar card */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Memberikan bayangan halus */
    transition: all 0.3s ease; /* Transisi lebih halus saat hover */
}

/* Efek Hover pada Card */
.card:hover {
    transform: translateY(-8px); /* Memberikan efek card terangkat */
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); /* Efek bayangan lebih tajam */
}

/* Card Title Style */
.card-title {
    font-size: 1.4rem;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 15px;
}

/* Card Text Style */
.card-text {
    font-size: 1.1rem;
    font-weight: 500;
    color: #f0f0f0;
}

.card-text-mstr{
    color: black;
    font-size: 1.1rem;
    font-weight: 500;
}

/* Menambahkan padding pada body card untuk lebih lega */
.card-body {
    padding: 20px;
}

/* Efek gradien untuk card background */
.card.bg-primary {
    background: linear-gradient(135deg, #007bff, #00c6ff);
}

.card.bg-primary:hover {
    background: linear-gradient(135deg, #0056b3, #00a3cc);
}

.card.bg-secondary {
    background: linear-gradient(135deg, #6c757d, #495057);
}

.card.bg-secondary:hover {
    background: linear-gradient(135deg, #5a6268, #343a40);
}

.card.bg-success {
    background: linear-gradient(135deg, #28a745, #85e1a3);
}

.card.bg-success:hover {
    background: linear-gradient(135deg, #218838, #66cc66);
}

.card.bg-danger {
    background: linear-gradient(135deg, #dc3545, #f46b6b);
}

.card.bg-danger:hover {
    background: linear-gradient(135deg, #c82333, #e74c3c);
}

.card.bg-warning {
    background: linear-gradient(135deg, #ffc107, #ffd700);
}

.card.bg-warning:hover {
    background: linear-gradient(135deg, #e0a800, #ffcc00);
}

.card.bg-info {
    background: linear-gradient(135deg, #17a2b8, #5bc0de);
}

.card.bg-info:hover {
    background: linear-gradient(135deg, #138496, #4ca9cc);
}

.card.bg-dark {
    background: linear-gradient(135deg, #343a40, #495057);
}

.card.bg-dark:hover {
    background: linear-gradient(135deg, #23272b, #6c757d);
}

.card.bg-light {
    background: linear-gradient(135deg, #f8f9fa, #f0f0f0);
}

.card.bg-light:hover {
    background: linear-gradient(135deg, #dae0e5, #d1d7db);
}


/* Border Kartu */
.card .card-body {
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Menambahkan jarak antar kolom untuk memastikan tampilan tidak terhimpit */
.row {
    margin-top: 30px;
}

/* Mengatur ukuran card secara responsif agar tidak terlalu kecil di layar kecil */
@media (max-width: 768px) {
    .row-cols-md-3 {
        grid-template-columns: repeat(1, 1fr);
    }
}

@media (min-width: 768px) and (max-width: 1024px) {
    .row-cols-md-3 {
        grid-template-columns: repeat(2, 1fr);
    }
}

</style>
@section('content')
<div class="container">
    <div class="row">
        <!-- Card for Kategori Asset -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('master_barang.index') }}" style="text-decoration: none;">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Master Barang</h5>
                        <p class="card-text">{{ $masterBarangCount ?? 0 }} Total Barang</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card for Sub Kategori Asset -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('kategori_asset.index') }}" style="text-decoration: none;">
                <div class="card bg-success text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Kategori Asset</h5>
                        <p class="card-text">{{ $kategoriAssetCount ?? 0 }} Total Kategori</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card for Distributor -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('sub_kategori_asset.index') }}" style="text-decoration: none;">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Sub Kategori Asset</h5>
                        <p class="card-text">{{ $subKategoriAssetCount ?? 0 }} Total Sub Kategori</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card for Master Barang -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('lokasi.index') }}" style="text-decoration: none;">
                <div class="card bg-danger text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Lokasi</h5>
                        <p class="card-text">{{ $lokasiCount ?? 0 }} Total Lokasi</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('mutasi_lokasi.index') }}" style="text-decoration: none;">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Mutasi Lokasi</h5>
                        <p class="card-text">{{ $mutasiLokasiCount ?? 0 }} Total Mutasi Lokasi</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('distributor.index') }}" style="text-decoration: none;">
                <div class="card bg-info text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Distributor</h5>
                        <p class="card-text">{{ $distributorCount ?? 0 }} Total Distributor</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('merk.index') }}" style="text-decoration: none;">
                <div class="card bg-danger text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Merk</h5>
                        <p class="card-text">{{ $merkCount ?? 0 }} Total Merk</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('satuan.index') }}" style="text-decoration: none;">
                <div class="card bg-success text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Satuan</h5>
                        <p class="card-text">{{ $satuanCount ?? 0 }} Total Satuan</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('depresiasi.index') }}" style="text-decoration: none;">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Depresiasi</h5>
                        <p class="card-text">{{ $depresiasiCount ?? 0 }} Total Depresiasi</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('hitung_depresiasi.index') }}" style="text-decoration: none;">
                <div class="card bg-danger text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Hitung Depresiasi</h5>
                        <p class="card-text">{{ $hitungDepresiasiCount ?? 0 }} Total Hitung Depresiasi</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('opname.index') }}" style="text-decoration: none;">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Opname</h5>
                        <p class="card-text">{{ $opnameCount ?? 0 }} Total Opname</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('pengadaan.index') }}" style="text-decoration: none;">
                <div class="card bg-info text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">Pengadaan</h5>
                        <p class="card-text">{{ $pengadaanCount ?? 0 }} Total Pengadaan</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Add more cards here for other entities as needed -->

    <!-- </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <canvas id="dataPieChart"></canvas>
        </div>
    </div>
</div> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('dataPieChart').getContext('2d');
        var dataPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'Kategori Asset', 
                    'Sub Kategori Asset', 
                    'Merk', 
                    'Satuan', 
                    'Distributor', 
                    'Depresiasi', 
                    'Master Barang', 
                    'Pengadaan', 
                    'Mutasi Lokasi', 
                    'Lokasi', 
                    'Opname', 
                    'Hitung Depresiasi'
                ],
                datasets: [{
                    data: [
                        {{ $kategoriAssetCount }},
                        {{ $subKategoriAssetCount }},
                        {{ $merkCount }},
                        {{ $satuanCount }},
                        {{ $distributorCount }},
                        {{ $depresiasiCount }},
                        {{ $masterBarangCount }},
                        {{ $pengadaanCount }},
                        {{ $mutasiLokasiCount }},
                        {{ $lokasiCount }},
                        {{ $opnameCount }},
                        {{ $hitungDepresiasiCount }}
                    ],
                    backgroundColor: [
                        '#007bff',
                        '#28a745',
                        '#dc3545',
                        '#ffc107',
                        '#17a2b8',
                        '#343a40',
                        '#6c757d',
                        '#f8f9fa',
                        '#343a40',
                        '#6c757d',
                        '#f8f9fa',
                        '#007bff'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    });
</script> -->
@endsection
