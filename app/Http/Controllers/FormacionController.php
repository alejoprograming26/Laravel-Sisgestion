<?php

namespace App\Http\Controllers;

use App\Models\Formacion;
use Illuminate\Http\Request;
use App\Models\Personal;

class FormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
       $personal = Personal::find($id);
       $formaciones = Formacion:: where('personal_id', $id)->get();
       return view('admin.formaciones.index', compact('formaciones', 'personal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)

    {

        return view('admin.formaciones.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //$datos= request()->all();
       //return response()->json($datos);
         $request->validate([
            'personal_id' => 'required',
            'titulo' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'nivel' => 'required|string|max:255',
            'fecha_graduacion' => 'required|date',
            'archivo' => 'required'
        ]);
        $formacion = new Formacion();
        $formacion->personal_id = $request->personal_id;
        $formacion->titulo = $request->titulo;
        $formacion->institucion = $request->institucion;
        $formacion->nivel = $request->nivel;
        $formacion->fecha_graduacion = $request->fecha_graduacion;

        $fotoPath = $request->file('archivo');
        $nombreArchivo = time() . '.' . $fotoPath->getClientOriginalName();
        $rutadestino = public_path('uploads/formaciones');
        $fotoPath->move($rutadestino, $nombreArchivo);
        $formacion->archivo = 'uploads/formaciones/' . $nombreArchivo;


        $formacion->save();
        return redirect()->route('admin.formaciones.index', $request->personal_id)
            ->with('mensaje', 'Formación creada correctamente.')
            ->with('icono', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Formacion $formacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $formacion = Formacion::findOrFail($id);
        return view('admin.formaciones.edit', compact('formacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       //$datos= request()->all();
       //return response()->json($datos);
        $request->validate([
            'titulo' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'nivel' => 'required|string|max:255',
            'fecha_graduacion' => 'required|date',
        ]);
        $formacion = Formacion::findOrFail($id);
        $formacion->titulo = $request->titulo;
        $formacion->institucion = $request->institucion;
        $formacion->nivel = $request->nivel;
        $formacion->fecha_graduacion = $request->fecha_graduacion;

       if($request->hasFile('archivo')) {
            if($formacion->archivo && file_exists(public_path($formacion->archivo))) {
                // Eliminar el logo anterior si existe
                unlink(public_path($formacion->archivo));
            }
            $fotoPath = $request->file('archivo');
            $nombreArchivo = time() . '.' . $fotoPath->getClientOriginalName();
            $rutadestino = public_path('uploads/formaciones');
            $fotoPath->move($rutadestino, $nombreArchivo);
            $formacion->archivo = 'uploads/formaciones/' . $nombreArchivo;
        }

        $formacion->save();
        return redirect()->route('admin.formaciones.index', $formacion->personal_id)
            ->with('mensaje', 'Personal actualizado correctamente.')
            ->with('icono', 'success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        echo $id;
        $formacion = Formacion::findOrFail($id);
        if($formacion->archivo && file_exists(public_path($formacion->archivo))) {
            unlink(public_path($formacion->archivo));
        }
        $formacion->delete();
        return redirect()->route('admin.formaciones.index', $formacion->personal_id)
        ->with('mensaje', 'Formación eliminada correctamente.')
        ->with('icono', 'info');
    }
}
