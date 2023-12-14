<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DosisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('dosis')->delete();
        
        \DB::table('dosis')->insert(array (
            0 => 
            array (
                'id_dosis' => '1',
                'nama_dosis' => 'mg',
            ),
            1 => 
            array (
                'id_dosis' => '2',
                'nama_dosis' => 'ml',
            ),
        ));
    }
}
