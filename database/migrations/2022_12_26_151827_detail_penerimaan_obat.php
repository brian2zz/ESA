<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPenerimaanObat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penerimaan_obat', function (Blueprint $table) {
            $table->increments('id_detail_penerimaan_obat');
            $table->string('id_obat', 50);
            $table->string('id_penerimaan', 50);
            $table->string('batch_number',100);
            $table->integer('jumlah_obat_diterima');
            $table->string('tanggal_expired_obat');
            $table->integer('harga_beli_satuan');
            $table->integer('total_harga_beli');
            $table->string('expired_status');
            $table->integer('harga_jual',);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_penerimaan_obat');
    }
}
