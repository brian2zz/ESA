<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class satuan_obat extends Model
{
    protected $table = 'satuan';
    public $timestamps = false;
    protected $fillable = [
    	'id_satuan_obat',
        'nama_satuan_obat',
    ];
}
