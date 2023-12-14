<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosis_obat_detail extends Model
{
    protected $table = 'dosis_obat_detail';
    public $timestamps = false;
    protected $fillable = [
    	'id_dosis_obat_detail',
        'id_dosis',
        'id_obat',
        'jumlah_dosis_obat',
        
    ];
}
