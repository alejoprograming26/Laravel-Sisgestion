<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class AdminController extends Controller
{

    public function index(){
         $total_gestiones = \App\Models\Gestion:: count();
         $total_periodos = \App\Models\Periodo:: count();
         $total_niveles = \App\Models\Nivel:: count();
         $total_grados = \App\Models\Grado:: count();
         $total_paralelos = \App\Models\Paralelo:: count();
         $total_turnos = \App\Models\Turno:: count();
         $total_materias = \App\Models\Materia:: count();
         $total_roles = Role:: count();
         $total_personal_admin = \App\Models\Personal::where('tipo', 'administrativo')-> count();
         $total_personal_docente = \App\Models\Personal::where('tipo', 'docente')-> count();
         $total_estudiantes = \App\Models\Estudiante:: count();
         $total_ppff = \App\Models\Ppff:: count();
        return view('admin.index', compact('total_gestiones', 'total_periodos', 'total_niveles', 'total_grados', 'total_paralelos', 'total_turnos',
         'total_materias', 'total_roles', 'total_personal_admin', 'total_personal_docente', 'total_estudiantes', 'total_ppff'));
    }
}
