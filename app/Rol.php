<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $fillable = ['nombre','descripcion','condicion'];
    public $timestamps = false;

    //users porque un rol puede tener varios usuarios
    public function users(){
        return $this->hasMany('App\User');
    }
}
