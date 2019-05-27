<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    public $timestamps = false;
    protected $table = 'seguimiento';
    protected $fillable = ['Descripcion','acuerdo_id'];
}
