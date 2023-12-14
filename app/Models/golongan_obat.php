<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class golongan_obat extends Model
{
    protected $table = 'golongan';
    public $timestamps = false;
    protected $fillable = [
    	'id_golongan',
        'nama_golongan',
    ];
} 
