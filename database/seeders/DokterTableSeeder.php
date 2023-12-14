<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DokterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dokter')->delete();
        
        \DB::table('dokter')->insert(array (
            0 => 
            array (
                'id_dokter' => '1',
                'nama_dokter' => 'Suharni',
                'SIP_dokter' => '1231231adassd123',
            ),
            1 => 
            array (
                'id_dokter' => '2',
                'nama_dokter' => 'Neni',
                'SIP_dokter' => '1626728',
            ),
            2 => 
            array (
                'id_dokter' => '3',
                'nama_dokter' => 'Tio',
                'SIP_dokter' => '1626728',
            ),
        ));
        
        
    }
}