<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemprojadwalTable extends Migration
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
        Schema::create('semprojadwal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_dosen1')->unsigned();
            $table->foreign('id_dosen1')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_dosen2')->unsigned();
            $table->foreign('id_dosen2')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_ruang')->unsigned();
            $table->foreign('id_ruang')->references('id_ruang')->on('ruangwaktudetail')->onDelete('cascade');
            $table->bigInteger('id_waktu')->unsigned();
            $table->foreign('id_waktu')->references('id_waktu')->on('ruangwaktudetail')->onDelete('cascade');
            $table->bigInteger('id_proposalsempro')->unsigned();
            $table->foreign('id_proposalsempro')->references('id')->on('proposalsempro')->onDelete('cascade');
            $table->bigInteger('id_tahap')->unsigned();
            $table->foreign('id_tahap')->references('id')->on('tahaptaskripsi')->onDelete('cascade');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('semprojadwal');
    }
}
