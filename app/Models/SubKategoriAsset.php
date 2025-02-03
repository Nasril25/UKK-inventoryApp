<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriAsset extends Model
{
    use HasFactory;

    protected $table = 'tbl_sub_kategori_asset'; // Tabel sesuai ERD
    protected $primaryKey = 'id_sub_kategori_asset'; // Primary key sesuai ERD
    public $timestamps = false;

    protected $fillable = [
        'kode_sub_kategori_asset',
        'id_kategori_asset',
        'sub_kategori_asset',
        'keterangan',
    ];

    // Relasi ke kategori asset
    public function kategoriAsset()
    {
        return $this->belongsTo(KategoriAsset::class, 'id_kategori_asset', 'id_kategori_asset');
    }
}
