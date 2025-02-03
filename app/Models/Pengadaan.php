<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'tbl_pengadaan';

    // Primary key
    protected $primaryKey = 'id_pengadaan';

    // Menonaktifkan timestamps jika tidak digunakan
    public $timestamps = false;

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'id_master_barang',
        'id_depresiasi',
        'id_merk',
        'id_satuan',
        'id_sub_kategori_asset',
        'id_distributor',
        'kode_pengadaan',
        'no_invoice',
        'no_seri_barang',
        'tahun_produksi',
        'tgl_pengadaan',
        'harga_barang',
        'jumlah_barang', // Tambahkan ini
        'nilai_barang',
        'depresiasi_barang', // Tambahan untuk depresiasi
        'fb',
        'keterangan',
    ];

    // Relasi ke tabel master barang
    public function masterBarang()
    {
        return $this->belongsTo(MasterBarang::class, 'id_master_barang', 'id_barang');
    }

    // Relasi ke tabel merk
    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id_merk');
    }

    // Relasi ke tabel satuan
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan', 'id_satuan');
    }

    // Relasi ke tabel sub kategori asset
    public function subKategoriAsset()
    {
        return $this->belongsTo(SubKategoriAsset::class, 'id_sub_kategori_asset', 'id_sub_kategori_asset');
    }

    // Relasi ke tabel distributor
    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'id_distributor', 'id_distributor');
    }

    // Relasi ke tabel depresiasi
    public function depresiasi()
    {
        return $this->belongsTo(Depresiasi::class, 'id_depresiasi', 'id_depresiasi');
    }


}
