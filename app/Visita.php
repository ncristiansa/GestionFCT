<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    public $timestamps = false;
    protected $table = 'visitas';
    protected $fillable = ['id','Fecha', 'Comentario', 'Realizado', 'Tipo', 'acuerdo_id'];
}
