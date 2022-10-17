<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananprodukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesananproduk', function (Blueprint $table) {
            $table->increments('id_pemesananproduk');
            $table->integer('id_pemesanan')->unsigned();
            $table->integer('total_pembayaran');
            $table->string('metode_pengiriman',20);
            $table->string('status',20);
            $table->date('tanggal_pemesanan');
            $table->string('keterangan',20)->nullable();
            $table->integer('id_customer')->unsigned();
            $table->string('nama_penerima',100)->nullable();
            $table->text('alamat_penerima')->nullable();
            $table->timestamps();
            $table->foreign('id_customer')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesananproduk');
    }
}
