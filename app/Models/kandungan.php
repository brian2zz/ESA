<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kandungan extends Model
{
    protected $table = 'kandungan';
    public $timestamps = false;
    protected $fillable = [
    	'id_kandungan',
        'nama_kandungan',
    ];
}
