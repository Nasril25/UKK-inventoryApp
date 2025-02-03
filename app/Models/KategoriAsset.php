<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAsset extends Model
{
    use HasFactory;

    protected $table = 'tbl_kategori_asset';
    protected $primaryKey = 'id_kategori_asset';
    public $timestamps = false;

    protected $fillable = [
        'kode_kategori_asset',
        'kategori_asset',
    ];

    // Relasi ke sub kategori asset
    public function subKategoriAssets()
    {
        return $this->hasMany(SubKategoriAsset::class, 'id_kategori_asset', 'id_kategori_asset');
    }
}


