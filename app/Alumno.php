<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public $timestamps = false;
    protected $table = 'alumno';
    protected $fillable = ['id','Nombre', 'DNI', 'NASS', 'Email', 'Telefono'];
}
