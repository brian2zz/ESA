<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePabrikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pabrik', function (Blueprint $table) {
            $table->increments('id_pabrik');
            $table->string('nama_pabrik', 50);
            $table->text('alamat_pabrik');
            $table->string('no_telp_pabrik', 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pabrik');
    }
}
