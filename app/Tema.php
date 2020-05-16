<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tema extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    //Relaciones
    public function modulo(){
        return $this->belongsTo(Modulo::class, 'modulo_id');
    }

    public function palabras(){
        return $this->hasMany(Palabra::class);
    }


    //Metodos
}
