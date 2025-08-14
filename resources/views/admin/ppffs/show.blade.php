@extends('adminlte::page')


@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Datos del Padre de Familia</h1>
    <hr>
        <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                                <a href="{{ url('/admin/ppffs') }}" class="btn btn-secondary">
                                 <i class="fas fa-arrow-left"></i> Volver</a>
                 </div>
             </div>
         </div>

@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Datos Registrados</h3>
                </div>
                <div class="card-body">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <p>{{ $ppff->nombres }}</p>
                                </div>
                            </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <p>{{ $ppff->apellidos }}</p>
                                </div>
                            </div>
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Cedula</label>
                                    <p>{{ $ppff->ci }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha Nacimiento</label>
                                    <p>{{ $ppff->fecha_nacimiento }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Telefono</label>
                                    <p>{{ $ppff->telefono }}</p>
                                </div>
                            </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Parentesco</label>
                                    <p>{{ $ppff->parentesco }}</p>
                                </div>
                            </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Ocupacion</label>
                                    <p>{{ $ppff->ocupacion }}</p>
                                </div>
                            </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Direccion</label>
                                    <p>{{ $ppff->direccion }}</p>
                                </div>
                            </div>

                        </div>
                        <hr>

                </div>
            </div>
        </div>
    </div>

     <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-purple ">
                <div class="card-header">
                    <h3 class="card-title">Estudiantes del Padre de Familia</h3>
                </div>
                <div class="card-body">
                       <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Nr</th>
                                    <th>Estudiante</th>
                                    <th>Cedula</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Genero</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppff->estudiantes as $estudiante)
                                    <tr class="text-center">
                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                        <td>{{ $estudiante->apellidos }} {{ $estudiante->nombres }}</td>
                                        <td>{{ $estudiante->ci }}</td>
                                        <td>{{ $estudiante->fecha_nacimiento }}</td>
                                        <td>{{ $estudiante->telefono }}</td>
                                        <td>{{ $estudiante->usuario->email }}</td>
                                        <td>{{ $estudiante->genero}}</td>
                                        <td>
                                            <img src="{{ url($estudiante->foto) }}" alt="Imagen" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
