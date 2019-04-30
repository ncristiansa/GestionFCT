<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['Nombre', 'Clave', 'updated_at', 'created_at'];
    public function roles(){
        return $this
        ->belongsToMany('App\Role')
        ->withTimestamps();
    }
}

