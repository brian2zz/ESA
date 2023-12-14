<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SatuanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('satuan')->delete();
        
        \DB::table('satuan')->insert(array (
            0 => 
            array (
                'id_satuan_obat' => '1',
                'nama_satuan_obat' => 'Tablet',
            ),
            1 => 
            array (
                'id_satuan_obat' => '2',
                'nama_satuan_obat' => 'Tuba',
            ),
            2 => 
            array (
                'id_satuan_obat' => '3',
                'nama_satuan_obat' => 'Botol',
            ),
        ));
        
        
    }
}