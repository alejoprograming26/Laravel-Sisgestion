@extends('adminlte::page')

@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Listado de Grados</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="col-md-12">
                <div class="card card-outline card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Grados Registrados</h3>

                        <div class="card-tools">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalcreate">
                                <i class="fas fa-plus"></i> Crear Grado
                            </button>


                            <!-- Modal -->
                            <div class="modal fade" id="Modalcreate" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #7f1ed8; color: white;">
                                            <h5 class="modal-title" id="exampleModalLabel">Registro de Grado</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('admin/grados/create') }}" method="POST">
                                                @csrf
                                                  <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Niveles</label><b>(*)</b>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-layer-group"></i></span>
                                                                </div>
                                                                <select class="form-control" name="nivel_id_create" id="nivel_id_create" required>
                                                                    <option value="">Seleccione un Nivel</option>
                                                                    @foreach ($niveles as $nivel)
                                                                        <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error('nivel_id_create')
                                                                <small style="color: red">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Nombre del Grado</label><b>(*)</b>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-layer-group"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                    name="nombre_create" value="{{ old('nombre_create') }}"
                                                                    placeholder="Escriba aquí..." required>
                                                            </div>
                                                            @error('nombre_create')
                                                                <small style="color: red">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Nr</th>
                                    <th>Nivel</th>
                                    <th>Grado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                  @foreach ($niveles as $nivel)
                                    <tr class="text-center">
                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                        <td>{{ $nivel->nombre }}</td>
                                        <td>

                                                @foreach ($nivel->grados as $grado)
                                                    <span class="btn btn-warning btn-sm btn-block">{{ $grado->nombre }}</span>
                                                @endforeach

                                        </td>
                                        <td>
                                         @foreach ($nivel->grados as $grado)
                                          <div class="row d-flex justify-content-center">
                                                <button type="button" style="margin: 3px" class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#ModalUpdate{{ $grado->id }}">
                                                    <i class="fas fa-layer-group"></i> Editar
                                                </button>
                                                <form action="{{ url('/admin/grados/' . $grado->id) }}" method="post"
                                                    id="miFormulario{{ $grado->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="margin: 3px" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); eliminarPeriodo('{{ $grado->id }}');">
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

                                            <div class="modal fade" id="ModalUpdate{{ $grado->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header"
                                                            style="background-color: #00dc97; color: rgb(0, 0, 0);">
                                                            <h5 class="modal-title" id="exampleModalLabel">Editar Grado
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('admin/grados/' . $grado->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                 <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Niveles</label><b>(*)</b>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-layer-group"></i></span>
                                                                </div>
                                                                <select class="form-control" name="nivel_id" required id="nivel_id">
                                                                    <option value="">Seleccione un Nivel</option>
                                                                    @foreach ($niveles as $nivel)
                                                                        <option value="{{ $nivel->id }}"{{ $nivel->id == $grado->nivel_id ? ' selected' : '' }}>{{ $nivel->nombre }}
                                                                        </option>
                                                                    @endforeach
                                                                    </select>
                                                            </div>
                                                            @error('nivel_id')
                                                                <small style="color: red">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nombre del Grado
                                                                            </label><b>(*)</b>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-layer-group"></i></span>
                                                                                </div>
                                                                                <input type="text" class="form-control"
                                                                                    name="nombre"
                                                                                    value="{{ old('nombre', $grado->nombre) }}"
                                                                                    placeholder="Escriba aquí..." required>
                                                                            </div>
                                                                            @error('nombre')
                                                                                <small
                                                                                    style="color: red">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancelar</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Actualizar</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                                @endforeach
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
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                @if (session('modal_id'))
                    $('#ModalUpdate{{ session('modal_id') }}').modal('show');
                @else
                    $('#Modalcreate').modal('show');
                @endif
            });
        </script>
    @endif
@stop
