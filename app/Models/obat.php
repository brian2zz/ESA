<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    public $timestamps = false;
    protected $fillable = [
        'id_obat',
        'id_kategori', 
        'id_golongan',
        'id_pabrik',
        'nama_dagang_obat',
        'status',
        
    ];
}