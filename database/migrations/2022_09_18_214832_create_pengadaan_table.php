<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengadaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pengadaan');
        Schema::create('pengadaan', function (Blueprint $table) {
            $table->increments('id_pengadaan');
            $table->string('tanggal_pengadaan');
            $table->double('waktu_pengadaan');
            $table->double('leadtime');
            $table->string('pbf', 20);
            $table->double('jumlah_hari');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengadaan');
    }
}
