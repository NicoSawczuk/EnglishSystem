<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Palabra extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    //Relaciones
    public function tema(){
        return $this->belongsTo(Tema::class, 'tema_id');
    }


    //Metodos
}
