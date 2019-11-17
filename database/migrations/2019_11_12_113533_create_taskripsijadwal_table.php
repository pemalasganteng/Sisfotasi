<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskripsijadwalTable extends Migration
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
        Schema::create('taskripsijadwal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_dosen')->unsigned();
            $table->foreign('id_dosen')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_dosen2')->unsigned();
            $table->foreign('id_dosen2')->references('id')->on('users')->onDelete('cascade');
            $table->date('tanggal');
            $table->bigInteger('id_waktu')->unsigned();
            $table->foreign('id_waktu')->references('id_waktu')->on('rwdetail')->onDelete('cascade');
            $table->bigInteger('id_ruang')->unsigned();
            $table->foreign('id_ruang')->references('id_ruang')->on('rwdetail')->onDelete('cascade');
            $table->bigInteger('id_proposalsempro')->unsigned();
            $table->foreign('id_proposalsempro')->references('id')->on('proposalsempro')->onDelete('cascade');
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
        Schema::dropIfExists('taskripsijadwal');
    }
}
