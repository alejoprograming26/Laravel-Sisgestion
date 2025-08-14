@extends('adminlte::page')


@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Listado del Personal {{$tipo}} </h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card card-outline card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Personal {{$tipo}} Registrado</h3>

                        <div class="card-tools">
                            <a href="{{ url('/admin/personal/create/'.$tipo) }}" class="btn btn-primary ">
                                <i class="fas fa-plus"></i> Agregar Personal
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Nr</th>
                                    <th>Rol</th>
                                    <th>Apellidos y Nombres</th>
                                    <th>Correo</th>
                                    <th>Cedula</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Telefono</th>
                                    <th>Profesion</th>
                                    <th>Foto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personals as $personal)
                                    <tr class="text-center">
                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                        <td>{{ $personal->usuario->roles->pluck('name')->implode(', ')}}</td>
                                        <td>{{ $personal->apellidos }} {{ $personal->nombres }}</td>
                                        <td>{{ $personal->usuario->email }}</td>
                                        <td>{{ $personal->ci }}</td>
                                        <td>{{ $personal->fecha_nacimiento }}</td>
                                        <td>{{ $personal->telefono }}</td>
                                        <td>{{ $personal->profesion }}</td>
                                        <td>
                                            <img src="{{ url($personal->foto) }}" alt="Imagen" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                                        </td>

                                        <td>
                                            <div class="row d-flex justify-content-center">
                                                 <a href="{{ url('/admin/personal/' . $personal->id . '/formaciones') }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-list"></i> Formaciones
                                                </a>
                                                 <a href="{{ url('/admin/personal/show/' . $personal->id ) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i> Ver
                                                </a>
                                                <a href="{{ url('/admin/personal/' . $personal->id . '/edit') }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fas fa-pencil-alt"></i> Editar
                                                </a>
                                                <form action="{{ url('/admin/personal/' . $personal->id) }}" method="post"
                                                    id="miFormulario{{ $personal->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); eliminarPersonal('{{ $personal->id }}');">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                            </div>

                                            <script>
                                                function eliminarPersonal(id) {
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
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Personal",
            "infoEmpty": "Mostrando 0 a 0 de 0 Personal",
            "infoFiltered": "(Filtrado de _MAX_ total Personal)",
            "lengthMenu": "Mostrar _MENU_ Personal",
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
