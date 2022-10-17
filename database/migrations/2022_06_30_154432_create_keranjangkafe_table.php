<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangkafeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangkafe', function (Blueprint $table) {
            $table->increments('id_keranjangkafe');
            $table->integer('id_customer')->unsigned();
            $table->integer('id_cafe')->unsigned();
            $table->integer('kuantitas');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('id_customer')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('id_cafe')->references('id_cafe')->on('cafe')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjangkafe');
    }
}
