<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('id_pemesanan');
            $table->string('kode_transaksi');
            $table->integer('id_customer')->unsigned();
            $table->string('metode_pembayaran');
            $table->date('tanggal_pesanan');
            $table->timestamp('tanggal_kadaluwarsa');
            $table->integer('total_pemesanan');
            $table->string('status_pembayaran');
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
            $table->foreign('id_customer')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
