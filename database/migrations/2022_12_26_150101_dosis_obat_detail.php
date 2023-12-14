<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DosisObatDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosis_obat_detail', function (Blueprint $table) {
            $table->increments('id_dosis_obat_detail');
            $table->string('id_dosis', 255);
            $table->string('id_obat', 255);
            $table->integer('jumlah_dosis_obat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosis_obat_detail');
    }
}
