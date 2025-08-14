<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ConfiguracionController;
use App\Models\Configuracion;


class ConfiguracionController extends Controller
{
    public function index()
    {
        $jsonData= file_get_contents('https://api.hilariweb.com/divisas');
        $divisas = json_decode($jsonData, true);

        // Lógica para mostrar la configuración
        $configuracion= \App\Models\Configuracion::first();
        return view('admin.configuracion.index', compact('configuracion', 'divisas'));
    }
    public function store(Request $request)
    {
        //$datos= request()->all();
        //return response()->json($datos);
        $datos = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'divisa' => 'required',
            'correo_electronico' => 'required|email|',
            'logo' => 'image|mimes:jpeg,png,jpg',

        ]);
        $configuracion = Configuracion::first();
        if ($configuracion) {

            $configuracion->nombre = request('nombre');
            $configuracion->descripcion = request('descripcion');
            $configuracion->direccion = request('direccion');
            $configuracion->telefono = request('telefono');
            $configuracion->divisa = request('divisa');
            $configuracion->web= request('web');
            $configuracion->correo_electronico = request('correo_electronico');

            if ($request->hasFile('logo')) {
                if($configuracion->logo && file_exists(public_path($configuracion->logo))) {
                // Eliminar el logo anterior si existe
                unlink(public_path($configuracion->logo));
            }
                $logoPath = $request->file('logo');
                $nombreArchivo = time() . '.' . $logoPath->getClientOriginalName();
                $rutadestino = public_path('uploads/logos');
                $logoPath->move($rutadestino, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/' . $nombreArchivo;

            }
            $configuracion->save();
            return redirect()->route('admin.configuracion.index')
            ->with('mensaje', 'Configuración actualizada correctamente.')
            ->with('icono', 'success');

        } else {
            $configuracion = new Configuracion();
            $configuracion->nombre = request('nombre');
            $configuracion->descripcion = request('descripcion');
            $configuracion->direccion = request('direccion');
            $configuracion->telefono = request('telefono');
            $configuracion->divisa = request('divisa');
            $configuracion->web= request('web');
            $configuracion->correo_electronico = request('correo_electronico');

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo');
                $nombreArchivo = time() . '.' . $logoPath->getClientOriginalName();
                $rutadestino = public_path('uploads/logos');
                $logoPath->move($rutadestino, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/' . $nombreArchivo;
            }

            $configuracion->save();
            return redirect()->route('admin.configuracion.index')
            ->with('mensaje', 'Configuración creada correctamente.')
            ->with('icono', 'success');
        }
    }

}
