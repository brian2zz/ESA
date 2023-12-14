<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pbf extends Model
{
    protected $table = 'pbf';
    public $timestamps = false;
    protected $fillable = [
    	'id_pbf',
        'nama_PBF',
        'nama_PIC',
        'no_tlp_PIC',
        'alamat_PBF',
        'no_tlp_PBF',
        'bank',
        'nomer_rekening',
        'leadtime',
    ];
}
