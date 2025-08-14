<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ppff extends Model
{
    // Un padre puede tener muchos estudiantes
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }
}
