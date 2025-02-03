<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tbl_master_barang';

    // Primary key
    protected $primaryKey = 'id_barang';

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'spesifikasi_teknis',
    ];

    // Kolom timestamps (opsional, matikan jika tabel tidak punya created_at dan updated_at)
    public $timestamps = false;
}
