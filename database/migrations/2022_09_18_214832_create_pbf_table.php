<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePbfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbf', function (Blueprint $table) {
            $table->increments('id_pbf');
            $table->string('nama_PBF', 50);
            $table->string('nama_PIC', 50);
            $table->string('no_tlp_PIC', 15);
            $table->text('alamat_PBF');
            $table->string('no_tlp_PBF', 20);
            $table->string('bank', 20);
            $table->string('nomer_rekening', 30);
            $table->double('leadtime');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pbf');
    }
}
