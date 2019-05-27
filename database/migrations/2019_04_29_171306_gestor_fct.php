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
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Empresa');
            $table->String('NIF');
            $table->String('Tipologia');
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
            $table->String('Nombre');
            $table->String('DNI');
            $table->String('NASS');
            $table->string('Email');
            $table->string('Telefono');
        });
        Schema::create('acuerdo', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Fecha_alta');
            $table->date('Acabada');
            $table->date('Fin');
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresa');
            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumno');
        });
        Schema::create('visitas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Fecha');
            $table->string("Comentario");
            $table->string("Realizado");
            $table->string("Tipo");
            $table->integer('acuerdo_id')->unsigned();
            $table->foreign('acuerdo_id')->references('id')->on('acuerdo');
        });
        Schema::create('tutor', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Nombre');
            $table->String('DNI');
            $table->String('Email');
            $table->String('Telefono');
        });
        Schema::create('acuerdo_tutor', function(Blueprint $table){
            $table->increments('id');
            $table->integer('tutor_id')->unsigned();
            $table->foreign('tutor_id')->references('id')->on('tutor');
            $table->integer('acuerdo_id')->unsigned();
            $table->foreign('acuerdo_id')->references('id')->on('acuerdo');
            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumno');
        });
        Schema::create('seguimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Descripcion');
            $table->integer('acuerdo_id')->unsigned();
            $table->foreign('acuerdo_id')->references('id')->on('acuerdo');
        });
        Schema::create('festivos', function (Blueprint $table){
            $table->date("Fecha");
            $table->String("Descripcion");
            $table->String("Tipo");
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
        Schema::dropIfExists('acuerdo_tutor');
        Schema::dropIfExists('festivos');
    }
}
