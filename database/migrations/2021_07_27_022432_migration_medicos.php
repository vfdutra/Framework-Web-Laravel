<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationMedicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $tabela) {
            $tabela->increments('id');
            $tabela->string('nome');
            $tabela->string('cpf');
            $tabela->string('email');
            $tabela->string('telefone');
            $tabela->integer('crm');
            $tabela->string('especialidade');
            $tabela->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}