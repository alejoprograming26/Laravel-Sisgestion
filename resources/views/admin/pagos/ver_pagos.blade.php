@extends('adminlte::page')

@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">
        Pagos del Estudiante: {{ $estudiante->nombres ?? 'Nombre no disponible' }} {{ $estudiante->apellidos ?? '' }}
    </h1>
    <hr>
@endsection

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
                                <b>Pagos Realizados:</b>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                    data-target="#exampleModal{{ $matricula->id }}"><i class="fas fa-money-bill-wave"></i>
                                    Realizar Pago
                                </button>
                                <br><br>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $matricula->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="width: 700px;">
                                            <div class="modal-header" style="background-color: #aaf0d2;">
                                                <h5 class="modal-title" id="exampleModalLabel">Registrar Pago</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('admin/pagos/create') }}" method="POST">
                                                    @csrf
                                                    <input type="text" name="matriculacion_id"
                                                        value="{{ $matricula->id }}" hidden>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Monto</label><b>(*)</b>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="fas fa-money-bill-alt"></i></span>
                                                                    </div>
                                                                    <input type="decimal" class="form-control"
                                                                        name="monto" value=""
                                                                        placeholder="Escriba aquí..." required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Método de Pago</label><b>(*)</b>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="fas fa-credit-card"></i></span>
                                                                    </div>
                                                                    <select class="form-control" name="metodo_pago"
                                                                        required>
                                                                        <option value="">Seleccione un método
                                                                        </option>
                                                                        <option value="Efectivo">Efectivo</option>
                                                                        <option value="Transferencia">Transferencia
                                                                        </option>
                                                                        <option value="Tarjeta">Tarjeta</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Descripción</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="fas fa-comment-alt"></i></span>
                                                                    </div>
                                                                    <textarea class="form-control" name="descripcion" rows="3" required placeholder="Escriba aquí..."></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Fecha de Pago</label><b>(*)</b>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="fas fa-calendar-alt"></i></span>
                                                                    </div>
                                                                    <input type="date" class="form-control"
                                                                        name="fecha_pago" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered table-striped table-hover table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Nr</th>
                                            <th>Monto</th>
                                            <th>Metodo de Pago</th>
                                            <th>Descripción</th>
                                            <th>Fecha de Pago</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($matricula->pagos as $pago)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pago->monto }}</td>
                                                <td>{{ $pago->metodo_pago }}</td>
                                                <td>{{ $pago->descripcion }}</td>
                                                <td>{{ $pago->fecha_pago }}</td>
                                                <td>
                                                    <span class="badge badge-warning">{{ $pago->estado }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ url('/admin/pagos/' . $pago->id . '/comprobante') }}"
                                                        class="btn btn-warning btn-sm"><i class="fas fa-print"></i>
                                                        Comprobante
                                                    </a>
                                                    <form action="{{ url('/admin/pagos/' . $pago->id) }}"
                                                        method="post" id="miFormulario{{ $pago->id }}" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="margin: 3px"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="event.preventDefault(); eliminarPago('{{ $pago->id }}');">
                                                            <i class="fas fa-trash"></i> Eliminar
                                                        </button>
                                                    </form>
                                                    <script>
                                                        function eliminarPago(id) {
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
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


@endsection

@section('css')
    {{-- Puedes agregar estilos personalizados aquí si lo necesitas --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endsection

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@endsection
