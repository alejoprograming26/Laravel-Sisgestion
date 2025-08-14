<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grados';
    protected $fillable = [
    'nombre',
    'nivel_id'
];
// Un Grado pertenece a un Nivel muchos a uno
    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }
// Un grado puede tener muchos paralelos
    public function paralelos()
    {
        return $this->hasMany(Paralelo::class);
    }
     public function matriculaciones()
    {
        return $this->hasMany(Matriculacion::class);
    }
}
