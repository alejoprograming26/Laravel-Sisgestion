@extends('adminlte::page')


@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Detalle de Asistencia :  Gestion:"{{$asignacion->gestion->nombre}}"/   Nivel:"{{$asignacion->nivel->nombre}}"/   Turno:"{{$asignacion->turno->nombre}}"/   Grado:"{{$asignacion->grado->nombre}}"/   Paralelo:"{{$asignacion->paralelo->nombre}}"/   Materia:"{{$asignacion->materia->nombre}}"</h1>
    <hr>
@stop

@section('content')
 <style>
   .rotate-header {
       writing-mode: vertical-rl;
       transform: rotate(180deg);
       text-align: center;
       padding: 5px
   }
</style>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card card-outline card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Asistencias Registradas</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Nr</th>
                                    <th>Docente</th>
                                    <th>Materia</th>
                                    <th>Fecha Asistencia</th>
                                    <th>Criterio</th>
                                    <th>Observacion</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asistencias as $asistencia)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$asignacion->personal->apellidos}} {{$asignacion->personal->nombres}}</td>
                                    <td>{{ $asignacion->materia->nombre}}</td>
                                    <td>{{ $asistencia->fecha }}</td>
                                    <td>
                                        @foreach ($asistencia->detallesAsistencia as $detalle)

                                                @if($detalle->estado_asistencia == 'Presente')
                                                    <span class="badge badge-success">P</span>
                                                @elseif($detalle->estado_asistencia == 'Ausente')
                                                    <span class="badge badge-danger">A</span>
                                                @elseif($detalle->estado_asistencia == 'Tarde')
                                                    <span class="badge badge-warning">T</span>
                                                @else
                                                    <span class="badge badge-secondary">L</span>
                                                @endif
                                        @endforeach
                                    </td>
                                    <td>{{$asistencia->observacion}}</td>
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
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Asignaciones",
            "infoEmpty": "Mostrando 0 a 0 de 0 Asignaciones",
            "infoFiltered": "(Filtrado de _MAX_ total Asignaciones)",
            "lengthMenu": "Mostrar _MENU_ Asignaciones",
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
