<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_pengeluaran extends Model
{
    protected $table = 'kategori_pengeluaran';
    public $timestamps = false;
    protected $fillable = [
    	'id_kategori_pengeluaran',
        'nama_kategori',
    ];
}
