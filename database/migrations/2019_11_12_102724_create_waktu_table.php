<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaktuTable extends Migration
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
        Schema::create('waktu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sesi');
            $table->time('jam_mulai');
            $table->time('jam_akhir');
            $table->bigInteger('id_ruang')->unsigned();
            $table->foreign('id_ruang')->references('id')->on('ruang')->onDelete('cascade');
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
        Schema::dropIfExists('waktu');
    }
}
