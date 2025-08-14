<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
  protected $table = 'nivels';
  protected $fillable = ['nombre'];
    // Un Nivel puede tener muchos Grados
    public function grados()
    {
        return $this->hasMany(Grado::class);
    }
     public function matriculaciones()
    {
        return $this->hasMany(Matriculacion::class);
    }
}
