<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Festivo extends Model
{
    public $timestamps = false;
    protected $table = 'festivos';
    protected $fillable = ['Fecha','Descripción', 'Tipo'];
}
