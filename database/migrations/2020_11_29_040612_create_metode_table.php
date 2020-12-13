<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metode', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bni')->nullable();
            $table->integer('bri')->nullable();
            $table->integer('mandiri')->nullable();
            $table->integer('bca')->nullable();
            $table->integer('btpn')->nullable();
            $table->integer('ovo')->nullable();
            $table->integer('gopay')->nullable();
            $table->integer('dana')->nullable();
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
        Schema::dropIfExists('metode');
    }
}
