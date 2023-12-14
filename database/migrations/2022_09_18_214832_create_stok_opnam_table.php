<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokOpnamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_opnam', function (Blueprint $table) {
            $table->string('id_stok_opnam', 20)->primary();
            $table->string('batch_number', 20);
            $table->string('tanggal_opnam', 20);
            $table->integer('rekonsiliasi');
            $table->longtext('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_opnam');
    }
}
