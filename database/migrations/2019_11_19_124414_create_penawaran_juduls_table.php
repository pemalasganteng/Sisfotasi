<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenawaranJudulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawaran_juduls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('penjelasan');
            $table->string('status_tampil');
            $table->bigInteger('id_prodi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penawaran_juduls');
    }
}
