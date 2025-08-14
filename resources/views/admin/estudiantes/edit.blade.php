@extends('adminlte::page')

@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Editar datos del Estudiante </h1>
    <hr>
@stop

@section('content')
   <div class="row">
    <div class="col-md-12">
        <div class="card card-purple card-outline">
            <div class="card-header >
                <h3 class="card-title"> Datos del Padre del Estudiante </h3>
                <div class="card-tools">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalCreate">
                        <i class="fas fa-search"></i> Buscar Padre
                    </button>
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header bg-purple">
                                    <h5 class="modal-title" id="exampleModalLabel">Padres de Familias</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                     <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Nr</th>
                                    <th>Apellidos y Nombres</th>
                                    <th>Cedula</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Telefono</th>
                                    <th>Parentesco</th>
                                    <th>Ocupacion</th>
                                    <th>Direccions</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppffs as $ppff)
                                    <tr class="text-center">
                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                        <td>{{ $ppff->apellidos }} {{ $ppff->nombres }}</td>
                                        <td>{{ $ppff->ci }}</td>
                                        <td>{{ $ppff->fecha_nacimiento }}</td>
                                        <td>{{ $ppff->telefono }}</td>
                                        <td>{{ $ppff->parentesco }}</td>
                                        <td>{{ $ppff->ocupacion }}</td>
                                        <td>{{ $ppff->direccion }}</td>

                                        <td>
                                         <button class="btn btn-info btn-sm btn-seleccionar"
                                            data-id="{{ $ppff->id }}"
                                            data-nombres="{{ $ppff->nombres }}"
                                            data-apellidos="{{ $ppff->apellidos }}"
                                            data-ci="{{ $ppff->ci }}"
                                            data-fecha_nacimiento="{{ $ppff->fecha_nacimiento }}"
                                            data-telefono="{{ $ppff->telefono }}"
                                            data-parentesco="{{ $ppff->parentesco }}"
                                            data-ocupacion="{{ $ppff->ocupacion }}"
                                            data-direccion="{{ $ppff->direccion }}"> Seleccionar</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cerrar</button>
                                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalCreatePpff"><i class="fas fa-plus"></i> Agregar Padre  </button>
                                  <!-- Modal -->
                                <div class="modal fade" id="ModalCreatePpff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header bg-purple">
                                                   <h5 class="modal-title" id="exampleModalLabel">Registro de Un Padre</h5>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                       <span aria-hidden="true">&times;</span>
                                                         </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('/admin/estudiantes/ppff/create') }}" method="POST" >
                                                                @csrf
                                                              <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Nombres</label><b>(*)</b>
                                                                        <input type="text" class="form-control" name="nombres" placeholder ="Ingrese Nombres..." required>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Apellidos</label><b>(*)</b>
                                                                        <input type="text" class="form-control" name="apellidos" placeholder ="Ingrese Apellidos..." required>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Cedula</label><b>(*)</b>
                                                                        <input type="text" class="form-control" name="ci" placeholder ="Ingrese Cedula..." required>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Fecha de Nacimiento</label><b>(*)</b>
                                                                        <input type="date" class="form-control" name="fecha_nacimiento" placeholder ="Ingrese Fecha de Nacimiento..." required>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Telefono</label><b>(*)</b>
                                                                        <input type="text" class="form-control" name="telefono" placeholder ="Ingrese Telefono..." required>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Parentesco</label><b>(*)</b>
                                                                        <input type="text" class="form-control" name="parentesco" placeholder ="Ingrese Parentesco..." required>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Ocupacion</label><b>(*)</b>
                                                                        <input type="text" class="form-control" name="ocupacion" placeholder ="Ingrese Ocupacion..." required>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Direccion</label><b>(*)</b>
                                                                        <input type="text" class="form-control" name="direccion" placeholder ="Ingrese Direccion..." required>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                              <hr>
                                                              <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cerrar</button>
                                                                          <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Guardar</button>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </form>
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
                        <p id="parentesco">{{$estudiante->ppff->parentesco}}</p>
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
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">LLene los Datos del Estudiante en el  Formulario</h3>

                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/estudiantes/'.$estudiante->id) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <input type="text" name="ppff_id" id="ppff_id"  value ="{{$estudiante->ppff_id}}" hidden>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Fotografía</label>

                                    <input type="file" class="form-control" name="foto"
                                        placeholder="Escriba aquí..." onchange="mostrarImagen(event)" accept="image/*" >
                                    <br>
                                    <center>
                                        <img id="preview"
                                            src="{{ url($estudiante->foto) }}" style="max-width: 300px; margin-top: 10px;">
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
                                                <select name="rol" id="" class="form-control">
                                                    <option value="">Seleccione un rol...</option>
                                                    @foreach ($roles as $rol)
                                                        @if ($rol->name == 'ESTUDIANTE')
                                                         <option value="{{$rol->name}}"{{$rol->name=='ESTUDIANTE' ? 'selected' : ''}}>{{$rol->name}}</option>

                                                        @else

                                                        @endif

                                                    @endforeach

                                                </select>
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
                                                <input type="text" class="form-control" name="nombres" id="nombres" value="{{ old('nombres', $estudiante->nombres) }}" placeholder="Ingrese nombres..." required>
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
                                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ old('apellidos', $estudiante->apellidos) }}" placeholder="Ingrese apellidos..." required>
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
                                                <input type="text" class="form-control" name="ci" id="ci" value="{{ old('ci', $estudiante->ci) }}" placeholder="Ingrese Cedula" disabled>
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
                                                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento) }}" required>
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
                                                <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion', $estudiante->direccion) }}" placeholder="Ingrese dirección..." required>
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
                                                <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono', $estudiante->telefono) }}" placeholder="Ingrese telefono..." required>
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
                                                <select name="genero" id="genero" class="form-control" required>
                                                    <option value="Masculino"{{$estudiante->genero === 'masculino' ? 'selected' : ''}}>Masculino</option>
                                                    <option value="Femenino"{{$estudiante->genero === 'femenino' ? 'selected' : ''}}>Femenino</option>
                                                </select>
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
                                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $estudiante->usuario->email) }}" placeholder="Ingrese email..." required>
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
    /* Fondo transparente y sin borde en el contenedor */
    #example1_wrapper .dt-buttons {
        background-color: transparent;
        box-shadow: none;
        border: none;
        display: flex;
        justify-content: center; /* Centrar los botones */
        gap: 15px; /* Espaciado entre botones */
        margin-bottom: 15px; /* Separar botones de la tabla */
    }

    /* Estilo personalizado para los botones */
    #example1_wrapper .btn {
        color: #fff; /* Color del texto en blanco */
        border-radius: 4px; /* Bordes redondeados */
        padding: 5px 15px; /* Espaciado interno */
        font-size: 14px; /* Tamaño de fuente */
    }

    /* Colores por tipo de botón */
    .btn-danger { background-color: #dc3545; border: none; }
    .btn-success { background-color: #28a745; border: none; }
    .btn-info    { background-color: #17a2b8; border: none; }
    .btn-warning { background-color: #ffc107; color: #212529; border: none; }
    .btn-default { background-color: #6c7176; color: #212529; border: none; }
</style>
@stop

@section('js')
   <script>
    $(function () {
        $('.btn-seleccionar').click(function(){
            var nombres = $(this).data('nombres');
            var apellidos = $(this).data('apellidos');
            var ci = $(this).data('ci');
            var fecha_nacimiento = $(this).data('fecha_nacimiento');
            var telefono = $(this).data('telefono');
            var parentesco = $(this).data('parentesco');
            var ocupacion = $(this).data('ocupacion');
            var direccion = $(this).data('direccion');
            var id =$(this).data('id');

            $('#nombres').html(nombres);
            $('#apellidos').html(apellidos);
            $('#ci').html(ci);
            $('#fecha_nacimiento').html(fecha_nacimiento);
            $('#telefono').html(telefono);
            $('#parentesco').html(parentesco);
            $('#ocupacion').html(ocupacion);
            $('#direccion').html(direccion);
            $('#ppff_id').val(id);

            $('#padres').css('display', 'block');
            $('#ModalCreate').modal('hide');


        });

    $("#example1").DataTable({
        "pageLength": 5,
        "language": {
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Ppffs",
            "infoEmpty": "Mostrando 0 a 0 de 0 Ppffs",
            "infoFiltered": "(Filtrado de _MAX_ total Ppffs)",
            "lengthMenu": "Mostrar _MENU_ Ppffs",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscador",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        buttons: [
            {
                text: '<i class="fas fa-copy"></i> COPIAR',
                extend: 'copy',
                className: 'btn btn-default'
            },
            {
                text: '<i class="fas fa-file-pdf"></i> PDF',
                extend: 'pdf',
                className: 'btn btn-danger'
            },
            {
                text: '<i class="fas fa-file-csv"></i> CSV',
                extend: 'csv',
                className: 'btn btn-info'
            },
            {
                text: '<i class="fas fa-file-excel"></i> EXCEL',
                extend: 'excel',
                className: 'btn btn-success'
            },
            {
                text: '<i class="fas fa-print"></i> IMPRIMIR',
                extend: 'print',
                className: 'btn btn-warning'
            }
        ]
    }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
});
   </script>
@stop
