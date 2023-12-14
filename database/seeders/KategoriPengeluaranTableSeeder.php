<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategoriPengeluaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('kategori_pengeluaran')->delete();
        
        \DB::table('kategori_pengeluaran')->insert(array (
            0 => 
            array (
                'id_kategori_pengeluaran' => '1',
                'nama_kategori' => 'resep',
            ),
            1 => 
            array (
                'id_kategori_pengeluaran' => '2',
                'nama_kategori' => 'non resep',
            ),
           
        ));
    }
}
