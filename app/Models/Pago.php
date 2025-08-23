<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    // Un pago pertence a una matricula
   public function matriculacion()
   {
       return $this->belongsTo(Matriculacion::class);
   }
}
