<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depresiasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_depresiasi'; // Nama tabel sesuai ERD
    protected $primaryKey = 'id_depresiasi'; // Primary key
    protected $fillable = [
        'lama_depresiasi', 
        'keterangan'
    ];
}
