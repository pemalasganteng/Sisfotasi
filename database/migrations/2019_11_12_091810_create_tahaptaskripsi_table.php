<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTahaptaskripsiTable extends Migration
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
        Schema::create('tahaptaskripsi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status_pengajuansempro',50);
            $table->string('status_jadwalsempro',50);
            $table->string('status_revisisempro',50);
            $table->string('status_penilitian',50);
            $table->string('status_pendaftaranujian',50);
            $table->string('status_ujianjadwal',50);
            $table->string('status_revisita',50);
            $table->string('status_laporanfileselesai');
            $table->bigInteger('id_proposalsempro')->unsigned();
            $table->foreign('id_proposalsempro')->references('id')->on('proposalsempro')->onDelete('cascade');
            $table->bigInteger('id_semprojadwal')->unsigned();
            $table->foreign('id_semprojadwal')->references('id')->on('semprojadwal')->onDelete('cascade');
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
        Schema::dropIfExists('tahaptaskripsi');
    }
}
