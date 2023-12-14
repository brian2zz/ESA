<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KandunganTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kandungan')->delete();
        
        \DB::table('kandungan')->insert(array (
            0 => 
            array (
                'id_kandungan' => '1',
                'nama_kandungan' => 'Acetylcysteine',
                
            ),
            1 => 
            array (
                'id_kandungan' => '2',
                'nama_kandungan' => 'Acyclovir',
                
            ),
            2 => 
            array (
                'id_kandungan' => '3',
                'nama_kandungan' => 'Acyclovir',
                
            ),
            3 => 
            array (
                'id_kandungan' => '4',
                'nama_kandungan' => 'Carbazochorme Sodium Sulfat',
                
            ),
            4 => 
            array (
                'id_kandungan' => '5',
                'nama_kandungan' => 'Attapulgit',
               
            ),
            5 => 
            array (
                'id_kandungan' => '6',
                'nama_kandungan' => 'Pectin',
                
            ),
            6 => 
            array (
                'id_kandungan' => '7',
                'nama_kandungan' => 'Paracetamol',
                
            ),
            7 => 
            array (
                'id_kandungan' => '8',
                'nama_kandungan' => 'Multivitamin',
                
            ),
            8 => 
            array (
                'id_kandungan' => '9',
                'nama_kandungan' => 'Vitamin C',
                
            ),
            9 => 
            array (
                'id_kandungan' => '10',
                'nama_kandungan' => 'Bromhexsin',
                
            ),
        ));
        
        
    }
}