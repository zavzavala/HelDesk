<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class chamados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->OnDelete('cascade')->OnUpdate('cascade');
            $table->string('departamento');
            $table->string('status');
            $table->datetime('data');
            $table->string('nome');
            $table->string('tipo');
            $table->string('problema');
            $table->string('satisfacao')->nullable();
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
        Schema::dropIfExists('chamados');
    }
}
