<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pabrik_obat extends Model
{
    protected $table = 'pabrik';
    public $timestamps = false;
    protected $fillable = [
    	'id_pabrik',
        'nama_pabrik',
        'alamat_pabrik',
        'no_telp_pabrik',
        
    ];
}
