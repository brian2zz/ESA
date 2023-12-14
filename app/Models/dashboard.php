<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dashboard extends Model
{
    protected $table = 'dashboard';

    protected $fillable = [
    	'id_data',
        'tanggal',
        'id_obat',
        'tanggal_terima',
        'jumlah_terima',
        'total_pengeluaran',
        'stok_bulan',
        'sisa_stok',
        'updated_at',
        'created_at',
    ];
} 
