<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatKandunganDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat_kandungan_detail', function (Blueprint $table) {
            $table->increments('id_kandungan_obat');
            $table->integer('id_kandungan')->nullable();
            $table->string('id_obat');
            $table->integer('id_dosis')->nullable();
            $table->integer('jumlah_dosis_kandungan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat_kandungan_detail');
    }
}
