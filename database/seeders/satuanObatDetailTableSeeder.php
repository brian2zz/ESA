<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class satuanObatDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('satuan_obat_detail')->delete();
        
        \DB::table('satuan_obat_detail')->insert(array (
            0 => 
            array (
                'id_obat' => '1001100001',
                'id_satuan_obat' => '1',
            ),
            1 => 
            array (
                'id_obat' => '1001100002',
                'id_satuan_obat' => '3',
        
            ),
            2 => 
            array (
                'id_obat' => '1001100003',
                'id_satuan_obat' => '2',
          
            ),
            3 => 
            array (
                'id_obat' => '1001100004',
                'id_satuan_obat' => '2',
              
            ),
            4 => 
            array (
                'id_obat' => '1001100005',
                'id_satuan_obat' => '1',
             
            ),
            5 => 
            array (
                'id_obat' => '3003100001',
                'id_satuan_obat' => '3',
              
            ),
            6 => 
            array (
                'id_obat' => '1002100001',
                'id_satuan_obat' => '1',
              
            ),
            7 => 
            array (
                'id_obat' => '1001100006',
                'id_satuan_obat' => '3',
               
            ),
            8 => 
            array (
                'id_obat' => '1001100007',
                'id_satuan_obat' => '1',
              
            ),
            9 => 
            array (
                'id_obat' => '3003100002',
                'id_satuan_obat' => '2',
              
            ),
            10 => 
            array (
                'id_obat' => '1002100012',
                'id_satuan_obat' => '1',
               
            ),
            11 => 
            array (
                'id_obat' => '1001100008',
                'id_satuan_obat' => '3',
              
            ),
            12 => 
            array (
                'id_obat' => '1001100009',
                'id_satuan_obat' => '1',
              
            ),
        ));
        
    }
}
