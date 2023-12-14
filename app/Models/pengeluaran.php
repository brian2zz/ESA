<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    public $timestamps = false;
    protected $fillable = [
        'id_pengeluaran',
        'id_dokter',
        'id_kategori_pengeluaran',
    	'no_resep',
    	'tanggal_pengeluaran',
        'submited',
        'resep_diterima',
        'racikan',
        'id_order',
        'resep_dikeluarkan',
        
    ];
}
