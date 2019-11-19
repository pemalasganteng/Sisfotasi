<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateProposalsemproTable extends Migration
{
    public function __construct(){
        Schema::disableForeignKeyConstraints();
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposalsempro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul','150');
            $table->text('abstrak','500');
            $table->string('file');
            $table->string('file2')->nullable();
            $table->string('status');
            $table->bigInteger('id_dosen')->unsigned();
            $table->foreign('id_dosen')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_periode')->unsigned();
            $table->foreign('id_periode')->references('id')->on('periode')->onDelete('cascade');
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
        Schema::dropIfExists('proposalsempro');
    }
}
