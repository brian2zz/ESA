<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_penerimaan_obat extends Model
{
    protected $table = 'detail_penerimaan_obat';
    public $timestamps = false;
    protected $fillable = [
        'id_detail_penerimaan_obat',
        'id_obat',
        'id_penerimaan',
        'batch_number',
        'jumlah_obat_diterima',  
        'tanggal_expired_obat',
        'harga_beli_satuan',
        'total_harga_beli',
        'expired_status',
        'harga_jual'
    ];

}
