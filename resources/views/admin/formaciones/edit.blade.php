@extends('adminlte::page')

@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Editar Formación del Personal</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los Datos del Formulario</h3>
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/personal/formaciones', $formacion->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Columna izquierda: Fotografía -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="foto">Archivo</label>
                                    <input type="file" class="form-control" name="archivo" accept="image/*"
                                           onchange="mostrarImagen(event)" >
                                    <center>
                                        <img id="preview" src="{{ url($formacion->archivo) }}" style="max-width: 300px; margin-top: 10px;">
                                    </center>
                                    @error('archivo')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                    <div>
                                        <script>
                                            const mostrarImagen = e =>
                                                document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                        </script>
                                    </div>
                                </div>
                            </div>

                            <!-- Columna derecha: Datos académicos -->
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="titulo">Título <b>*</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-certificate"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="titulo"
                                                       value="{{ old('titulo', $formacion->titulo) }}" placeholder="Escriba aquí..." required>
                                            </div>
                                            @error('titulo')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="institucion">Institución <b>*</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-university"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="institucion"
                                                       value="{{ old('institucion', $formacion->institucion) }}" placeholder="Escriba aquí..." required>
                                            </div>
                                            @error('institucion')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nivel">Nivel <b>*</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-layer-group"></i>
                                                    </span>
                                                </div>
                                                <select class="form-control" name="nivel" id="nivel" required>
                                                    <option value="" disabled selected>Seleccione el nivel...</option>
                                                    <option value="Técnico" {{ old('nivel', $formacion->nivel) == 'Técnico' ? 'selected' : '' }}>Técnico</option>
                                                    <option value="Licenciatura" {{ old('nivel', $formacion->nivel) == 'Licenciatura' ? 'selected' : '' }}>Licenciatura</option>
                                                    <option value="Maestría" {{ old('nivel', $formacion->nivel) == 'Maestría' ? 'selected' : '' }}>Maestría</option>
                                                    <option value="Ingenieria" {{ old('nivel', $formacion->nivel) == 'Ingenieria' ? 'selected' : '' }}>Ingenieria</option>
                                                    <option value="Doctorado" {{ old('nivel', $formacion->nivel) == 'Doctorado' ? 'selected' : '' }}>Doctorado</option>
                                                    <option value="Especialidad" {{ old('nivel', $formacion->nivel) == 'Especialidad' ? 'selected' : '' }}>Especialidad</option>
                                                    <option value="Posgrado" {{ old('nivel', $formacion->nivel) == 'Posgrado' ? 'selected' : '' }}>Posgrado</option>
                                                </select>
                                            </div>
                                            @error('nivel')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha_graduacion">Fecha de Graduación <b>*</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="date" class="form-control" name="fecha_graduacion"
                                                       value="{{ old('fecha_graduacion', $formacion->fecha_graduacion) }}" required>
                                            </div>
                                            @error('fecha_graduacion')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Botones -->
                        <div class="form-group">
                            <a href="{{ URL::previous() }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save ml-2"></i> Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Puedes agregar hojas de estilo personalizadas aquí --}}
@stop

@section('js')
    <script>
        const mostrarImagen = e =>
            document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);

        console.log("Formulario cargado correctamente con Laravel-AdminLTE");
    </script>
@stop
