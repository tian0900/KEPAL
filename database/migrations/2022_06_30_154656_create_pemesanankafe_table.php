<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanankafeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanankafe', function (Blueprint $table) {
            $table->increments('id_pemesanankafe');
            $table->integer('id_pemesanan')->unsigned();
            $table->integer('total_pembayaran');
            $table->integer('id_customer')->unsigned();
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
        Schema::dropIfExists('pemesanankafe');
    }
}
