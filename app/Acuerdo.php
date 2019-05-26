<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acuerdo extends Model
{
    public $timestamps = false;
    protected $table = 'acuerdo';
    protected $fillable = ['id','Fecha_alta', 'Acabada', 'Fin', 'empresa_id', 'alumno_id'];
}
