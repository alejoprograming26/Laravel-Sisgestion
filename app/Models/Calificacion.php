<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $fillable = [
        'asignacion_id',
        'periodo_id',
        'tipo',
        'descripcion',
        'fecha',

    ];

    //De una a una
    public function asignacion()
    {
        return $this->belongsTo(Asignacion::class);
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
    public function detallecalificaciones()
    {
        return $this->hasMany(DetalleCalificacion::class);
    }

}
