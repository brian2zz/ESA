<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gudang_obat extends Model
{
    protected $table = 'stok_gudang';
    public $timestamps = false;
    protected $fillable = [
    	'id_history_gudang',
    	'id_detail_pengeluaran',
        'id_detail_penerimaan',
        'id_stok_opname',
        'stok', 
    ];
}
