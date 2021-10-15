<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->integer('id_chamado');
            $table->integer('id_admin');
            $table->string('departamento');
            $table->string('status');
            $table->string('tecnico');
            $table->datetime('data_chamado');
            $table->datetime('data_resolucao');
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
        Schema::dropIfExists('historico__models');
    }
}
