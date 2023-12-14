<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ObatTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('obat')->delete();
        
        \DB::table('obat')->insert(array (
            0 => 
            array (
                'id_obat' => '1001100001',
                'id_kategori' => '001',
                'id_golongan' => '1',
                'id_pabrik' => '1',
                'nama_dagang_obat' => 'Acetylcysteine',
                'status' => 'Continue',
                
                
            ),
            1 => 
            array (
                'id_obat' => '1001100002',
                'id_kategori' => '001',
                'id_golongan' => '1',
                'id_pabrik' => '1',
                'nama_dagang_obat' => 'Acyclovir',
                'status' => 'Continue',
                
            ),
            2 => 
            array (
                'id_obat' => '1001100003',
                'id_kategori' => '001',
                'id_golongan' => '1',
                'id_pabrik' => '1',
                'status' => 'Continue',
                'nama_dagang_obat' => 'Panadol',
                
            ),
            3 => 
            array (
                'id_obat' => '1001100004',
                'id_kategori' => '001',
                'id_golongan' => '1',
                'id_pabrik' => '1',
                'status' => 'Discontinue',
                'nama_dagang_obat' => 'Paramex',
            ),
            4 => 
            array (
                'id_obat' => '1001100005',
                'id_kategori' => '001',
                'id_golongan' => '1',
                'id_pabrik' => '1',
                'status' => 'Continue',
                'nama_dagang_obat' => 'Demacolin',
                
            ),
            5 => 
            array (
                'id_obat' => '3003100001',
                'id_kategori' => '003',
                'id_golongan' => '1',
                'id_pabrik' => '5',
                'status' => 'Continue',
                'nama_dagang_obat' => 'Stimuno',
                
            ),
            6 => 
            array (
                'id_obat' => '1002100001',
                'id_kategori' => '002',
                'id_golongan' => '1',
                'id_pabrik' => '4',
                'status' => 'Continue',
                'nama_dagang_obat' => 'Paraflu',
                
            ),
            7 => 
            array (
                'id_obat' => '1001100006',
                'id_kategori' => '001',
                'id_golongan' => '1',
                'id_pabrik' => '1',
                'status' => 'Continue',
                'nama_dagang_obat' => 'Paramex',
                
            ),
            8 => 
            array (
                'id_obat' => '1001100007',
                'id_kategori' => '001',
                'id_golongan' => '1',
                'id_pabrik' => '1',
                'status' => 'Continue',
                'nama_dagang_obat' => 'Stimuno',
                
            ),
            9 => 
            array (
                'id_obat' => '3003100002',
                'id_kategori' => '003',
                'id_golongan' => '1',
                'id_pabrik' => '4',
                'status' => 'Continue',
                'nama_dagang_obat' => 'Hufagrip',
                
            ),
            10 => 
            array (
                'id_obat' => '1002100012',
                'id_kategori' => '002',
                'id_golongan' => '1',
                'id_pabrik' => '3',
                'status' => 'Continue',
                'nama_dagang_obat' => 'Vitacimin-C',
                
            ),
            11 => 
            array (
                'id_obat' => '1001100008',
                'id_kategori' => '001',
                'id_golongan' => '1',
                'id_pabrik' => '6',
                'status' => 'Continue',
                'nama_dagang_obat' => 'Paramex',
                
            ),
            12 => 
            array (
                'id_obat' => '1001100009',
                'id_kategori' => '001',
                'id_golongan' => '1',
                'id_pabrik' => '3',
                'status' => 'Continue',
                'nama_dagang_obat' => 'Paramex',
            ),
        ));
        
        
    }
}