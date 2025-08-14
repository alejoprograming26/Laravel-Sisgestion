<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paralelo extends Model
{
   protected $table = 'paralelos';
   protected $fillable = [
      'nombre',
      'grado_id',
   ];
   //Un paralelo pertene a un Grado muchos a uno
   public function grado()
   {
      return $this->belongsTo(Grado::class);
   }
    public function matriculaciones()
    {
        return $this->hasMany(Matriculacion::class);
    }
}
