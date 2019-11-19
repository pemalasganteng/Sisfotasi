<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBimbinganDetailTable extends Migration
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
        Schema::create('bimbingan_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_bimbingan')->unsigned();
            $table->foreign('id_bimbingan')->references('id')->on('bimbingan')->onDelete('cascade');
            $table->string('bimbinganke');
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
        Schema::dropIfExists('bimbingan_detail');
    }
}
