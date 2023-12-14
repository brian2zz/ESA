<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPengadaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengadaan', function (Blueprint $table) {
            $table->string('id_pengadaan', 20);
            $table->string('pabrik');
            $table->string('id_obat', 20);
            $table->integer('harga');
            $table->integer('CA');
            $table->integer('jumlah_kebutuhan_obat');
            $table->integer('stok_minimal');
            $table->integer('sisa_stok');
            $table->integer('CT');
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
        Schema::dropIfExists('detail_pengadaan');
    }
}
