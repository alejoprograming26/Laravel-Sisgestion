<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodos';

    protected $fillable = [
        'nombre',
        'gestion_id',
    ];
    // Un periodo pertenece a una gestion
    public function gestion()
    {
        return $this->belongsTo(Gestion::class);
    }
}
