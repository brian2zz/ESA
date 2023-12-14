<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GolonganTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('golongan')->delete();
        
        \DB::table('golongan')->insert(array (
            0 => 
            array (
                'id_golongan' => '1',
                'nama_golongan' => 'Bebas',
            ),
            1 => 
            array (
                'id_golongan' => '2',
                'nama_golongan' => 'Bebas Terbatas',
            ),
            2 => 
            array (
                'id_golongan' => '3',
                'nama_golongan' => 'Keras',
            ),
            3 => 
            array (
                'id_golongan' => '4',
                'nama_golongan' => 'Terbatas',
            ),
            4 => 
            array (
                'id_golongan' => '5',
                'nama_golongan' => 'Keras Terbatas',
            ),
        ));
        
        
    }
}