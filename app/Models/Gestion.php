<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    protected $table = 'gestions';

    protected $fillable = [
        'nombre',
    ];
    //Una gestion tiene muchos periodos
    public function periodos()
    {
        return $this->hasMany(Periodo::class);
    }
     public function matriculaciones()
    {
        return $this->hasMany(Matriculacion::class);
    }
      public function asignaciones(){
    return $this->hasMany(Asignacion::class);
   }

}
