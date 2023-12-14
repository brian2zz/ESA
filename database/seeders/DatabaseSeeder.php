<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Database\Seeders\UsersSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Eloquent::unguard();
        $this->call(UsersSeeder::class);
        $this->call(ObatTableSeeder::class);
        $this->call(DokterTableSeeder::class);
        $this->call(DosisTableSeeder::class);
        $this->call(GolonganTableSeeder::class);
        $this->call(KandunganTableSeeder::class);
        $this->call(KandunganObatTableSeeder::class);
        $this->call(KategoriTableSeeder::class);
        $this->call(PabrikTableSeeder::class);
        $this->call(PbfTableSeeder::class);
        $this->call(SatuanTableSeeder::class);
        $this->call(satuanObatDetailTableSeeder::class);
        $this->call(KategoriPengeluaranTableSeeder::class);
        $this->call(DosisObatDetail::class);
    }
}
