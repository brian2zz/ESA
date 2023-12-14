<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pengeluaran_obat extends Model
{
    protected $table = 'detail_pengeluaran_obat';
    public $timestamps = false;
    protected $fillable = [
    	'id_obat_pengeluaran',
        'id_pengeluaran',
        'batch_number',
        'jumlah_obat_keluar',
        'tata_cara_pemakaian'
    ];
}
