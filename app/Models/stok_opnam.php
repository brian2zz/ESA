<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stok_opnam extends Model
{
    protected $table = 'stok_opnam';
    public $timestamps = false;
    protected $fillable = [
    	'id_stok_opnam',
        'batch_number',
        'tanggal_opnam',
        'rekonsiliasi',
        'keterangan',
    ];
}
