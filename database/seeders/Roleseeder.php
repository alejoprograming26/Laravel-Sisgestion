<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;
class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $admin = Role::create(['name' => 'ADMINISTRADOR/A']);
      $director = Role::create(['name' => 'DIRECTOR/A']);
      $secretario = Role::create(['name' => 'SECRETARIO/A']);
      $encargado = Role::create(['name' => 'ENCARGADO/A ACADEMICO']);
      $docente = Role::create(['name' => 'DOCENTE']);
      $estudiante = Role::create(['name' => 'ESTUDIANTE']);
      $caja = Role::create(['name' => 'CAJERO/A']);

      //permisos
      Permission::create(['name' => 'admin.configuracion.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.configuracion.store'])->syncRoles([$admin]);

      //Permisos Gestiones
      Permission::create(['name' => 'admin.gestiones.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.gestiones.create'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.gestiones.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.gestiones.edit'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.gestiones.update'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.gestiones.destroy'])->syncRoles([$admin]);

      //Permisos Periodos
      Permission::create(['name' => 'admin.periodos.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.periodos.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.periodos.update'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.periodos.destroy'])->syncRoles([$admin]);

      //Permisos Niveles
      Permission::create(['name' => 'admin.niveles.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.niveles.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.niveles.update'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.niveles.destroy'])->syncRoles([$admin]);

      //Permisos Grados
      Permission::create(['name' => 'admin.grados.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.grados.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.grados.update'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.grados.destroy'])->syncRoles([$admin]);
      //Permisos Paralelos
      Permission::create(['name' => 'admin.paralelos.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.paralelos.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.paralelos.update'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.paralelos.destroy'])->syncRoles([$admin]);

      //Permisos Turnos
      Permission::create(['name' => 'admin.turnos.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.turnos.create'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.turnos.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.turnos.edit'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.turnos.update'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.turnos.destroy'])->syncRoles([$admin]);

      //Permisos Materias
      Permission::create(['name' => 'admin.materias.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.materias.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.materias.edit'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.materias.destroy'])->syncRoles([$admin]);

      //Permisos Roles
      Permission::create(['name' => 'admin.roles.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.roles.create'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.roles.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.roles.edit'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.roles.permisos'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.roles.update_permisos'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.roles.update'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.roles.destroy'])->syncRoles([$admin]);

      //Permisos Personal
      Permission::create(['name' => 'admin.personal.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.personal.create'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.personal.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.personal.show'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.personal.edit'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.personal.update'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.personal.destroy'])->syncRoles([$admin]);

      //Permisos Formaciones
      Permission::create(['name' => 'admin.formaciones.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.formaciones.create'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.formaciones.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.formaciones.edit'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.formaciones.update'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.formaciones.destroy'])->syncRoles([$admin]);

      //Permisos Estudiantes
      Permission::create(['name' => 'admin.estudiantes.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.estudiantes.create'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.estudiantes.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.estudiantes.show'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.estudiantes.edit'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.estudiantes.update'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.estudiantes.destroy'])->syncRoles([$admin]);

      //Permisos Padres
      Permission::create(['name' => 'admin.ppffs.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.ppffs.create'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.estudiantes.ppffs.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.ppffs.show'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.ppffs.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.ppffs.edit'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.ppffs.update'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.ppffs.destroy'])->syncRoles([$admin]);

      //Permisos Matriculacion
      Permission::create(['name' => 'admin.matriculaciones.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.matriculaciones.create'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.matriculaciones.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.matriculaciones.buscar_estudiante'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.matriculaciones.buscar_grado'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.matriculaciones.buscar_paralelo'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.matriculaciones.pdf_matricula'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.matriculaciones.show'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.matriculaciones.edit'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.matriculaciones.update'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.matriculaciones.destroy'])->syncRoles([$admin]);

      //Permisos Asignaciones
      Permission::create(['name' => 'admin.asignaciones.index'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.asignaciones.create'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.asignaciones.buscar_docente'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.asignaciones.store'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.asignaciones.show'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.asignaciones.edit'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.asignaciones.update'])->syncRoles([$admin]);
      Permission::create(['name' => 'admin.asignaciones.destroy'])->syncRoles([$admin]);

      //Permisos Pagos
      Permission::create(['name' => 'admin.pagos.index'])->syncRoles([$admin, $caja]);
      Permission::create(['name' => 'admin.pagos.ver_pagos'])->syncRoles([$admin, $caja]);
      Permission::create(['name' => 'admin.pagos.store'])->syncRoles([$admin, $caja]);
      Permission::create(['name' => 'admin.pagos.comprobante'])->syncRoles([$admin, $caja]);
      Permission::create(['name' => 'admin.pagos.destroy'])->syncRoles([$admin, $caja]);

    //Permisos Asistencias
      Permission::create(['name' => 'admin.asistencias.index'])->syncRoles([$admin, $docente, $estudiante]);
      Permission::create(['name' => 'admin.asistencias.create'])->syncRoles([$docente]);

    }

}
