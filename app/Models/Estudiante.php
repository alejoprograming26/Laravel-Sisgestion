<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    // Un estudiante pertenece a un ppff
    public function ppff()
    {
        return $this->belongsTo(Ppff::class);
    }
    // Un estudiante pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
    // Un estudiante puede tener muchas matriculaciones
    public function matriculaciones()
    {
        return $this->hasMany(Matriculacion::class);
    }
}
