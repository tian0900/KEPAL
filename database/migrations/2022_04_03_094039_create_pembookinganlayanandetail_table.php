<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembookinganlayanandetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembookinganlayanandetail', function (Blueprint $table) {
            $table->increments('id_pembookinganlayanandetail');
            $table->integer('id_layanan')->unsigned();
            $table->integer('id_pembookinganlayanan')->unsigned();
            $table->integer('total_harga');
            $table->timestamps();

            $table->foreign('id_layanan')->references('id_layanan')->on('layanan')->onDelete('cascade');
            $table->foreign('id_pembookinganlayanan')->references('id_pembookinganlayanan')->on('pembookinganlayanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembookinganlayanandetail');
    }
}
