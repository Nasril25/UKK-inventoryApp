<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    protected $table = 'tbl_satuan';
    protected $primaryKey = 'id_satuan';
    public $timestamps = false;

    protected $fillable = [
        'satuan',
    ];
}
