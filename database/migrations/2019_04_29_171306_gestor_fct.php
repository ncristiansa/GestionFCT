<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GestorFct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Nombre');
            $table->String('Clave');
        });
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Nombre');
            $table->String('NIF');
            $table->String('Topologia');
            $table->String('Perfil');
            $table->String('Idiomas');
            $table->String('Horario');
            $table->String('Seguimiento');
        });
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Tipo');
            $table->integer("empresa_id")->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresa');
        });
        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Nom');
            $table->String('DNI');
            $table->String('Num_CAP');
            $table->string('Email');
            $table->string('Telefono');
        });
        Schema::create('tutor', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Nombre');
            $table->String('Email');
            $table->String('Telefono');
        });
        Schema::create('acuerdo', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Fecha_alta');
            $table->date('Acabada');
            $table->date('Fin');
        });
        Schema::create('seguimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Descripcion');
            $table->integer('acuerdo_id')->unsigned();
            $table->foreign('acuerdo_id')->references('id')->on('acuerdo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('empresa');
        Schema::dropIfExists('persona');
        Schema::dropIfExists('alumno');
        Schema::dropIfExists('tutor');
        Schema::dropIfExists('acuerdo');
        Schema::dropIfExists('seguimiento');
    }
}
