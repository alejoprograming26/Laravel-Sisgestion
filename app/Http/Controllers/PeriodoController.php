<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Logic to retrieve and display the list of periods
      $gestiones = \App\Models\Gestion::with('periodos')
      ->orderby('nombre', 'asc')
      ->get(); // Assuming you want to pass all gestiones to the view
      return view('admin.periodos.index', compact( 'gestiones'));
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
        $request->validate([
            'gestion_id_create' => 'required|exists:gestions,id',
            'nombre_create' => 'required|max:255|:periodos,nombre',
        ]);

        $periodo = new Periodo();
        $periodo->nombre = $request->nombre_create;
        $periodo->gestion_id = $request->gestion_id_create;
        $periodo->save();

        return redirect()->route('admin.periodos.index')
            ->with('mensaje', 'Periodo Creado exitosamente.')
            ->with('icono', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periodo $periodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $validate = Validator::make($request->all(), [
           'gestion_id' => 'required|exists:gestions,id',
           'nombre' => 'required|max:255|:periodos,nombre,' ,
       ]);

       if ($validate->fails()) {
           return redirect()
               ->back()
               ->withErrors($validate)
               ->withInput()
               ->with('modal_id', $id);
       }

       $periodo = Periodo::find($id);
       $periodo->nombre = $request->nombre;
       $periodo->gestion_id = $request->gestion_id;
       $periodo->save();

       return redirect()->route('admin.periodos.index')
           ->with('mensaje', 'Periodo actualizado exitosamente.')
           ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $periodo = Periodo::find($id);
        $periodo->delete();

        return redirect()->route('admin.periodos.index')
            ->with('mensaje', 'Periodo eliminado exitosamente.')
            ->with('icono', 'info');
    }
}
