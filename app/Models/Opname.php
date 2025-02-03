<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opname extends Model
{
    use HasFactory;

    protected $table = 'tbl_opname';
    protected $primaryKey = 'id_opname';

    protected $fillable = [
        'id_pengadaan',
        'tgl_opname',
        'kondisi',
        'keterangan',
    ];

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan');
    }
}
