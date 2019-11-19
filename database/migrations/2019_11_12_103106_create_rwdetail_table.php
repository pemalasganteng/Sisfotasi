<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRwdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function __construct(){
        Schema::disableForeignKeyConstraints();
    }
    public function up()
    {
        Schema::create('rwdetail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_ruang')->unsigned();
            $table->foreign('id_ruang')->references('id')->on('ruang')->onDelete('cascade');
            $table->bigInteger('id_waktu')->unsigned();
            $table->foreign('id_waktu')->references('id')->on('waktu')->onDelete('cascade');
            $table->bigInteger('id_jadwal')->unsigned();
            $table->foreign('id_jadwal')->references('id')->on('semprojadwal')->onDelete('cascade');
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
        Schema::dropIfExists('rwdetail');
    }
}
