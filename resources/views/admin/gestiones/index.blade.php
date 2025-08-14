@extends('adminlte::page')

@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem;">LISTADO DE GESTIONES ESCOLARES</h1>
    <hr>

    <a href="{{ url('/admin/gestiones/create') }}" class="btn btn-primary" > <i class="fas fa-plus"></i> Crear Gestion</a>


@stop

@section('content')

    <div class="row">
        @foreach ($gestiones as $gestion)
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/calendario2.gif') }}" width="90px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Gestion Educativa</b></span>
                        <span class="info-box-number"
                            style="color:rgb(80, 63, 215);font-size:18pt">{{ $gestion->nombre }}</span>
                        <div class="row">
                            <a href="{{ url('/admin/gestiones/' . $gestion->id . '/edit') }}"
                                class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i>Editar</a>
                            <form action="{{ url('/admin/gestiones/' . $gestion->id) }}" method="post"
                                id="miFormulario{{ $gestion->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="event.preventDefault(); eliminarGestion('{{ $gestion->id }}');">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>

                            <script>
                                function eliminarGestion(id) {
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
                        </div>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endforeach
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
