<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPengeluaranObat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('detail_pengeluaran_obat');
        Schema::create('detail_pengeluaran_obat', function (Blueprint $table) {
            $table->increments('id_obat_pengeluaran');
            $table->string('id_pengeluaran');
            $table->string('batch_number');
            $table->integer('jumlah_obat_keluar');
            $table->string('tata_cara_pemakaian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pengeluaran_obat');
    }
}
