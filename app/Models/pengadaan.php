<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengadaan extends Model
{
    protected $table = 'pengadaan';

    protected $fillable = [
        'id_pengadaan',
    	'tanggal_pengadaan',
        'waktu_pengadaan',
        'leadtime',
        'pbf',
        'jumlah_hari',
    ];
}
