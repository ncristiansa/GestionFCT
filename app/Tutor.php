<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    public $timestamps = false;
    protected $table = 'tutor';
    protected $fillable = ['id','Nombre', 'Email','Telefono'];
}
