<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pengguna_id')->unsigned()->nullable();
            $table->integer('stok_kedelai');
            $table->integer('stok_ragi');
            $table->integer('harga_kedelai');
            $table->integer('harga_ragi');
            $table->string('metode');
            $table->integer('rekening');
            $table->string('foto_product');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('transaksi', function (Blueprint $table) {
          $table->foreign('pengguna_id')->references('id')->on('pengguna')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
