<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->increments('id_pengeluaran');
            $table->string('id_dokter', 20)->nullable();
            $table->string('id_kategori_pengeluaran', 20);
            $table->string('no_resep', 20)->nullable();
            $table->string('tanggal_pengeluaran', 20);
            $table->string('submited', 20);
            $table->time('resep_diterima')->useCurrent();
            $table->time('resep_dikeluarkan')->nullable();
            $table->string('racikan',20);
            $table->string('id_order',20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluaran');
    }
}
