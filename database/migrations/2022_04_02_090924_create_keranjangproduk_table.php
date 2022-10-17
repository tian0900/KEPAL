<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangprodukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangproduk', function (Blueprint $table) {
            $table->increments('id_keranjangproduk');
            $table->integer('id_customer')->unsigned();
            $table->integer('id_produk')->unsigned();
            $table->integer('kuantitas');
            $table->integer('total');
            $table->timestamps();
            
            $table->foreign('id_customer')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjangproduk');
    }
}
