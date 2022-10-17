<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanankafedetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanankafedetail', function (Blueprint $table) {
            $table->increments('id_pemesanankafedetail');
            $table->integer('id_cafe')->unsigned();
            $table->integer('id_pemesanankafe')->unsigned();
            $table->integer('kuantitas');
            $table->integer('total_harga');
            $table->timestamps();

            $table->foreign('id_cafe')->references('id_cafe')->on('cafe')->onDelete('cascade');
            $table->foreign('id_pemesanankafe')->references('id_pemesanankafe')->on('pemesanankafe')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanankafedetail');
    }
}
