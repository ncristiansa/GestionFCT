<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public $timestamps = false;
    protected $table = 'empresa';
    protected $fillable = ['id','Empresa', 'NIF', 'Tipologia', 'Perfil', 'Idiomas', 'Horario', 'Seguimiento'];
}
