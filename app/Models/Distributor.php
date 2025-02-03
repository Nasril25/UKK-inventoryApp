<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $table = 'tbl_distributor';
    protected $primaryKey = 'id_distributor';
    public $timestamps = false;

    protected $fillable = [
        'nama_distributor',
        'alamat',
        'no_telp',
        'email',
        'keterangan',
    ];
}
