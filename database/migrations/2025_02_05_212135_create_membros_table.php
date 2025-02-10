<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('apelido');
            $table->date('data_nascimento');
            $table->string('local_nascimento');
            $table->enum('sexo', ['Masculino', 'Feminino', 'Outro']);
            $table->enum('estado_civil', ['Solteiro', 'Casado', 'Divorciado', 'Viúvo']);
            $table->string('profissao');
            $table->string('habilitacoes_literarias')->nullable();
            $table->string('documento_identificacao');
            $table->date('data_emissao_documento');
            $table->string('domicilio');
            $table->string('classificacao_social')->nullable();
            $table->string('cartao_eleitor');
            $table->string('carta_conducao')->nullable();
            $table->string('nuit');
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
        Schema::dropIfExists('membros');
    }
}
