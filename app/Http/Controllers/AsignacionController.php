<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Asignacion;
use App\Models\Personal;
use App\Models\Turno;
use App\Models\Gestion;
use App\Models\Nivel;
use App\Models\Materia;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaciones = Asignacion::with('personal', 'turno', 'gestion', 'nivel', 'grado', 'paralelo', 'materia')->get();
        return view('admin.asignaciones.index', compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $docentes = Personal::where('tipo', 'docente')->get();
        $turnos = Turno::all();
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $asignaciones = Asignacion::all();
        $materias = Materia::all();
        return view('admin.asignaciones.create', compact('docentes', 'turnos', 'gestiones', 'asignaciones', 'niveles', 'materias'));
    }

      public function buscar_docente($id)
    {
         $docente = Personal::with('usuario','formaciones')->find($id);
        if (!$docente) {

          return response()->json(['error' => 'Docente no encontrado'], 404);

        }
       $docente->foto_url= url($docente->foto);
       return response()->json($docente);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // $datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'personal_id' => 'required',
            'turno_id' => 'required',
            'gestion_id' => 'required',
            'nivel_id' => 'required',
            'grados_id' => 'required',
            'paralelos_id' => 'required',
            'fecha_asignacion' => 'required|date',
            'materia_id' => 'required',
        ]);
            $asignacion_duplicada = Asignacion::where('personal_id', $request->personal_id)
           ->where('turno_id', $request->turno_id)
           ->where('gestion_id', $request->gestion_id)
           ->where('nivel_id', $request->nivel_id)
           ->where('grado_id', $request->grados_id)
           ->where('paralelo_id', $request->paralelos_id)
           ->where('materia_id', $request->materia_id)
           ->exists();

       if ($asignacion_duplicada) {
           return redirect()->back()->with(['mensaje' => 'La Asignación ya existe',
           'icono' => 'error']);
       }
       $asignacion = new Asignacion();
       $asignacion->personal_id = $request->personal_id;
       $asignacion->turno_id = $request->turno_id;
       $asignacion->gestion_id = $request->gestion_id;
       $asignacion->nivel_id = $request->nivel_id;
       $asignacion->grado_id = $request->grados_id;
       $asignacion->paralelo_id = $request->paralelos_id;
       $asignacion->fecha_asignacion = $request->fecha_asignacion;
       $asignacion->materia_id = $request->materia_id;
       $asignacion->save();

       return redirect()->route('admin.asignaciones.index')
       ->with(['mensaje' => 'La Asignación se ha creado correctamente',
       'icono' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignacion $asignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignacion $asignacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asignacion $asignacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignacion $asignacion)
    {
        //
    }
}
