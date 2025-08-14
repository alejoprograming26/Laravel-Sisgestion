<?php

namespace App\Http\Controllers;

use App\Models\Ppff;
use Illuminate\Http\Request;

class PpffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $ppffs= Ppff::all();
      return view('admin.ppffs.index', compact('ppffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ppffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'ci' => 'required|string|max:255|unique:ppffs,ci',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string|max:255',
            'parentesco' => 'required|string|max:255',
            'ocupacion' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',

        ]);
        $ppff = new Ppff();
        $ppff->nombres = $request->nombres;
        $ppff->apellidos = $request->apellidos;
        $ppff->ci = $request->ci;
        $ppff->fecha_nacimiento = $request->fecha_nacimiento;
        $ppff->telefono = $request->telefono;
        $ppff->parentesco = $request->parentesco;
        $ppff->ocupacion = $request->ocupacion;
        $ppff->direccion = $request->direccion;
        $ppff->save();

        return redirect()->back()
        ->with('mensaje', 'Ppff creado exitosamente.')
        ->with('icono', 'success');

    }

    public function store_ppff(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'ci' => 'required|string|max:255|unique:ppffs,ci',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string|max:255',
            'parentesco' => 'required|string|max:255',
            'ocupacion' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',

        ]);
        $ppff = new Ppff();
        $ppff->nombres = $request->nombres;
        $ppff->apellidos = $request->apellidos;
        $ppff->ci = $request->ci;
        $ppff->fecha_nacimiento = $request->fecha_nacimiento;
        $ppff->telefono = $request->telefono;
        $ppff->parentesco = $request->parentesco;
        $ppff->ocupacion = $request->ocupacion;
        $ppff->direccion = $request->direccion;
        $ppff->save();

        return redirect()->route('admin.ppffs.index')
        ->with('mensaje', 'Ppff creado exitosamente.')
        ->with('icono', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
     $ppff= Ppff::with('estudiantes')->find($id);
     return view('admin.ppffs.show', compact('ppff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ppff = Ppff::with('estudiantes')->find($id);
        return view('admin.ppffs.edit', compact('ppff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
         $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'ci' => 'required|string|max:255|unique:ppffs,ci,'.$id,
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string|max:255',
            'parentesco' => 'required|string|max:255',
            'ocupacion' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',

        ]);
        $ppff = Ppff::find($id);
        $ppff->nombres = $request->nombres;
        $ppff->apellidos = $request->apellidos;
        $ppff->ci = $request->ci;
        $ppff->fecha_nacimiento = $request->fecha_nacimiento;
        $ppff->telefono = $request->telefono;
        $ppff->parentesco = $request->parentesco;
        $ppff->ocupacion = $request->ocupacion;
        $ppff->direccion = $request->direccion;
        $ppff->save();
        return redirect()->route('admin.ppffs.index')
        ->with('mensaje', 'Ppff actualizado exitosamente.')
        ->with('icono', 'success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ppff = Ppff::find($id);
        $ppff->delete();
        return redirect()->route('admin.ppffs.index')
        ->with('mensaje', 'Ppff eliminado exitosamente.')
        ->with('icono', 'success');
    }
}
