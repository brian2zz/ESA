<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kandungan_obat extends Model
{
    protected $table = 'kandungan_obat';
    public $timestamps = false;
    protected $fillable = [
    	'id_kandungan_obat',
        'id_kandungan',
        
    ];
} 
