<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class satuan_obat_detail extends Model
{
    protected $table = 'satuan_obat_detail';
    public $timestamps = false;
    protected $fillable = [
    	'id_obat',
        'id_satuan_obat',
        
    ];
}
