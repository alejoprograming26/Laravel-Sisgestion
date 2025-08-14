<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    protected $table = 'formacions';
    protected $fillable = [
        'personal_id',
        'titulo',
        'institucion',
        'nivel',
        'fecha_graduacion',
        'archivo'

    ];
    //Una formacion pertenece a un personal
    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }
}

