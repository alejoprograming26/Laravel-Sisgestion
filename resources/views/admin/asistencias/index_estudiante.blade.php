@extends('adminlte::page')


@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Asistencias del Estudiante: {{ $estudiante->nombres }} {{ $estudiante->apellidos }}</h1>
    <hr>
@stop

@section('content')
      <div class="row">
        <div class="col-md-10">
            <div class="accordion" id="accordionExample">
                @foreach ($matriculas as $matricula)
                    <div class="card">
                        <div class="card-header" style="background-color: #ddffe2;" id="headingOne{{ $matricula->id }}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne{{ $matricula->id }}" aria-expanded="true"
                                    aria-controls="collapseOne{{ $matricula->id }}">
                                    <h5><b> Matrícula: {{ $matricula->gestion->nombre }} -
                                            {{ $matricula->turno->nombre }} - {{ $matricula->nivel->nombre }} -
                                            {{ $matricula->grado->nombre }} - "{{ $matricula->paralelo->nombre }}"
                                        </b></h5>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne{{ $matricula->id }}" class="collapse show"
                            aria-labelledby="headingOne{{ $matricula->id }}" data-parent="#accordionExample">
                            <div class="card-body">
                                <b>Materias Asignadas:</b>

                                <table class="table table-bordered table-striped table-hover table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Nr</th>
                                            <th>Docente</th>
                                            <th>Materia</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($asignaciones as $asignacion)
                                            @if($asignacion->turno_id == $matricula->turno_id &&
                                                $asignacion->gestion_id == $matricula->gestion_id &&
                                                $asignacion->nivel_id == $matricula->nivel_id &&
                                                $asignacion->grado_id == $matricula->grado_id &&
                                                $asignacion->paralelo_id == $matricula->paralelo_id)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td> {{ $asignacion->personal->nombres." ".$asignacion->personal->apellidos }}</td>
                                                <td>{{ $asignacion->materia->nombre }}</td>
                                                <td>
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ url('/admin/asistencias/detalle/asignacion/'.$asignacion->id.'/estudiante/'.$estudiante->id) }}">
                                                        <i class="fas fa-list-alt"></i> Ver Asistencias
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
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
