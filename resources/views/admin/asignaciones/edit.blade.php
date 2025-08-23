@extends('adminlte::page')

@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Edicion de una Asignación</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
           <div class="row">
            <div class="col-md-12">
                 <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Datos del Docente</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Buscar Docente</label><b>*</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <select class="form-control select2" name="docente" id="buscar_docente" required>
                                        <option value="">Seleccione un Docente</option>
                                        @foreach ($docentes as $docente)
                                            <option value="{{ $docente->id }}"{{ $docente->id == $asignacion->personal_id ? 'selected' : '' }}>{{ $docente->apellidos }} {{ $docente->nombres }} - {{ $docente->ci }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('docente')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                   <div id="datos_docente" >
                     <div class="row" >
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fotografia</label>
                                <center>
                                       <img id="foto" src="{{ url($asignacion->personal->foto) }}" alt="Foto del Docente" width="100px">
                                </center>

                            </div>
                        </div>
                        <div class="col-md-9">
                           <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <p id="apellidos">{{ $asignacion->personal->apellidos }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <p id="nombres">{{ $asignacion->personal->nombres }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Cedula</label>
                                        <p id="ci">{{ $asignacion->personal->ci }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <p id="fecha_nacimiento">{{ $asignacion->personal->fecha_nacimiento }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Telefono</label>
                                        <p id="telefono">{{ $asignacion->personal->telefono }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Direccion</label>
                                        <p id="direccion">{{ $asignacion->personal->direccion }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <p id="email">{{$asignacion->personal->usuario->email}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Profesion</label>
                                        <p id="profesion">{{$asignacion->personal->profesion}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   </div>
            </div>
            </div>
           </div>

           <div class="row">
             <div class="col-md-12">
                <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Formacion Academica</h3>
                </div>
                <div class="card-body">
                    <div id="tabla_formacion">
                    <div id="tabla_bd">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Institucion</th>
                                    <th>Nivel</th>
                                    <th>Año de Graduacion</th>
                                    <th>Archivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($asignacion->personal->formaciones as $formacion)
                                    <tr>
                                        <td>{{ $formacion->institucion }}</td>
                                        <td>{{ $formacion->titulo }}</td>
                                        <td>{{ $formacion->nivel }}</td>
                                        <td>{{ $formacion->fecha_graduacion }}</td>
                                        <td>
                                            <a href="{{ url($formacion->archivo) }}" target="_blank"><i class="fas fa-file-pdf"></i> Ver Archivo</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    </div>

                </div>
            </div>
             </div>
           </div>
        </div>


        <div class="col-md-4">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">LLene los Datos del Formulario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/asignaciones/'.$asignacion->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="personal_id" value="{{ $asignacion->personal_id }}" id="personal_id" hidden required>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Turno</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                        </div>
                                        <select name="turno_id" id="turno_id" class="form-control" required>
                                            <option value="">Seleccione un Turno</option>
                                            @foreach($turnos as $turno)
                                                <option value="{{ $turno->id }}" {{ $turno->id == $asignacion->turno_id ? 'selected' : '' }}>{{ $turno->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('turno_id')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre de la Gestion</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                                        </div>
                                        <select name="gestion_id" id="gestion_id" class="form-control" required>
                                            <option value="">Seleccione una Gestion</option>
                                            @foreach($gestiones as $gestion)
                                                <option value="{{ $gestion->id }}" {{ $gestion->id == $asignacion->gestion_id ? 'selected' : '' }}>{{ $gestion->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('gestion_id')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Nivel</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                        </div>
                                        <select name="nivel_id" id="niveles_id" class="form-control" required>
                                            <option value="">Seleccione un Nivel</option>
                                            @foreach($niveles as $nivel)
                                                <option value="{{ $nivel->id }}" {{ $nivel->id == $asignacion->nivel_id ? 'selected' : '' }}>{{ $nivel->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('nivel_id')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Grado</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                        </div>
                                        <select name="grados_id" id="grados_id" class="form-control" required>
                                            <option value="">Primero Seleccione un Nivel</option>
                                            @foreach($grados as $grado)
                                                <option value="{{ $grado->id }}" {{ $grado->id == $asignacion->grado_id ? 'selected' : '' }}>{{ $grado->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('grados_id')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Paralelo</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-clone"></i></span>
                                        </div>
                                        <select name="paralelos_id" id="paralelos_id" class="form-control" required>
                                            <option value="">Primero Seleccione un Grado</option>
                                            @foreach($paralelos as $paralelo)
                                                <option value="{{ $paralelo->id }}" {{ $paralelo->id == $asignacion->paralelo_id ? 'selected' : '' }}>{{ $paralelo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('paralelos_id')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                               <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha de Matriculación</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="fecha_asignacion" value="{{ $asignacion->fecha_asignacion }}" id="fecha_asignacion" class="form-control" required>
                                    </div>
                                    @error('fecha_asignacion')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                             </div>
                               <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="">Asignar Materia</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                                        </div>
                                        <select name="materia_id" id="materia_id" class="form-control select2" required>
                                            <option value="">Seleccione una Materia</option>
                                            @foreach($materias as $materia)
                                                <option value="{{ $materia->id }}" {{ $materia->id == $asignacion->materia_id ? 'selected' : '' }}>{{ $materia->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('materia_id')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <a href="{{ url('/admin/asignaciones') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save ml-2"></i> Actualizar
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
    <style>
        .select2-container--default .select2-selection--single {
            height: 38px;
            border-radius: 0.25rem;
        }
    </style>
@stop

@section('js')
    <script>
        $('.select2').select2({});

        $('#niveles_id').on('change', function() {
            var id = $(this).val();
            //alert(id);
            if(id){
                $.ajax({
                    url: '{{ url('/admin/matriculaciones/buscar_grado/') }}' + '/' + id,
                    type: 'GET',
                    success: function(grados) {
                        var option = '<option value="">Seleccione un Grado</option>';
                        $.each(grados, function(key, value) {
                            option += '<option value="' + key + '">' + value + '</option>';
                        });
                        $('#grados_id').html(option);
                    },
                    error: function() {
                        alert('Error al buscar el nivel');
                    }
                });
            }else{
                alert('Seleccione un nivel');
            }
        });
         $('#grados_id').on('change', function() {
            var id = $(this).val();
            //alert(id);

            if(id){
                $.ajax({
                    url: '{{ url('/admin/matriculaciones/buscar_paralelos/') }}' + '/' + id,
                    type: 'GET',
                    success: function(paralelos) {
                        var option = '<option value="">Seleccione un Paralelo</option>';
                        $.each(paralelos, function(key, value) {
                            option += '<option value="' + key + '">' + value + '</option>';
                        });
                        $('#paralelos_id').html(option);
                    },
                    error: function() {
                        alert('Error al buscar el nivel');
                    }
                });
            }else{
                alert('Seleccione un Grado');
            }

        });

        $('#buscar_docente').on('change', function() {
            var id = $(this).val();
            if(id){
                $.ajax({
                    url: '{{ url('/admin/asignaciones/buscar_docente/') }}' + '/' + id,
                    type: 'GET',
                    success: function(docente) {
                        $('#foto').attr('src',docente.foto_url).show();
                        $('#apellidos').html(docente.apellidos);
                        $('#nombres').html(docente.nombres);
                        $('#ci').html(docente.ci);
                        $('#fecha_nacimiento').html(docente.fecha_nacimiento);
                        $('#telefono').html(docente.telefono);
                        $('#direccion').html(docente.direccion);
                        $('#email').html(docente.usuario.email);
                        $('#profesion').html(docente.profesion);
                        $('#docente_id').val(docente.id);
                        $('#personal_id').val(docente.id);
                        $('#datos_docente').css('display', 'block');

                        var baseurl = "{{ url('/') }}";
                        if(docente.formaciones && docente.formaciones.length > 0){
                            var tabla = '<table class="table table-bordered">';
                            tabla += '<thead><tr class="text-center"><th>Titulo</th><th>Institucion</th><th>Nivel</th><th>fecha Graduacion</th><th>Archivo</th></tr></thead>';
                            tabla += '<tbody>';

                            docente.formaciones.forEach(function(formacion) {
                                tabla += '<tr class="text-center">' +
                                    '<td>' + (formacion.titulo || '') + '</td>' +
                                    '<td>' + (formacion.institucion || '') + '</td>' +
                                    '<td>' + (formacion.nivel || '') + '</td>' +
                                    '<td>' + (formacion.fecha_graduacion || '') + '</td>' +
                                    '<td>' + '<a href="' + baseurl + '/' + formacion.archivo + '" target="_blank"><i class="fas fa-file-pdf"></i> Ver Archivo</a>' + '</td>' +
                                    '</tr>';
                            });
                            tabla += '</tbody></table>';

                            $('#tabla_formacion').html(tabla).show();
                            $('#tabla_bd').css('display', 'none');
                        }else{
                            $('#tabla_bd').css('display', 'none');
                            $('#tabla_formacion').html('<p>No se encontró Formacion académica del Docente</p>').show();
                        }


                    },
                    error: function() {
                        alert('Error al buscar el docente');
                    }
                });
            }else{

            }
        });
    </script>
@stop
