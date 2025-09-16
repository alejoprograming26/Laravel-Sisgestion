<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use Illuminate\Http\Request;
use App\Models\Asistencia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Personal;
use App\Models\Asignacion;
use App\Models\Matriculacion;
use App\Models\Periodo;
use App\Models\DetalleAsistencia;
use App\Models\DetalleCalificacion;
use App\Models\Estudiante;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

// Métodos útiles de las librerías usadas:
// Collection: get(), pluck(), sortBy(), flatMap(), unique(), filter(), map(), first(), where(), count(), each(), toArray(), all()
// Request: all(), validate(), input(), has(), only(), except()
// Eloquent Model: find(), findOrFail(), where(), get(), create(), save(), delete(), with(), orderBy(), first()
// Auth: user()
// Carbon: now(), parse(), format(), addDay(), subDay()
// Otros: redirect()->back(), view(), compact()

// Nota: El método correcto es flatMap, no flapMap.


class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
             $rol = Auth::user()->roles->pluck('name')->implode(', ');
          $id_usuario = Auth::user()->id;

        if (($rol === 'ADMINISTRADOR/A')||($rol === 'DIRECTOR/A') ||($rol === 'SECRETARIO/A') ||($rol === 'ENCARGADO/A ACADEMICO')) {
           // $asignaciones = Asignacion::get();
            //return view('admin.asistencias.index', compact('asignaciones'));

         }
         if($rol === 'DOCENTE') {
           $docente = Personal::where('usuario_id', $id_usuario)->first();
           $asignaciones = Asignacion::where('personal_id', $docente->id)->get();
            return view('admin.calificaciones.index_docente', compact('docente', 'asignaciones'));
        }
       /* if ($rol === 'ESTUDIANTE') {
            $estudiante = Estudiante::where('usuario_id', $id_usuario)->first();
            $matriculas = Matriculacion::where('estudiante_id', $estudiante->id)->get();
            $asignaciones = collect();
            foreach ($matriculas as $matricula) {
              $datos = Asignacion::with('personal', 'materia')
                    ->where('turno_id', $matricula->turno_id)
                    ->where('gestion_id', $matricula->gestion_id)
                    ->where('nivel_id', $matricula->nivel_id)
                    ->where('grado_id', $matricula->grado_id)
                    ->where('paralelo_id', $matricula->paralelo_id)
                    ->get();

              $asignaciones = $asignaciones->merge($datos);
            }

            return view('admin.asistencias.index_estudiante', compact('estudiante', 'matriculas', 'asignaciones'));
        }*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $asignacion = Asignacion::find($id);
        $docente = Personal::where('usuario_id',  Auth::user()->id)->first(); //
        $periodos = Periodo::where('gestion_id', $asignacion->gestion_id)
        ->orderBy('id')
        ->get();
        $matriculados = Matriculacion::with('estudiante')->where('turno_id', $asignacion->turno_id)
       ->where('gestion_id', $asignacion->gestion_id)
       ->where('nivel_id', $asignacion->nivel_id)
       ->where('grado_id', $asignacion->grado_id)
       ->where('paralelo_id', $asignacion->paralelo_id)
       ->get()
       ->sortBy('estudiante.apellidos');

       $calificaciones = Calificacion::with('detalleCalificaciones')->where('asignacion_id', $asignacion->id)->get();

        return view('admin.calificaciones.create', compact('asignacion', 'docente', 'periodos','matriculados', 'calificaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // $datos =request()->all();
        //return response()->json($datos);
        $request->validate([
            'asignacion_id' => 'required|exists:asignacions,id',
            'periodo_id' => 'required|exists:periodos,id',
            'tipo' => 'required|string|max:50',
            'fecha' => 'required|date',
            'descripcion' => 'nullable|string|max:255',
            'nota' => 'required',
        ]);
        $calificacion = new Calificacion();
        $calificacion->asignacion_id = $request->asignacion_id;
        $calificacion->periodo_id = $request->periodo_id;
        $calificacion->tipo = $request->tipo;
        $calificacion->fecha = $request->fecha;
        $calificacion->descripcion = $request->descripcion;
        $calificacion->save();

        foreach ($request->nota as $estudiante_id => $nota) {
           DetalleCalificacion::create([
                'calificacion_id' => $calificacion->id,
                'estudiante_id' => $estudiante_id,
                'nota' => $nota,
            ]);
        }
        return redirect()->back()
        ->with('mensaje', 'Calificación registrada exitosamente.')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Calificacion $calificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calificacion $calificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       // $datos =request()->all();
        //return response()->json($datos);
        
         $request->validate([
            'asignacion_id' => 'required|exists:asignacions,id',
            'periodo_id' => 'required|exists:periodos,id',
            'tipo' => 'required|string|max:50',
            'fecha' => 'required|date',
            'descripcion' => 'nullable|string|max:255',
            'nota' => 'required',
        ]);
        $calificacion = Calificacion::find($id);
        $calificacion->asignacion_id = $request->asignacion_id;
        $calificacion->periodo_id = $request->periodo_id;
        $calificacion->tipo = $request->tipo;
        $calificacion->fecha = $request->fecha;
        $calificacion->descripcion = $request->descripcion;
        $calificacion->save();

          foreach ($request->nota as $estudiante_id => $nota) {
           DetalleCalificacion::updateOrCreate([
                'calificacion_id' => $calificacion->id,
                'estudiante_id' => $estudiante_id,
            ], [
                'nota' => $nota,
            ]);
        }
        return redirect()->back()
        ->with('mensaje', 'Calificación Actualizada exitosamente.')
        ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $calificacion = Calificacion::find($id);
        $calificacion->delete();
        return redirect()->back()
        ->with('mensaje', 'Calificación Eliminada exitosamente.')
        ->with('icono', 'info');
    }
}
