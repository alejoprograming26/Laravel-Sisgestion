<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Matriculacion;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Turno;
use App\Models\Gestion;
use App\Models\Nivel;
use App\Models\Grado;
use App\Models\Paralelo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Facade;

class MatriculacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculaciones = Matriculacion::with('estudiante', 'turno', 'gestion', 'nivel', 'grado', 'paralelo')->get();
        return view('admin.matriculaciones.index', compact('matriculaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $estudiantes = Estudiante::all();
        $turnos = Turno::all();
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $grados = Grado::all();
        $paralelos = Paralelo::all();
        return view('admin.matriculaciones.create', compact('estudiantes', 'turnos', 'gestiones', 'niveles', 'grados', 'paralelos'));
    }
    public function buscar_estudiante($id)
    {
        $estudiante = Estudiante::with('usuario','matriculaciones.turno', 'matriculaciones.gestion', 'matriculaciones.nivel', 'matriculaciones.grado','matriculaciones.paralelo')->find($id);
        if (!$estudiante) {

          return response()->json(['error' => 'Estudiante no encontrado'], 404);

        }
        $estudiante->foto_url= url($estudiante->foto);
        return response()->json($estudiante);
    }

    public function buscar_grados($id)
    {
        $grados = Grado::where('nivel_id', $id)->pluck('nombre', 'id');
        if (!$grados) {
            return response()->json(['error' => 'Grado no encontrado'], 404);
        }
        return response()->json($grados);
    }
      public function buscar_paralelos($id)
    {
        $paralelos = Paralelo::where('grado_id', $id)->pluck('nombre', 'id');
        if (!$paralelos) {
            return response()->json(['error' => 'Paralelo no encontrado'], 404);
        }
        return response()->json($paralelos);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //$datos = request()->all();
      //return response()->json($datos);
       $request->validate([
           'estudiante_id' => 'required|exists:estudiantes,id',
           'turno_id' => 'required|exists:turnos,id',
           'gestion_id' => 'required|exists:gestions,id',
           'nivel_id' => 'required|exists:nivels,id',
           'grados_id' => 'required|exists:grados,id',
           'paralelos_id' => 'required|exists:paralelos,id',
           'fecha_matriculacion' => 'required|date'
       ]);
       // validacion para no tener duplicados
       $matriculacionExistente = Matriculacion::where('estudiante_id', $request->estudiante_id)
           ->where('turno_id', $request->turno_id)
           ->where('gestion_id', $request->gestion_id)
           ->where('nivel_id', $request->nivel_id)
           ->where('grado_id', $request->grados_id)
           ->where('paralelo_id', $request->paralelos_id)
           ->exists();

       if ($matriculacionExistente) {
           return redirect()->back()->with(['mensaje' => 'La matriculación ya existe',
           'icono' => 'error']);
       }

       $matriculacion = new Matriculacion();
       $matriculacion->estudiante_id = $request->estudiante_id;
       $matriculacion->turno_id = $request->turno_id;
       $matriculacion->gestion_id = $request->gestion_id;
       $matriculacion->nivel_id = $request->nivel_id;
       $matriculacion->grado_id = $request->grados_id;
       $matriculacion->paralelo_id = $request->paralelos_id;
       $matriculacion->fecha_matriculacion = $request->fecha_matriculacion;
       $matriculacion->save();
         return redirect()->route('admin.matriculaciones.index')
              ->with('mensaje', 'Matriculación creada exitosamente.')
              ->with('icono', 'success');

    }
      public function pdf_matricula($id)
    {
        $configuracion = Configuracion::first();
        $matriculacion = Matriculacion::with('estudiante.usuario','turno', 'gestion', 'nivel', 'grado', 'paralelo')->find($id);
        $pdf = PDF::loadView('admin.matriculaciones.pdf', compact('configuracion', 'matriculacion'));
        $pdf->setPaper('letter', 'protrait');
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->setOptions(['isHtml5ParserEnabled' => true]);
        $pdf->setOptions(['isRemoteEnabled' => true]);
        return $pdf->stream('matricula_' . $id . '.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)

    {
        $matriculacion = Matriculacion::with('estudiante.ppff','estudiante.matriculaciones','turno', 'gestion', 'nivel', 'grado', 'paralelo')->find($id);
        return view('admin.matriculaciones.show', compact('matriculacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $matriculacion = Matriculacion::with('estudiante.ppff','estudiante.matriculaciones','turno', 'gestion', 'nivel', 'grado', 'paralelo')->find($id);
        $estudiantes = Estudiante::all();
        $turnos = Turno::all();
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $grados = Grado::where('nivel_id', $matriculacion->nivel_id)->get();
        $paralelos = Paralelo::where('grado_id', $matriculacion->grado_id)->get();

        return view('admin.matriculaciones.edit', compact('matriculacion', 'estudiantes', 'turnos', 'gestiones', 'niveles', 'grados', 'paralelos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //$datos = $request->all();
        //return response()->json($datos);
         $matriculacion = Matriculacion::find($id);
          $request->validate([
           'estudiante_id' => 'required|exists:estudiantes,id',
           'turno_id' => 'required|exists:turnos,id',
           'gestion_id' => 'required|exists:gestions,id',
           'nivel_id' => 'required|exists:nivels,id',
           'grados_id' => 'required|exists:grados,id',
           'paralelos_id' => 'required|exists:paralelos,id',
           'fecha_matriculacion' => 'required|date'
       ]);
       // validacion para no tener duplicados
       $matriculacionExistente = Matriculacion::where('estudiante_id', $request->estudiante_id)
           ->where('turno_id', $request->turno_id)
           ->where('gestion_id', $request->gestion_id)
           ->where('nivel_id', $request->nivel_id)
           ->where('grado_id', $request->grados_id)
           ->where('paralelo_id', $request->paralelos_id)
           ->where('id', '!=', $id) // Excluir la matriculación actual
           ->exists();

       if ($matriculacionExistente) {
           return redirect()->back()->with(['mensaje' => 'La matriculación ya existe',
           'icono' => 'error']);
       }


       $matriculacion->estudiante_id = $request->estudiante_id;
       $matriculacion->turno_id = $request->turno_id;
       $matriculacion->gestion_id = $request->gestion_id;
       $matriculacion->nivel_id = $request->nivel_id;
       $matriculacion->grado_id = $request->grados_id;
       $matriculacion->paralelo_id = $request->paralelos_id;
       $matriculacion->fecha_matriculacion = $request->fecha_matriculacion;
       $matriculacion->save();

         return redirect()->route('admin.matriculaciones.index')
              ->with('mensaje', 'Matriculacion Actualizada exitosamente.')
              ->with('icono', 'success');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $matriculacion = Matriculacion::find($id);
        $matriculacion->delete();
        return redirect()->route('admin.matriculaciones.index')
            ->with('mensaje', 'Matricula eliminada exitosamente.')
            ->with('icono', 'info');
    }
}
