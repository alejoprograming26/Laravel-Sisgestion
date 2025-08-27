@extends('adminlte::page')

@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Listado de Asistencias De los Estudiantes</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card card-outline card-purple">
                    <div class="card-header">
                        <h2 class="card-title">
                            Asistencias Registradas =
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
                              <i class="fas fa-plus"></i> Registrar Asistencia
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #21ffc0; color: #000000;">
                                            <h4 class="modal-title" id="modalCreateLabel">Registrar Nueva Asistencia</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/admin/asistencias/create') }}" method="POST">
                                                @csrf
                                                <input type="text" name="asignacion_id" value="{{ $asignacion->id }}" hidden>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="fecha">Fecha de la Asistencia</label>
                                                            <input type="date" class="form-control" name="fecha" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="observacion">Observación (Opcional)</label>
                                                            <input type="text" class="form-control" name="observacion" rows="3"></input>
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
                                                                        <th>Asistencia</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($matriculados as $matriculado)
                                                                        <tr class="text-center">
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $matriculado->estudiante->nombres }} {{ $matriculado->estudiante->apellidos }}</td>
                                                                            <td>{{ $matriculado->estudiante->ci }}</td>
                                                                            <td>
                                                                                <input type="radio" name="estado_asistencia[{{ $matriculado->estudiante->id }}]" value="Presente" required>Presente
                                                                                <input type="radio" name="estado_asistencia[{{ $matriculado->estudiante->id }}]" value="Ausente" required>Ausente
                                                                                <input type="radio" name="estado_asistencia[{{ $matriculado->estudiante->id }}]" value="Tarde" required>Tarde
                                                                                <input type="radio" name="estado_asistencia[{{ $matriculado->estudiante->id }}]" value="Licencia" required>Licencia
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
                                                        <div class="form-group">
                                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                             <button type="submit" class="btn btn-success">Guardar </button>
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
                                    <th>Fecha Asistencia</th>
                                    <th>Observacion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asistencias as $asistencia)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $asistencia->fecha }}</td>
                                        <td>{{ $asistencia->observacion }}</td>
                                        <td>
                                            <div class="row d-flex justify-content-center">
                                                 <a href="{{ url('/admin/asistencias/create/asignacion/' ) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fas fa-list-alt"></i> Realizar Asistencia
                                                </a>

                                            </div>

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
