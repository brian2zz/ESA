<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PbfTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pbf')->delete();
        
        \DB::table('pbf')->insert(array (
            0 => 
            array (
                'id_pbf' => '1',
                'nama_PBF' => 'Novaphairin',
                'nama_PIC' => 'April',
                'no_tlp_PIC' => '0876899211',
                'alamat_PBF' => 'Jalan Raya Kepatihan 245',
                'no_tlp_PBF' => '0876899211',
                'bank' => 'mandiri',
                'nomer_rekening' => '8678000',
                'leadtime' => 3.0,
            ),
            1 => 
            array (
                'id_pbf' => '2',
                'nama_PBF' => 'Cahaya Permata',
                'nama_PIC' => 'Andi',
                'no_tlp_PIC' => '0876899211',
                'alamat_PBF' => 'Jalan Raya Kepatihan 111',
                'no_tlp_PBF' => '0876899211',
                'bank' => 'mandiri',
                'nomer_rekening' => '8678000',
                'leadtime' => 0.44,
            ),
            2 => 
            array (
                'id_pbf' => '3',
                'nama_PBF' => 'Indah Sanjaya',
                'nama_PIC' => 'April',
                'no_tlp_PIC' => '0876537383',
                'alamat_PBF' => 'Jln. Raya Margorejo Indah Blok A-137/58',
                'no_tlp_PBF' => '0876537383',
                'bank' => 'mandiri',
                'nomer_rekening' => '8678000',
                'leadtime' => 2.77,
            ),
            3 => 
            array (
                'id_pbf' => '4',
                'nama_PBF' => 'PT. Indofarma Global Medica',
                'nama_PIC' => 'Nisa',
                'no_tlp_PIC' => '0876899211',
                'alamat_PBF' => 'Jl. Kalibokor Selatan No 152',
                'no_tlp_PBF' => '0876899211',
                'bank' => 'mandiri',
                'nomer_rekening' => '8678000',
                'leadtime' => 0.78,
            ),
            4 => 
            array (
                'id_pbf' => '5',
                'nama_PBF' => 'ArunaJaya',
                'nama_PIC' => 'April',
                'no_tlp_PIC' => '0876537383',
                'alamat_PBF' => 'Jl. Kalibokor Selatan No 11',
                'no_tlp_PBF' => '0876537383',
                'bank' => 'mandiri',
                'nomer_rekening' => '7654579',
                'leadtime' => 0.97,
            ),
        ));
        
        
    }
}