<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personals';
    protected $fillable = [
        'usuario_id',
        'nombres',
        'apellidos',
        'cedula',
        'fecha_nacimiento',
        'direccion',
        'telefono',
        'profesion',
        'foto',

    ];
 // Relacion con un Usuario
   public function usuario(){
    return $this->belongsTo(User::class);
   }
// Relacion con muchas Formaciones
   public function formaciones(){
    return $this->hasMany(Formacion::class);
   }
   public function asignaciones(){
    return $this->hasMany(Asignacion::class);
   }
}
