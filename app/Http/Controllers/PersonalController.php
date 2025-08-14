<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($tipo)
    {
       $personals = Personal::where('tipo', $tipo)->get();
       return view('admin.personal.index', compact('personals', 'tipo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($tipo)
    {
        $roles=Role::all();
        return view('admin.personal.create', compact('tipo', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required',
            'rol' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required|unique:personals',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'profesion' => 'required',
            'direccion' => 'required',
            'email' => 'required|unique:users',
            'tipo' => 'required',

        ]);
        $usuario = new User();
        $usuario->name = $request->apellidos.' '.$request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        $usuario ->assignRole($request->rol);

        $personal = new Personal();
        $personal->usuario_id = $usuario->id;
        $personal->tipo = $request->tipo;
        $personal->nombres = $request->nombres;
        $personal->apellidos = $request->apellidos;
        $personal->ci = $request->ci;
        $personal->fecha_nacimiento = $request->fecha_nacimiento;
        $personal->direccion = $request->direccion;
        $personal->telefono = $request->telefono;
        $personal->profesion = $request->profesion;

          if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto');
                $nombreArchivo = time() . '.' . $fotoPath->getClientOriginalName();
                $rutadestino = public_path('uploads/fotos');
                $fotoPath->move($rutadestino, $nombreArchivo);
                $personal->foto = 'uploads/fotos/' . $nombreArchivo;
            }

        $personal->save();
        return redirect()->route('admin.personal.index', $personal->tipo)
        ->with('mensaje', 'Personal '.$personal->tipo.' creado exitosamente.')
        ->with('icono', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personal = Personal::findOrFail($id);
        return view('admin.personal.show', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $personal = Personal::findOrFail($id);
        $roles=Role::all();
        return view('admin.personal.edit', compact('personal', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $personal = Personal::findOrFail($id);
        $usuario = User::findOrFail($personal->usuario_id);
        $request->validate([

            'rol' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'profesion' => 'required',
            'direccion' => 'required',
            'email' => 'required|unique:users,email,'.$usuario->id,

        ]);

        $usuario->name = $request->apellidos.' '.$request->nombres;
        $usuario->email = $request->email;
        $usuario->save();

        $usuario ->syncRoles([$request->rol]);


        $personal->nombres = $request->nombres;
        $personal->apellidos = $request->apellidos;
        $personal->fecha_nacimiento = $request->fecha_nacimiento;
        $personal->direccion = $request->direccion;
        $personal->telefono = $request->telefono;
        $personal->profesion = $request->profesion;

        if($request->hasFile('foto')) {
            if($personal->foto && file_exists(public_path($personal->foto))) {
                // Eliminar el logo anterior si existe
                unlink(public_path($personal->foto));
            }
            $fotoPath = $request->file('foto');
            $nombreArchivo = time() . '.' . $fotoPath->getClientOriginalName();
            $rutadestino = public_path('uploads/fotos');
            $fotoPath->move($rutadestino, $nombreArchivo);
            $personal->foto = 'uploads/fotos/' . $nombreArchivo;
        }
        $personal->save();
        return redirect()->route('admin.personal.index', $personal->tipo)
        ->with('mensaje', 'Personal '.$personal->tipo.' actualizado exitosamente.')
        ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $personal = Personal::findOrFail($id);
        $usuario = User::findOrFail($personal->usuario_id);
        if($personal->foto && file_exists(public_path($personal->foto))) {
            unlink(public_path($personal->foto));
        }
        $personal->delete();
        $usuario->delete();

        return redirect()->route('admin.personal.index', $personal->tipo)
        ->with('mensaje', 'Personal '.$personal->tipo.' eliminado exitosamente.')
        ->with('icono', 'info');
    }
}
