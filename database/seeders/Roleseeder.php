<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'ADMINISTRADOR/A']);
        Role::create(['name' => 'DIRECTOR/A']);
        Role::create(['name' => 'SECRETARIO/A']);
        Role::create(['name' => 'ENCARGADO/A ACADEMICO']);
        Role::create(['name' => 'DOCENTE']);
        Role::create(['name' => 'ESTUDIANTE']);
        Role::create(['name' => 'CAJERO/A']);

    }
}
