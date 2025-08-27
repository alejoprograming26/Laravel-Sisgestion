<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Configuracion;
use App\Models\Gestion;
use App\Models\Periodo;
use App\Models\Nivel;
use App\Models\Grado;
use App\Models\Paralelo;
use App\Models\Turno;
use App\Models\Materia;
use App\Models\Personal;
use App\Models\Estudiante;
use App\Models\Ppff;
use App\Models\Asignacion;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(Roleseeder::class);
        User::create([
            'name' => 'Alejandro Alvarez',
            'email' => 'joseale260403@gmail.com',
            'password' => Hash::make('12345678')
        ])->assignRole('ADMINISTRADOR/A');
        Configuracion::create([
            'nombre' => 'Unefa 51',
            'descripcion' => 'Escuela de Informatica',
            'Direccion' => 'Calle 51 Av. Pedro Leon',
            'telefono' => '12345678',
            'divisa' => 'Bs',
            'correo_electronico' => 'joseale260403@gmail.com',
            'web' => 'https://www.justosierra.edu.bo',
            'logo' => ''

        ]);
        Gestion::create(['nombre' => '2024/2025', ]);
        Gestion::create(['nombre' => '2025/2026', ]);
        Gestion::create(['nombre' => '2027/2027', ]);

        Periodo::create(['nombre' => '1 Trimestre','gestion_id' => 1]);
        Periodo::create(['nombre' => '2 Trimestre','gestion_id' => 1]);
        Periodo::create(['nombre' => '3 Trimestre','gestion_id' => 1]);
        Periodo::create(['nombre' => '1 Trimestre','gestion_id' => 2]);
        Periodo::create(['nombre' => '2 Trimestre','gestion_id' => 2]);
        Periodo::create(['nombre' => '3 Trimestre','gestion_id' => 2]);
        Periodo::create(['nombre' => '1 Trimestre','gestion_id' => 3]);
        Periodo::create(['nombre' => '2 Trimestre','gestion_id' => 3]);
        Periodo::create(['nombre' => '3 Trimestre','gestion_id' => 3]);

        Nivel::create(['nombre' => 'Educacion Inicial',]);
        Nivel::create(['nombre' => 'Educacion Media',]);
        Nivel::create(['nombre' => 'Educacion Superior',]);

        Grado::create(['nombre' => '1ro Inicial', 'nivel_id' => 1]);
        Grado::create(['nombre' => '2do Inicial', 'nivel_id' => 1]);
        Grado::create(['nombre' => '1ro Media', 'nivel_id' => 2]);
        Grado::create(['nombre' => '2do Media', 'nivel_id' => 2]);
        Grado::create(['nombre' => '1ro Superior', 'nivel_id' => 3]);
        Grado::create(['nombre' => '2do Superior', 'nivel_id' => 3]);

        Paralelo::create(['nombre' => 'I-A', 'grado_id' => 1]);
        Paralelo::create(['nombre' => 'I-B', 'grado_id' => 2]);
        Paralelo::create(['nombre' => 'M-A', 'grado_id' => 3]);
        Paralelo::create(['nombre' => 'M-B', 'grado_id' => 4]);
        Paralelo::create(['nombre' => 'S-A', 'grado_id' => 5]);
        Paralelo::create(['nombre' => 'S-B', 'grado_id' => 6]);

        Turno::create(['nombre' => 'Mañana',]);
        Turno::create(['nombre' => 'Tarde',]);
        Turno::create(['nombre' => 'Noche',]);

        Materia::create(['nombre' => 'Tegnologia']);
        Materia::create(['nombre' => 'Lenguaje']);
        Materia::create(['nombre' => 'Arte']);
        Materia::create(['nombre' => 'Ingles']);
        Materia::create(['nombre' => 'Computacion']);
        Materia::create(['nombre' => 'Arquitectura']);
        Materia::create(['nombre' => 'Ciencias']);
        Materia::create(['nombre' => 'Quimica']);
        Materia::create(['nombre' => 'Fisica']);
        Materia::create(['nombre' => 'Tecnica']);

        User::create(['name' => 'Carlos Perez',
        'email' => 'joseale@gmail.com', 'password' => Hash::make('29915990')])->assignRole('DOCENTE');
        Personal::create([
         'usuario_id' => 2,
         'nombres' => 'Carlos',
         'apellidos' => 'Perez',
          'tipo' => 'docente',
         'ci' => '29915990',
         'fecha_nacimiento' => '2000-01-01',
         'telefono' => '12345678',
         'profesion' => 'Profesor',
         'direccion' => 'Calle 51 Av. Pedro Leon',
         'foto' => '',



        ]);
        User::create(['name' => 'Ale Colmenzarez', 'email' => 'alecolmenzarez@gmail.com', 'password'=> Hash::make('23456')])->assignRole('DOCENTE');
        Personal::create([
         'usuario_id' => 3,
         'nombres' => 'Ale',
         'apellidos' => 'Colmenzarez',
         'tipo' => 'docente',
         'ci' => '23456',
         'fecha_nacimiento' => '2000-01-01',
         'telefono' => '12345678',
         'profesion' => 'Licenciado',
         'direccion' => 'Calle 51 Av. Pedro Leon',
         'foto' => '',
        ]);

        User::create(['name' => 'Anibal Perez',
        'email' => 'anibal26@gmail.com', 'password' => Hash::make('29915991')])->assignRole('DOCENTE');
        Personal::create([
         'usuario_id' => 4,
         'nombres' => 'Anibal',
         'apellidos' => 'Perez',
         'tipo' => 'docente',
         'ci' => '29915991',
         'fecha_nacimiento' => '2000-01-01',
         'telefono' => '12345678',
         'profesion' => 'Ingeniero',
         'direccion' => 'Calle 51 Av. Pedro Leon',
         'foto' => '',
        ]);
        User::create(['name' => 'Luis Perez',
        'email' => 'luis26@gmail.com', 'password' => Hash::make('29915992')])->assignRole('DIRECTOR/A');
        Personal::create([
         'usuario_id' => 5,
         'nombres' => 'Luis',
         'apellidos' => 'Perez',
         'tipo' => 'administrativo',
         'ci' => '29915992',
         'fecha_nacimiento' => '2000-01-01',
         'telefono' => '12345678',
         'profesion' => 'Estudiante',
         'direccion' => 'Calle 51 Av. Pedro Leon',
         'foto' => '',
        ]);
        User::create(['name' => 'Adolfo Suarez', 'email' => 'adolfo26@gmail.com', 'password' => Hash::make('29915993')])->assignRole('CAJERO/A');
        Personal::create([
         'usuario_id' => 6,
         'nombres' => 'Adolfo',
         'apellidos' => 'Suarez',
         'tipo' => 'administrativo',
         'ci' => '29915993',
         'fecha_nacimiento' => '2000-01-01',
         'telefono' => '12345678',
         'profesion' => 'Estudiante',
         'direccion' => 'Calle 51 Av. Pedro Leon',
         'foto' => '',
        ]);

        Ppff::create([ 'nombres' => 'Jose', 'apellidos' => 'Alvarez', 'ci' => '1212678','fecha_nacimiento' => '2000-01-01', 'telefono' => '12345678', 'parentesco'=> 'Padre', 'ocupacion' => 'Chofer', 'direccion' => 'Calle 51 Av. Pedro Leon' ]);
        Ppff::create([ 'nombres' => 'Maria', 'apellidos' => 'Alvarez', 'ci' => '121263379','fecha_nacimiento' => '2000-01-01', 'telefono' => '1112345678', 'parentesco'=> 'Madre', 'ocupacion' => 'Ama de casa', 'direccion' => 'Calle 51 Av. Pedro Leon' ]);
        Ppff::create([ 'nombres' => 'Carlos', 'apellidos' => 'Perez', 'ci' => '1212680','fecha_nacimiento' => '2000-01-01', 'telefono' => '12345678', 'parentesco'=> 'Padre', 'ocupacion' => 'Ingeniero', 'direccion' => 'Calle 51 Av. Pedro Leon' ]);
        Ppff::create([ 'nombres' => 'Ana', 'apellidos' => 'Perez', 'ci' => '121263423431','fecha_nacimiento' => '2000-01-01', 'telefono' => '12345678', 'parentesco'=> 'Madre', 'ocupacion' => 'Ama de casa', 'direccion' => 'Calle 51 Av. Pedro Leon' ]);
        Ppff::create([ 'nombres' => 'Luis', 'apellidos' => 'Suarez', 'ci' => '121267781','fecha_nacimiento' => '2000-01-01', 'telefono' => '12345678', 'parentesco'=> 'Padre', 'ocupacion' => 'Arquitecto', 'direccion' => 'Calle 51 Av. Pedro Leon' ]);

        User::create(['name' => 'locasa Papelon', 'email' => 'estudiante1@gmail.com', 'password' => Hash::make('1234567899')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 7, 'ppff_id' => 1, 'nombres' => 'Papelon', 'apellidos' => 'locasa', 'ci' => '1234567899', 'fecha_nacimiento' => '2000-01-01', 'telefono' => '12345678', 'direccion' => 'Calle 51 Av. Pedro Leon', 'foto' => '']);
        User::create(['name' => 'Perez Juan', 'email' => 'estudiante2@gmail.com', 'password' => Hash::make('1234567888')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 8, 'ppff_id' => 2, 'nombres' => 'Juan', 'apellidos' => 'Perez', 'ci' => '1234567888', 'fecha_nacimiento' => '2000-01-01', 'telefono' => '12345678', 'direccion' => 'Calle 51 Av. Pedro Leon', 'foto' => '']);
        User::create(['name' => 'Lopez Maria', 'email' => 'estudiante3@gmail.com', 'password' => Hash::make('1234567000')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 9, 'ppff_id' => 3, 'nombres' => 'Maria', 'apellidos' => 'Lopez', 'ci' => '1234567000', 'fecha_nacimiento' => '2000-01-01', 'telefono' => '12345678', 'direccion' => 'Calle 51 Av. Pedro Leon', 'foto' => '']);
        User::create(['name' => 'Gonzalez Perozo', 'email' => 'perozo@gmail.com', 'password' => Hash::make('1234567890')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 10, 'ppff_id' => 4, 'nombres' => 'Perozo', 'apellidos' => 'Gonzalez', 'ci' => '1234567890', 'fecha_nacimiento' => '2000-01-01', 'telefono' => '12345678', 'direccion' => 'Calle 51 Av. Pedro Leon', 'foto' => '']);
        User::create(['name' => 'Sanchez Parra', 'email' => 'sanchezparra@gmail.com', 'password' => Hash::make('123400')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id' => 11, 'ppff_id' => 5, 'nombres' => 'Sanchez', 'apellidos' => 'Parra', 'ci' => '123400', 'fecha_nacimiento' => '2000-01-01', 'telefono' => '12345678', 'direccion' => 'Calle 51 Av. Pedro Leon', 'foto' => '']);

        Asignacion::create(['personal_id' => 3,  'gestion_id' => 1, 'nivel_id' => 2, 'grado_id' => 3, 'paralelo_id' => 3, 'materia_id' => 1, 'turno_id' => 1, 'estado' => 'activo', 'fecha_asignacion' => '2025-01-01']);
        Asignacion::create(['personal_id' => 3,  'gestion_id' => 1, 'nivel_id' => 2, 'grado_id' => 3, 'paralelo_id' => 3, 'materia_id' => 2, 'turno_id' => 1, 'estado' => 'activo', 'fecha_asignacion' => '2025-01-01']);
        Asignacion::create(['personal_id' => 1,  'gestion_id' => 1, 'nivel_id' => 1, 'grado_id' => 1, 'paralelo_id' => 1, 'materia_id' => 4, 'turno_id' => 1, 'estado' => 'activo', 'fecha_asignacion' => '2025-01-01']);
       }
}
