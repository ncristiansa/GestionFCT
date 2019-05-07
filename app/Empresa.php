<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $fillable = ['Empresa', 'NIF', 'Topologia', 'Perfil', 'Idiomas', 'Horario', 'Seguimiento'];
}
