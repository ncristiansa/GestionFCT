<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public $timestamps = false;
    protected $table = 'alumno';
    protected $fillable = ['id','Nom', 'DNI', 'Num_CAP', 'Email', 'Telefono'];
}
