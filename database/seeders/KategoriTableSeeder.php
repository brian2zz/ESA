<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kategori')->delete();
        
        \DB::table('kategori')->insert(array (
            0 => 
            array (
                'id_kategori' => '001',
                'nama_kategori' => 'Analgesik',
            ),
            1 => 
            array (
                'id_kategori' => '002',
                'nama_kategori' => 'Antipiretik',
            ),
            2 => 
            array (
                'id_kategori' => '003',
                'nama_kategori' => 'Antiinflamasi',
            ),
        ));
        
        
    }
}