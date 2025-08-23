@extends('adminlte::page')

@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Asignaciones/Datos de Una Asignación</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
           <div class="row">
            <div class="col-md-12">
                 <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Datos del Docente</h3>
                </div>
                <div class="card-body">

                   <div id="datos_estudiante" >
                     <div class="row" >
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fotografia</label>
                                <center>
                                       <img id="foto" src="{{ url($asignacion->personal->foto) }}" width="100">
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
                <div class="card card-outline card-purple">
                <div class="card-header">
                    <h3 class="card-title">Formacion Academica del Docente
                    </h3>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                     <thead>
                       <tr class="text-center">
                         <th>Titulo</th>
                         <th>Institucion</th>
                         <th>Nivel</th>
                         <th>Fecha Graduacion</th>
                         <th>Archivo</th>
                       </tr>
                     </thead>
                     <tbody>
                       @foreach($asignacion->personal->formaciones as $formacion)
                         <tr class="text-center">
                           <td>{{ $formacion->titulo }}</td>
                           <td>{{ $formacion->institucion }}</td>
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


        <div class="col-md-4">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Datos de la Materia/Seccion a Impartir</h3>
                </div>
                <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Turno</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $asignacion->turno->nombre }}" disabled>
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
                                        <input type="text" class="form-control" value="{{ $asignacion->gestion->nombre }}" disabled>
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
                                        <input type="text" class="form-control" value="{{ $asignacion->nivel->nombre }}" disabled>
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
                                        <input type="text" class="form-control" value="{{ $asignacion->grado->nombre }}" disabled>
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
                                        <input type="text" class="form-control" value="{{ $asignacion->paralelo->nombre }}" disabled>
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
                                        <input type="text" class="form-control" value="{{ $asignacion->fecha_asignacion }}" disabled>
                                    </div>
                                    @error('fecha_matriculacion')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="">Materia</label><b>*</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $asignacion->materia->nombre }}" disabled>
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
                                    <a href="{{ url('/admin/asignaciones/') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Cancelar
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

        $('#buscar_estudiante').on('change', function() {
            var id = $(this).val();
            if(id){
                $.ajax({
                    url: '{{ url('/admin/matriculaciones/buscar_estudiante/') }}' + '/' + id,
                    type: 'GET',
                    success: function(estudiante) {
                        $('#foto').attr('src',estudiante.foto_url).show();
                        $('#apellidos').html(estudiante.apellidos);
                        $('#nombres').html(estudiante.nombres);
                        $('#ci').html(estudiante.ci);
                        $('#fecha_nacimiento').html(estudiante.fecha_nacimiento);
                        $('#telefono').html(estudiante.telefono);
                        $('#direccion').html(estudiante.direccion);
                        $('#email').html(estudiante.usuario.email);
                        $('#genero').html(estudiante.genero);
                        $('#estudiante_id').val(estudiante.id);
                        $('#datos_estudiante').css('display', 'block');



                        if(estudiante.matriculaciones && estudiante.matriculaciones.length > 0){
                            var tabla = '<table class="table table-bordered">';
                            tabla += '<thead><tr class="text-center"><th>Turno</th><th>Gestion</th><th>Nivel</th><th>Grado</th><th>Paralelo</th></tr></thead>';
                            tabla += '<tbody>';

                            estudiante.matriculaciones.forEach(function(matriculacion) {
                                tabla += '<tr class="text-center">' +
                                    '<td>' + (matriculacion.turno.nombre || '') + '</td>' +
                                    '<td>' + (matriculacion.gestion.nombre || '') + '</td>' +
                                    '<td>' + (matriculacion.nivel.nombre || '') + '</td>' +
                                    '<td>' + (matriculacion.grado.nombre || '') + '</td>' +
                                    '<td>' + (matriculacion.paralelo.nombre || '') + '</td>' +
                                    '</tr>';
                            });
                            tabla += '</tbody></table>';

                            $('#tabla_historial').html(tabla).show();
                        }else{
                            $('#tabla_historial').html('<p>No se encontró historial académico</p>').show();
                        }

                    },
                    error: function() {
                        alert('Error al buscar el estudiante');
                    }
                });
            }else{

            }
        });
    </script>
@stop
