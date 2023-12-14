<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosis extends Model
{
    protected $table = 'dosis';
    public $timestamps = false;
    protected $fillable = [
    	'id_dosis',
        'nama_dosis',
    ];
}
