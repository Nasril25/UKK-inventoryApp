<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HitungDepresiasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_hitung_depresiasi';
    protected $primaryKey = 'id_hitung_depresiasi';

    protected $fillable = [
        'id_pengadaan',
        'tgl_hitung_depresiasi',
        'bulan',
        'durasi',
        'nilai_barang',
    ];

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan');
    }
}
