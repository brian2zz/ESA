<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
    protected $table = 'dokter';
    public $timestamps = false;
    protected $fillable = [
    	'id_dokter',
        'nama_dokter',
        'IP_dokter',
    ];
} 
