<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuangan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bahan_baku');
            $table->integer('biaya_tambahan');
            $table->integer('biaya_produksi')->nullable();
            $table->integer('jumlah_tempe')->nullable();
            $table->integer('hasil_penjualan')->nullable();
            $table->integer('hasil_pendapatan')->nullable();
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
        Schema::dropIfExists('keuangan');
    }
}
