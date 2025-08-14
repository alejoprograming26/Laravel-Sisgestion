@extends('adminlte::page')

@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Datos del Estudiante </h1>
    <hr>
@stop

@section('content')
   <div class="row">
    <div class="col-md-12">
        <div class="card card-purple card-outline">
            <div class="card-header >
                <h3 class="card-title"> Datos del Padre del Estudiante </h3>
            </div>


            <div class="card-body" id="padres" style="">
             <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Nombres</label><b>(*)</b>
                        <p id="nombres">{{$estudiante->ppff->nombres}}</p>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Apellidos</label><b>(*)</b>
                        <p id="apellidos"> {{$estudiante->ppff->apellidos}}</p>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Cedula</label><b>(*)</b>
                        <p id="ci"> {{$estudiante->ppff->ci}}</p>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Fecha Nacimiento</label><b>(*)</b>
                        <p id="fecha_nacimiento"> {{$estudiante->ppff->fecha_nacimiento}}</p>
                    </div>
                </div>
             </div>
             <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Telefono</label><b>(*)</b>
                        <p id="telefono"> {{$estudiante->ppff->telefono}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Parentesco</label><b>(*)</b>
                        <p id="parentesco"> {{$estudiante->ppff->parentesco}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Ocupacion</label><b>(*)</b>
                        <p id="ocupacion"> {{$estudiante->ppff->ocupacion}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Direccion</label><b>(*)</b>
                        <p id="direccion"> {{$estudiante->ppff->direccion}}</p>
                    </div>
                </div>
             </div>
            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Datos del Estudiante</h3>

                </div>
                <div class="card-body">


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Fotografía</label>
                                    <br>
                                    <center>
                                        <img id="preview"
                                            src="{{ url($estudiante->foto) }}"style="max-width: 300px; margin-top: 10px">
                                    </center>

                                    @error('fotografia')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <script>
                                    const mostrarImagen = e =>
                                        document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                </script>
                            </div>

                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre del rol</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                <input name="rol" id="" class="form-control" disabled
                                                value="{{$estudiante->usuario->roles->pluck('name')->implode(',')}}">

                                            </input>
                                            </div>
                                            @error('rol')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombres">Nombres</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="nombres" id="nombres" value="{{ old('nombres', $estudiante->nombres) }}" disabled>
                                            </div>
                                            @error('nombres')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="apellidos">Apellidos</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user-friends"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ old('apellidos', $estudiante->apellidos) }}" placeholder="Ingrese apellidos..." disabled>
                                            </div>
                                            @error('apellidos')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ci">Cédula de Identidad</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-id-card"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="ci" id="ci" value="{{ old('ci', $estudiante->ci) }}"  disabled>
                                            </div>
                                            @error('ci')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fecha_nacimiento">Fecha de Nacimiento</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento) }}" disabled>
                                            </div>
                                            @error('fecha_nacimiento')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion', $estudiante->direccion) }}" placeholder="Ingrese dirección..." disabled>
                                            </div>
                                            @error('direccion')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telefono">Telefono</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono', $estudiante->telefono) }}" placeholder="Ingrese telefono..." disabled>
                                            </div>
                                            @error('telefono')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Genero</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-users"></i>
                                                    </span>
                                                </div>
                                                <input name="genero" id="genero" class="form-control"
                                                     value="{{ $estudiante->genero }}" disabled
                                                </input>
                                            </div>
                                            @error('genero')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $estudiante->usuario->email) }}" placeholder="Ingrese email..." disabled>
                                            </div>
                                            @error('email')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/estudiantes/') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Volver
                                    </a>

                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('css')

@section('js')

@stop
