<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBimbinganTable extends Migration
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
        Schema::create('bimbingan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('ket_revisi');
            $table->date('tanggal_acc');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_dosen')->unsigned();
            $table->foreign('id_dosen')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('bimbingan');

        
    }
}
