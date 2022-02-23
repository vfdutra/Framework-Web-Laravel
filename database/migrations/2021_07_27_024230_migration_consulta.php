<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationConsulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta', function (Blueprint $tabela) {
            $tabela->increments('id');

            $tabela->unsignedInteger('paciente_id');
            $tabela->foreign('pacientes_id')->references('id')->on('pacientes');

            $tabela->unsignedInteger('medico_id');
            $tabela->foreign('medicos_id')->references('id')->on('medicos');

            $tabela->date('dt_consulta');
            $tabela->time('hr_consulta');
            $tabela->string('convenio');
            $tabela->float('valor');
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
        Schema::dropIfExists('consulta');
    }
}