@extends('adminlte::page')

@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Modificacion de Datos de Una Matriculación</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
           <div class="row">
            <div class="col-md-12">
                 <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Datos del Estudiante</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Buscar Estudiante</label><b>*</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <select class="form-control select2" name="estudiante" id="buscar_estudiante" required>
                                        <option value="">Seleccione un Estudiante</option>
                                        @foreach ($estudiantes as $estudiante)
                                            <option value="{{ $estudiante->id }}"{{ $estudiante->id == $matriculacion->estudiante_id ? ' selected' : '' }}>{{ $estudiante->apellidos }} {{ $estudiante->nombres }} - {{ $estudiante->ci }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('estudiante')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                   <div id="datos_estudiante" >
                     <div class="row" >
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fotografia</label>
                                <center>
                                       <img id="foto" src="{{ url($matriculacion->estudiante->foto) }}" width="100">
                                </center>

                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <p id="apellidos">{{ $matriculacion->estudiante->apellidos }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <p id="nombres">{{ $matriculacion->estudiante->nombres }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Cedula</label>
                                        <p id="ci">{{ $matriculacion->estudiante->ci }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <p id="fecha_nacimiento">{{ $matriculacion->estudiante->fecha_nacimiento }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Telefono</label>
                                        <p id="telefono">{{ $matriculacion->estudiante->telefono }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Direccion</label>
                                        <p id="direccion">{{ $matriculacion->estudiante->direccion }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <p id="email">{{$matriculacion->estudiante->usuario->email}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Genero</label>
                                        <p id="genero">{{$matriculacion->estudiante->genero}}</p>
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
                    <h3 class="card-title">Historial Academico</h3>
                </div>
                <div class="card-body">
                    <div id="tabla_historial">
                       <div id="tabla_bd">
                          <table class="table table-bordered">
                     <thead>
                       <tr class="text-center">
                         <th>Turno</th>
                         <th>Gestion</th>
                         <th>Nivel</th>
                         <th>Grado</th>
                         <th>Paralelo</th>
                       </tr>
                     </thead>
                     <tbody>
                       @foreach($matriculacion->estudiante->matriculaciones as $matricula)
                         <tr class="text-center">
                           <td>{{ $matricula->turno->nombre }}</td>
                           <td>{{ $matricula->gestion->nombre }}</td>
                           <td>{{ $matricula->nivel->nombre }}</td>
                           <td>{{ $matricula->grado->nombre }}</td>
                           <td>{{ $matricula->paralelo->nombre }}</td>
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
                    <form action="{{ url('admin/matriculaciones/'.$matriculacion->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" value="{{ $matriculacion->estudiante_id }}" name="estudiante_id" id="estudiante_id" hidden required>
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
                                                <option value="{{ $turno->id }}" {{ $turno->id == $matriculacion->turno_id ? 'selected' : '' }}>{{ $turno->nombre }}</option>
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
                                                <option value="{{ $gestion->id }}" {{ $gestion->id == $matriculacion->gestion_id ? 'selected' : '' }}>{{ $gestion->nombre }}</option>
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
                                                <option value="{{ $nivel->id }}" {{ $nivel->id == $matriculacion->nivel_id ? 'selected' : '' }}>{{ $nivel->nombre }}</option>
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
                                            @foreach($grados as $grado)
                                                <option value="{{ $grado->id }}" {{ $grado->id == $matriculacion->grado_id ? 'selected' : '' }}>{{ $grado->nombre }}</option>
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
                                            @foreach($paralelos as $paralelo)
                                                <option value="{{ $paralelo->id }}" {{ $paralelo->id == $matriculacion->paralelo_id ? 'selected' : '' }}>{{ $paralelo->nombre }}</option>
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
                                        <input type="date" name="fecha_matriculacion" value="{{ $matriculacion->fecha_matriculacion }}" id="fecha_matriculacion" class="form-control" required>
                                    </div>
                                    @error('fecha_matriculacion')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <a href="{{ url('/admin/matriculaciones') }}" class="btn btn-secondary">
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
                            $('#tabla_bd').css('display', 'none');
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
