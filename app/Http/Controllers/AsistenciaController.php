<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $rol = Auth::user()->roles->pluck('name')->implode(', ');
        echo $id_usuario = Auth::user()->id;
        if (($rol === 'ADMINISTRADOR/A')||($rol === 'DIRECTOR/A') ||($rol === 'SECRETARIO/A') ||($rol === 'ENCARGADO/A ACADEMICO')) {
            return view('admin.asistencias.index');

         }
         if($rol === 'DOCENTE') {

            //return view('admin.asistencias.index_docente', compact('docente'));
        }
        if ($rol === 'ESTUDIANTE') {
            return view('admin.asistencias.index_estudiante');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Asistencia $asistencia)
    {
        //
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
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }
}
