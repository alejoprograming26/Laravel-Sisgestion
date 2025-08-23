<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',

        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = 'web';
        $role->save();
        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Rol creado exitosamente.')
        ->with('icono', 'success');
    }
      public function permisos($id)
    {
        $rol = Role::findOrFail($id);
        $permisos = Permission::all()->groupBy(function ($permiso) {
            if(stripos($permiso->name, 'configuracion') !== false){return 'Configuraciones del Sistema'; }
            if(stripos($permiso->name, 'gestion') !== false){return 'Gestiones del Sistema'; }
            if(stripos($permiso->name, 'periodos') !== false){return 'Periodos del Sistema'; }
            if(stripos($permiso->name, 'niveles') !== false){return 'Niveles del Sistema'; }
            if(stripos($permiso->name, 'grados') !== false){return 'Grados del Sistema'; }
            if(stripos($permiso->name, 'paralelos') !== false){return 'Paralelos del Sistema'; }
            if(stripos($permiso->name, 'turnos') !== false){return 'Turnos del Sistema'; }
            if(stripos($permiso->name, 'materias') !== false){return 'Materias del Sistema'; }
            if(stripos($permiso->name, 'roles') !== false){return 'Roles del Sistema'; }
            if(stripos($permiso->name, 'personal') !== false){return 'Personal del Sistema'; }
            if(stripos($permiso->name, 'formaciones') !== false){return 'Formaciones del Personal del Sistema'; }
            if(stripos($permiso->name, 'estudiantes') !== false){return 'Estudiantes del Sistema'; }
            if(stripos($permiso->name, 'ppffs') !== false){return 'Padres de familia del Sistema'; }
            if(stripos($permiso->name, 'matriculaciones') !== false){return 'Matriculaciones del Sistema'; }
            if(stripos($permiso->name, 'asignaciones') !== false){return 'Asignaciones del Sistema'; }
            if(stripos($permiso->name, 'pagos') !== false){return 'Pagos del Sistema'; }
        });
        return view('admin.roles.permisos', compact('rol', 'permisos'));
    }
     public function update_permisos(Request $request,$id)
    {
        $rol = Role::findOrFail($id);
        $rol->permissions()->sync($request->input('permisos'));
        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Permisos actualizados exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rol = Role::findOrFail($id);
        return view('admin.roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,'.$id,
        ]);
        $rol = Role::findOrFail($id);
        $rol->name = $request->name;
        $rol->guard_name = 'web';
        $rol->save();
        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Rol actualizado exitosamente.')
        ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rol = Role::findOrFail($id);
        $rol->delete();
        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Rol eliminado exitosamente.')
        ->with('icono', 'info');

    }
}
