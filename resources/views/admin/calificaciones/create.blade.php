@extends('adminlte::page')

@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Listado de Calificaiones De los Estudiantes</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card card-outline card-purple">
                    <div class="card-header">
                        <h2 class="card-title">
                            Calificaciones Registradas =
                            <b>
                                Gestion "{{ $asignacion->gestion->nombre }}"/
                                Nivel "{{ $asignacion->nivel->nombre }}"
                                /  Grado "{{ $asignacion->grado->nombre }}"
                                /  Paralelo "{{ $asignacion->paralelo->nombre }}"
                                /  Materia "{{ $asignacion->materia->nombre }}"
                            </b>
                        </h2>
                        <div class="card-tools">
                            <!-- Button trigger modal -->
                            <!-- Botón para abrir el modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                              <i class="fas fa-plus"></i> Registrar Calificacion
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #21ffc0; color: #000000;">
                                            <h4 class="modal-title" id="modalCreateLabel">Registrar Nueva Calificacion</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/admin/calificaciones/create') }}" method="POST">
                                                @csrf
                                                <input type="text" name="asignacion_id" value="{{ $asignacion->id }}" hidden>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Periodo de Calificación</label>
                                                            <select class="form-control" name="periodo_id" required>
                                                                <option value="" selected disabled>-- Seleccione un Periodo --</option>
                                                                @foreach ($periodos as $periodo)
                                                                    <option value="{{ $periodo->id }}">{{ $periodo->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fecha">Tipo de Calificacion</label>
                                                            <input type="text" class="form-control" name="tipo" required>
                                                        </div>
                                                    </div>
                                                 </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fecha">Fecha de la Asistencia</label>
                                                            <input type="date" class="form-control" name="fecha" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="descripcion">Descripcion (Opcional)</label>
                                                            <input type="text" class="form-control" name="descripcion" rows="3"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="estudiantes">Estudiantes</label>
                                                            <table class="table table-bordered table-striped table-hover table-sm">
                                                                <thead>
                                                                    <tr class="text-center">
                                                                        <th>Nr</th>
                                                                        <th>Estudiantes</th>
                                                                        <th>Cédula</th>
                                                                        <th>Calificacion</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($matriculados as $matriculado)
                                                                        <tr class="text-center">
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $matriculado->estudiante->nombres }} {{ $matriculado->estudiante->apellidos }}</td>
                                                                            <td>{{ $matriculado->estudiante->ci }}</td>
                                                                            <td>
                                                                               <input style="text-align: center;width: 80px;' class="form-control" name="nota[{{ $matriculado->estudiante->id }}]"
                                                                               value="{{ old('nota.' .$matriculado->estudiante->id) }}" required>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group text-right">
                                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                             <button type="submit" class="btn btn-success">Guardar</button>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Nr</th>
                                    <th>Tipo</th>
                                    <th>Fecha Calificacion</th>
                                    <th>Periodo</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calificaciones as $calificacion)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $calificacion->tipo }}</td>
                                        <td>{{ $calificacion->fecha }}</td>
                                        <td>{{ $calificacion->periodo->nombre }}</td>
                                        <td>{{ $calificacion->descripcion }}</td>
                                        <td>
                                              <!-- Ver -->
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVerC{{ $calificacion->id }}">
                                                    <i class="fas fa-eye"></i> Ver
                                                </button>

                                                <!-- Modal Ver asistencias-->
                                                <div class="modal fade" id="modalVerC{{ $calificacion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #17a2b8; color: #ffffff;">
                                                                <h3 class="modal-title" id="exampleModalLabel">Detalle de la Calificación</h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Periodo de Calificación</label>
                                                           <p> {{ $calificacion->periodo->nombre }} </p>
                                                        </div>
                                                    </div>
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fecha">Tipo de Calificacion</label>
                                                           <p> {{ $calificacion->tipo }} </p>
                                                        </div>
                                                    </div>
                                                 </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fecha">Fecha de la Asistencia</label>
                                                            <p> {{ $calificacion->fecha }} </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="descripcion">Descripcion</label>
                                                           <p> {{ $calificacion->descripcion }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="estudiantes">Estudiantes</label>
                                                            <table class="table table-bordered table-striped table-hover table-sm">
                                                                <thead>
                                                                    <tr class="text-center">
                                                                        <th>Nr</th>
                                                                        <th>Estudiantes</th>
                                                                        <th>Cédula</th>
                                                                        <th>Calificacion</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($calificacion->detalleCalificaciones as $detalle)
                                                                        <tr class="text-center">
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $detalle->estudiante->nombres }} {{ $detalle->estudiante->apellidos }}</td>
                                                                            <td>{{ $detalle->estudiante->ci }}</td>
                                                                            <td>
                                                                              {{ $detalle->nota ?? 'N/A' }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Editar -->
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEditar{{ $calificacion->id }}">
                                    <i class="fas fa-eye"></i> Editar
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modalEditar{{ $calificacion->id }}" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #21ffc0; color: #000000;">
                                                <h4 class="modal-title" id="modalEditLabel">Editar Calificacion</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/calificaciones/'.$calificacion->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="text" name="asignacion_id" value="{{ $asignacion->id }}" hidden>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Periodo de Calificación</label>
                                                                <select class="form-control" name="periodo_id" required>
                                                                    <option value="" selected disabled>-- Seleccione un Periodo --</option>
                                                                    @foreach ($periodos as $periodo)
                                                                        <option value="{{ $periodo->id }}"{{ $calificacion->periodo_id == $periodo->id ? 'selected' : '' }}>{{ $periodo->nombre }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="fecha">Tipo de Calificacion</label>
                                                                <input type="text" value="{{ $calificacion->tipo }}" class="form-control" name="tipo" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="fecha">Fecha de la Asistencia</label>
                                                                <input type="date" value="{{ $calificacion->fecha }}" class="form-control" name="fecha" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="descripcion">Descripcion (Opcional)</label>
                                                                <input type="text" value="{{ $calificacion->descripcion }}" class="form-control" name="descripcion" rows="3"></input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="estudiantes">Estudiantes</label>
                                                                <table class="table table-bordered table-striped table-hover table-sm">
                                                                    <thead>
                                                                        <tr class="text-center">
                                                                            <th>Nr</th>
                                                                            <th>Estudiantes</th>
                                                                            <th>Cédula</th>
                                                                            <th>Calificacion</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($calificacion->detalleCalificaciones as $detalle)
                                                                            <tr class="text-center">
                                                                                <td>{{ $loop->iteration }}</td>
                                                                                <td>{{ $detalle->estudiante->nombres }} {{ $detalle->estudiante->apellidos }}</td>
                                                                                <td>{{ $detalle->estudiante->ci }}</td>
                                                                                <td>
                                                                                    <input style="text-align: center;width: 80px;"  name="nota[{{ $detalle->estudiante->id }}]"
                                                                                    value="{{ old('nota.' .$detalle->estudiante->id, $detalle->nota) }}" required>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group text-right">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-success">Actualizar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                <!-- Eliminar -->
                                                <form action="{{ url('/admin/calificaciones/' . $calificacion->id) }}" method="post" id="miFormulario{{ $calificacion->id }}" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); eliminarPeriodo('{{ $calificacion->id }}');">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                            <script>
                                                function eliminarPeriodo(id) {
                                                    Swal.fire({
                                                        title: '¿Desea eliminar este registro?',
                                                        text: '',
                                                        icon: 'question',
                                                        showDenyButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        confirmButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('miFormulario' + id).submit();
                                                        }
                                                    });
                                                }
                                            </script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
    $("#example1").DataTable({
        "pageLength": 10,
        "language": {
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Asistencias",
            "infoEmpty": "Mostrando 0 a 0 de 0 Asistencias",
            "infoFiltered": "(Filtrado de _MAX_ total Asistencias)",
            "lengthMenu": "Mostrar _MENU_ Asistencias",
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
