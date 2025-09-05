<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Personal;
use App\Models\Asignacion;
use App\Models\Matriculacion;
use App\Models\DetalleAsistencia;
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

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $rol = Auth::user()->roles->pluck('name')->implode(', ');
          $id_usuario = Auth::user()->id;
        if (($rol === 'ADMINISTRADOR/A')||($rol === 'DIRECTOR/A') ||($rol === 'SECRETARIO/A') ||($rol === 'ENCARGADO/A ACADEMICO')) {
            $asignaciones = Asignacion::get();
            return view('admin.asistencias.index', compact('asignaciones'));

         }
         if($rol === 'DOCENTE') {
           $docente = Personal::where('usuario_id', $id_usuario)->first();
           $asignaciones = Asignacion::where('personal_id', $docente->id)->get();
            return view('admin.asistencias.index_docente', compact('docente', 'asignaciones'));
        }
        if ($rol === 'ESTUDIANTE') {
            return view('admin.asistencias.index_estudiante');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $asignacion = Asignacion::findOrFail($id);
        $docente = Personal::where('id', $asignacion->personal_id)->first();
        $asistencias = Asistencia::with('detallesAsistencia')->where('asignacion_id', $asignacion->id)->get();
        $matriculados = Matriculacion::with('estudiante')->where('turno_id', $asignacion->turno_id)
       ->where('gestion_id', $asignacion->gestion_id)
       ->where('nivel_id', $asignacion->nivel_id)
       ->where('grado_id', $asignacion->grado_id)
       ->where('paralelo_id', $asignacion->paralelo_id)
       ->get()
       ->sortBy('estudiante.apellidos');
        return view('admin.asistencias.create', compact('asignacion', 'docente', 'asistencias', 'matriculados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //$datos =request ()->all();
       //return response()->json($datos);
       $request ->validate([
           'asignacion_id' => 'required',
           'fecha' => 'required|date|unique:asistencias,fecha',
           'observacion' => 'nullable|string|max:255',
           'estado_asistencia' => 'required',
       ]);
       $asistencia = new Asistencia();
       $asistencia->asignacion_id = $request->asignacion_id;
       $asistencia->fecha = $request->fecha;
       $asistencia->observacion = $request->observacion;
       $asistencia->save();

       $estado_asistencia = $request->estado_asistencia;

       foreach ($estado_asistencia as $estudiante_id => $estado) {
           DetalleAsistencia::create([
               'asistencia_id' => $asistencia->id,
               'estudiante_id' => $estudiante_id,
               'estado_asistencia' => $estado,
           ]);
       }

       return redirect()->back()
       ->with(['mensaje' => 'Asistencia creada con éxito',
       'icono' => 'success']);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
      $asignacion = Asignacion::findOrFail($id);
      $asistencias = Asistencia::with('detallesAsistencia')->where('asignacion_id', $id)
      ->orderBy('fecha', 'desc')->get();

      $estudiante_ids = $asistencias->flatMap(function ($asistencia) {
          return $asistencia->detallesAsistencia->pluck('estudiante_id')->filter();
      })->unique()->toArray();

      $estudiantes = \App\Models\Estudiante::whereIn('id', $estudiante_ids)
          ->orderBy('apellidos')
          ->get();

      $fechas = $asistencias->pluck('fecha')->unique()->sort();

      return view('admin.asistencias.show', compact('asignacion', 'asistencias', 'estudiantes', 'fechas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = $request->all();
       //return response()->json($datos);
        $request ->validate([
           'asignacion_id' => 'required',
           'fecha' => 'required|date',
           'observacion' => 'nullable|string|max:255',
           'estado_asistencia' => 'required',
       ]);
       $asistencia = Asistencia::find($id);
       $asistencia->asignacion_id = $request->asignacion_id;
       $asistencia->fecha = $request->fecha;
       $asistencia->observacion = $request->observacion;
       $asistencia->save();

       $estado_asistencia = $request->estado_asistencia;

       foreach ($estado_asistencia as $estudiante_id => $estado) {
           DetalleAsistencia::where('asistencia_id', $asistencia->id)
               ->where('estudiante_id', $estudiante_id)
               ->update(['estado_asistencia' => $estado]);
       }
       return redirect()->back()
       ->with(['mensaje' => 'Asistencia actualizada con éxito',
       'icono' => 'success']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->detallesAsistencia()->delete();
        $asistencia->delete();
        return redirect()->back()
            ->with(['mensaje' => 'Asistencia eliminada con éxito',
            'icono' => 'warning']);
    }
}
