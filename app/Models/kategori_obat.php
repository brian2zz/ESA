<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_obat extends Model
{
    protected $table = 'kategori';
    public $timestamps = false;
    protected $fillable = [
    	'id_kategori',
        'nama_kategori',
        
    ];
} 
