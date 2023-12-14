<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dashboard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard', function (Blueprint $table) {
            $table->increments('id_data',255);
            $table->string('tanggal', 20);
            $table->string('id_obat', 20);
            $table->string('tanggal_terima',20);
            $table->integer('jumlah_terima');
            $table->integer('stok_bulan');
            $table->integer('total_pengeluaran')->nullable();
            $table->integer('sisa_stok');
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
        Schema::dropIfExists('dashboard');
    }
}
