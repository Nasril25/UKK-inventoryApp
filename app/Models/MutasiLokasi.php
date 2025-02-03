<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiLokasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_mutasi_lokasi';
    protected $primaryKey = 'id_mutasi_lokasi'; // Update this line if the primary key is not 'id'

    protected $fillable = [
        'id_lokasi',
        'id_pengadaan',
        'flag_lokasi',
        'flag_pindah'
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan');
    }
}
