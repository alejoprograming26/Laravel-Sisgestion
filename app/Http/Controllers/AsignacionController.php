<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Asignacion;
use App\Models\Personal;
use App\Models\Turno;
use App\Models\Gestion;
use App\Models\Nivel;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaciones = Asignacion::all();
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
        return view('admin.asignaciones.create', compact('docentes', 'turnos', 'gestiones', 'asignaciones', 'niveles'));
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
        //
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
