<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResolveChamadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolve_chamados', function (Blueprint $table) {
            $table->id();
            $table->integer('id_Rchamados');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->OnDelete('cascade')->OnUpdate('cascade');
            $table->integer('userID');
            $table->string('userName');
            $table->string('departamento');
            $table->string('status');
            $table->datetime('data');
           // $table->datetime('data_resolucao');
            $table->string('nome');
            $table->string('tipo');
            $table->string('problema');
            $table->string('observacao')->nullable();
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
        Schema::dropIfExists('resolve_chamados');
    }
}
