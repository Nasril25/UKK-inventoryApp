<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_lokasi'; // Nama tabel
    protected $primaryKey = 'id_lokasi'; // Primary key

    protected $fillable = [
        'kode_lokasi',
        'nama_lokasi',
        'keterangan',
    ];
}
