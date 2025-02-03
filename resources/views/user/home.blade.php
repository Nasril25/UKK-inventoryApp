@extends('layouts.user')

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
<div class="container">
    <div class="row">
        <!-- Card for Hitung Depresiasi -->
        <div class="col-12 mb-4">
            <a href="{{ route('user.hitung_depresiasi.index') }}" style="text-decoration: none;">
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
    </div>
</div>
@endsection
