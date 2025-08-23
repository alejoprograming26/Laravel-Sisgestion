<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Estudiante;
use App\Models\Matriculacion;
use App\Models\Configuracion;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Facade;


use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::all();
        $estudiantes = Estudiante::all();
        return view('admin.pagos.index', compact('pagos', 'estudiantes'));
    }
    public function ver_pagos($id)
    {
       $estudiante = Estudiante::find($id);
       $matriculas = Matriculacion::with('pagos')->where('estudiante_id', $id)->get();
       return view('admin.pagos.ver_pagos', compact('estudiante', 'matriculas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
     public function comprobante($id)
    {
        $pago = Pago::find($id);
        $configuracion = Configuracion::first();
        $matricula = Matriculacion::with('estudiante.ppff','turno', 'gestion', 'nivel', 'grado', 'paralelo')->find($pago->matriculacion_id);

        $pdf = PDF::loadView('admin.pagos.comprobante', compact('configuracion', 'pago', 'matricula'));
        $pdf->setPaper('letter', 'protrait');
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->setOptions(['isHtml5ParserEnabled' => true]);
        $pdf->setOptions(['isRemoteEnabled' => true]);
        return $pdf->stream('pago.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = request()->all();
       //  return response()->json($datos);
       $request->validate([
            'matriculacion_id' => 'required',
            'monto' => 'required',
            'metodo_pago' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'fecha_pago' => 'required|date',
        ]);
        $pago = new Pago();
        $pago->matriculacion_id = $request->matriculacion_id;
        $pago->monto = $request->monto;
        $pago->metodo_pago = $request->metodo_pago;
        $pago->descripcion = $request->descripcion;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->save();
        return redirect()->back()
        ->with('mensaje', 'Pago registrado exitosamente.')
        ->with('icono', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pago $pago)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pago = Pago::find($id);
        $pago->delete();
        return redirect()->back()
        ->with('mensaje', 'Pago eliminado exitosamente.')
        ->with('icono', 'warning');

    }
}
