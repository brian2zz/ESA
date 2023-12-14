<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PabrikTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pabrik')->delete();
        
        \DB::table('pabrik')->insert(array (
            0 => 
            array (
                'id_pabrik' => '1',
                'nama_pabrik' => 'PT Kimia Farma',
                'alamat_pabrik' => 'Jalan Raya Pakal 11A',
                'no_telp_pabrik' => '08657889922',
            ),
            1 => 
            array (
                'id_pabrik' => '2',
                'nama_pabrik' => 'PT Sanbee',
                'alamat_pabrik' => 'Jalan Raya Pakal 267',
                'no_telp_pabrik' => '0898636789',
            ),
            2 => 
            array (
                'id_pabrik' => '3',
                'nama_pabrik' => 'PT Cahaya',
                'alamat_pabrik' => 'Jalan Raya Pakal 56',
                'no_telp_pabrik' => '087373893903',
            ),
            3 => 
            array (
                'id_pabrik' => '4',
                'nama_pabrik' => 'PT Henson Farma',
                'alamat_pabrik' => 'Jl. Rungkut Industri III/31',
                'no_telp_pabrik' => '031-7865446',
            ),
            4 => 
            array (
                'id_pabrik' => '5',
                'nama_pabrik' => 'PT. Surya Dermato Medica Lab',
                'alamat_pabrik' => 'Jl. Karangpilang Barat No.200',
                'no_telp_pabrik' => '0898636789',
            ),
            5 => 
            array (
                'id_pabrik' => '6',
                'nama_pabrik' => 'PT Surya',
                'alamat_pabrik' => 'Jalan Raya Pakal 561',
                'no_telp_pabrik' => '098755788',
            ),
        ));
        
        
    }
}