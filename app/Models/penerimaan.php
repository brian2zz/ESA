<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerimaan extends Model
{
    protected $table = 'penerimaan';
    public $timestamps = false;
    protected $fillable = [
    	'id_penerimaan',
        'id_pbf',
        'tanggal_penerimaan',        
    ];
}
