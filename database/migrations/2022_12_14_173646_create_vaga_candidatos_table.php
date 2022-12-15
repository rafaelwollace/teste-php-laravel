<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaga_candidatos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_vagas')->unsigned();
            $table->unsignedBigInteger('fk_users')->unsigned();
            $table->foreign('fk_vagas')->references('id')->on('vagas');
            $table->foreign('fk_users')->references('id')->on('users');
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
        Schema::dropIfExists('vaga_candidatos');
    }
};
