<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananprodukdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesananprodukdetail', function (Blueprint $table) {
            $table->increments('id_pemesananprodukdetail');
            $table->integer('id_produk')->unsigned();
            $table->integer('id_pemesananproduk')->unsigned();
            $table->integer('kuantitas_pesan');
            $table->integer('total_harga');
            $table->timestamps();
            
            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');
            $table->foreign('id_pemesananproduk')->references('id_pemesananproduk')->on('pemesananproduk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesananprodukdetail');
    }
}
