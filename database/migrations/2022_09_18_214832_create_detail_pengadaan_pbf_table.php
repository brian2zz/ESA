<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPengadaanPbfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengadaan_pbf', function (Blueprint $table) {
            $table->integer('id_detail_pengadaan');
            $table->integer('id_pengadaan');
            $table->integer('id_PBF');
            $table->date('tanggal_pengadaan_pbf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pengadaan_pbf');
    }
}
