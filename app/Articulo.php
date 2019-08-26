<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    protected $fillable =[
        'idcategoria','codigo','nombre','precio_venta','stock','descripcion','condicion'
    ];
    //un articulo pertenece a una categoria
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}
