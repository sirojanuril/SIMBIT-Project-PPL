<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('transaksi_id')->unsigned()->nullable();
            $table->integer('kedelai_beli');
            $table->integer('ragi_beli');
            $table->integer('total_pembelian');
            $table->string('status'); //harusnya nullable
            $table->string('bukti_pembayaran')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();
        });
        
        Schema::table('pesanan', function (Blueprint $table) {
          $table->foreign('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('pesanan', function (Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
