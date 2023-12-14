<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGudangObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_gudang', function (Blueprint $table) {
            $table->increments('id_history_gudang');
            $table->string('id_detail_pengeluaran',255)->nullable();
            $table->string('id_detail_penerimaan',255)->nullable();
            $table->string('id_stok_opname',255)->nullable();
            $table->integer('stok')->nullable();
        });
    }
            

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_gudang');
    }
}
