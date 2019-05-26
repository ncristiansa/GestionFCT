<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcuerdoTutor extends Model
{
    public $timestamps = false;
    protected $table = 'acuerdo_tutor';
    protected $fillable = ['id', 'tutor_id', 'acuerdo_id'];
}
