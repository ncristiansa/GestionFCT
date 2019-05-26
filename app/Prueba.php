<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    protected $table = 'empresa';
    protected $fillable = ['Nombre', 'NIF', 'Topologia', 'Perfil', 'Idiomas', 'Horario', 'Seguimiento'];
}
