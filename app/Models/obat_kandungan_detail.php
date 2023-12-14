<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat_kandungan_detail extends Model
{
    protected $table = 'obat_kandungan_detail';
    public $timestamps = false;
    protected $fillable = [
    	'id_kandungan_obat',
    	'id_kandungan',
        'id_obat',
        'id_dosis',
    ];
}
