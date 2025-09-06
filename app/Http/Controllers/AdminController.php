<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Models\Pago;

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
         $total_pagos = \App\Models\Pago::count();
         $total_matriculas = \App\Models\Matriculacion::count();

        $gestiones = \App\Models\Gestion::all();

         $matriculas_gestiones = \App\Models\Matriculacion::select(DB::raw('count(*) as total'), 'gestion_id')->groupBy('gestion_id')->get();

        $gestionesArray= $gestiones->pluck('nombre')->toArray();
        $datosMatriculados = $matriculas_gestiones->pluck('total')->toArray();


        // Obtener los pagos por mes y año
 $pagos = Pago::selectRaw("YEAR(fecha_pago) as year, MONTH(fecha_pago) as month, SUM(monto) as total_pago")
            ->groupBy(DB::raw("YEAR(fecha_pago), MONTH(fecha_pago)"))
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();


// Array con los nombres de los meses en español
$mesesEnEspañol = [
    "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
    "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
];

$meses = [];
$montos = [];

// Iterar sobre los pagos y mostrar los montos
foreach ($pagos as $pago) {
    $meses[] = $mesesEnEspañol[$pago['month'] - 1];
    $montos[] = $pago->total_pago;
}


        return view('admin.index', compact('total_gestiones', 'total_periodos', 'total_niveles', 'total_grados', 'total_paralelos', 'total_turnos',
         'total_materias', 'total_roles', 'total_personal_admin', 'total_personal_docente', 'total_estudiantes', 'total_ppff', 'total_pagos', 'total_matriculas', 'gestionesArray', 'datosMatriculados', 'meses', 'montos'));
    }
}
