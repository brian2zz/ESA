<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KandunganObatTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('obat_kandungan_detail')->delete();
        
        \DB::table('obat_kandungan_detail')->insert(array (
            0 => 
            array (
                'id_kandungan' => '4',
                'id_obat' => '3003100001',
                'jumlah_dosis_kandungan' => null,
                'id_dosis' => null,
            ),
            1 => 
            array (
                'id_kandungan' => '7',
                'id_obat' => '1001100003',
                'jumlah_dosis_kandungan' => '500',
                'id_dosis' => '1',
            ),
            2 => 
            array (
                'id_kandungan' => '7',
                'id_obat' => '1001100005',
                'jumlah_dosis_kandungan' => '500',
                'id_dosis' => '1',
            ),
            3 => 
            array (
                'id_kandungan' => '4',
                'id_obat' => '1001100001',
                'jumlah_dosis_kandungan' => null,
                'id_dosis' => null,
            ),
            4 => 
            array (
                'id_kandungan' => '1',
                'id_obat' => '1001100001',
                'jumlah_dosis_kandungan' => '200',
                'id_dosis' => '1',
            ),
            5 => 
            array (
                'id_kandungan' => '1',
                'id_obat' => '1001100006',
                'jumlah_dosis_kandungan' => '200',
                'id_dosis' => '1',
            ),
            6 => 
            array (
                'id_kandungan' => '4',
                'id_kandungan_obat' => '1001100006',
                'jumlah_dosis_kandungan' => null,
                'id_dosis' => null,
            ),
            7 => 
            array (
                'id_kandungan' => '7',
                'id_obat' => '1001100006',
                'jumlah_dosis_kandungan' => '500',
                'id_dosis' => '1',
            ),
            8 => 
            array (
                'id_kandungan' => '3',
                'id_obat' => '1001100004',
                'jumlah_dosis_kandungan' => '400',
                'id_dosis' => '1',
            ),
            9 => 
            array (
                'id_kandungan' => '4',
                'id_obat' => '1001100002',
                'jumlah_dosis_kandungan' => null,
                'id_dosis' => null,
            ),
            10 => 
            array (
                'id_kandungan' => '4',
                'id_obat' => '3003100002',
                'jumlah_dosis_kandungan' => null,
                'id_dosis' => null,
            ),
            11 => 
            array (
                'id_kandungan' => '6',
                'id_obat' => '3003100002',
                'jumlah_dosis_kandungan' => '50',
                'id_dosis' => '1',
            ),
            12 => 
            array (
                'id_kandungan' => '5',
                'id_obat' => '1002100012',
                'jumlah_dosis_kandungan' => '600',
                'id_dosis' => '1',
            ),
            13 => 
            array (
                'id_kandungan' => '2',
                'id_obat' => '1002100012',
                'jumlah_dosis_kandungan' => '200',
                'id_dosis' => '1',
            ),
            14 => 
            array (
                'id_kandungan' => '3',
                'id_obat' => '1001100008',
                'jumlah_dosis_kandungan' => '3',
                'id_dosis' => '1',
            ),
            15 => 
            array (
                'id_kandungan' => '7',
                'id_obat' => '1001100008',
                'jumlah_dosis_kandungan' => '500',
                'id_dosis' => '1',
            ),
            16 => 
            array (
                'id_kandungan' => '7',
                'id_obat' => '1001100009',
                'jumlah_dosis_kandungan' => '500',
                'id_dosis' => '1',
            ),
            17 => 
            array (
                'id_kandungan' => '2',
                'id_obat' => '1002100001',
                'jumlah_dosis_kandungan' => '500',
                'id_dosis' => '1',
            ),
        ));
        
        
    }
}