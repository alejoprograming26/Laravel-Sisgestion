@extends('adminlte::page')


@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Creacion de un Nuevo Padre de Familia</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">LLene los Datos del Formulario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/ppffs/create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombres</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('nombres') }}"
                                            name="nombres" placeholder="Escriba aquí..." required>
                                    </div>
                                    @error('nombres')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Apellidos</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('apellidos') }}"
                                            name="apellidos" placeholder="Escriba aquí..." required>
                                    </div>
                                    @error('apellidos')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                               <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Cedula</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('ci') }}"
                                            name="ci" placeholder="Escriba aquí..." required>
                                    </div>
                                    @error('ci')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha Nacimiento</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" value="{{ old('fecha_nacimiento') }}"
                                            name="fecha_nacimiento" placeholder="Escriba aquí..." required>
                                    </div>
                                    @error('fecha_nacimiento')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Telefono</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('telefono') }}"
                                            name="telefono" placeholder="Escriba aquí..." required>
                                    </div>
                                    @error('telefono')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Parentesco</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                        </div>
                                        <select class="form-control" name="parentesco" required>
                                            <option value=""{{ old('parentesco') == '' ? 'selected' : '' }}>Seleccione una Opcion</option>
                                            <option value="Padre"{{ old('parentesco') == 'Padre' ? 'selected' : '' }}>Padre</option>
                                            <option value="Madre"{{ old('parentesco') == 'Madre' ? 'selected' : '' }}>Madre</option>
                                            <option value="Tutor"{{ old('parentesco') == 'Tutor' ? 'selected' : '' }}>Tutor</option>
                                            <option value="Otro"{{ old('parentesco') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                        </select>
                                    </div>
                                    @error('parentesco')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Ocupacion</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('ocupacion') }}"
                                            name="ocupacion" placeholder="Escriba aquí..." required>
                                    </div>
                                    @error('ocupacion')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Direccion</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('direccion') }}"
                                            name="direccion" placeholder="Escriba aquí..." required>
                                    </div>
                                    @error('direccion')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/ppffs') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save ml-2"></i> Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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
