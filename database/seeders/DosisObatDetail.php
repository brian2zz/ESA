<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DosisObatDetail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('dosis_obat_detail')->delete();
        
        \DB::table('dosis_obat_detail')->insert(array (
            0 => 
            array (
                'id_obat' => '1001100001',
                'id_dosis' => '1',
                'jumlah_dosis_obat' => '100',
            ),
            1 => 
            array (
                'id_obat' => '1001100002',
                'jumlah_dosis_obat' => '150',
                'id_dosis' => '1',
                
            ),
            2 => 
            array (
                'id_obat' => '1001100003',
                'jumlah_dosis_obat' => '500',
                'id_dosis' => '1',
                
            ),
            3 => 
            array (
                'id_obat' => '1001100004',
                'jumlah_dosis_obat' => '130',
                'id_dosis' => '1',
            ),
            4 => 
            array (
                'id_obat' => '1001100005',
                'jumlah_dosis_obat' => '230',
                'id_dosis' => '1',
                
            ),
            5 => 
            array (
                'id_obat' => '3003100001',
                'jumlah_dosis_obat' => '300',
                'id_dosis' => '1',
                
            ),
            6 => 
            array (
                'id_obat' => '1002100001',
                'jumlah_dosis_obat' => '200',
                'id_dosis' => '1',
                
            ),
            7 => 
            array (
                'id_obat' => '1001100006',
                'jumlah_dosis_obat' => '100',
                'id_dosis' => '1',
            ),
            8 => 
            array (
                'id_obat' => '1001100007',
                'jumlah_dosis_obat' => '210',
                'id_dosis' => '1',
                
            ),
            9 => 
            array (
                'id_obat' => '3003100002',
                'jumlah_dosis_obat' => '600',
                'id_dosis' => '1',
                
            ),
            10 => 
            array (
                'id_obat' => '1002100012',
                'jumlah_dosis_obat' => '400',
                'id_dosis' => '1',
                
            ),
            11 => 
            array (
                'id_obat' => '1001100008',
                'jumlah_dosis_obat' => '300',
                'id_dosis' => '1',
            ),
            12 => 
            array (
                'id_obat' => '1001100009',
                'jumlah_dosis_obat' => '120',
                'id_dosis' => '1',
            ),
        ));
        
        
    }
}
