<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modulo extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    //Relaciones
    public function temas(){
        return $this->hasMany(Tema::class);
    }
}
