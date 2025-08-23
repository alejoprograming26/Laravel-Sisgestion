@extends('adminlte::page')


@section('content_header')
    <h1 style="font-weight: bold; font-size: 1.5rem">Permisos Para el Rol: {{ $rol->name }}</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12S">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Permisos del Rol: {{ $rol->name }} para el Sistema</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/roles/' . $rol->id ) }}" method="POST">
                        @csrf
                        <div class="row">
                            @foreach ($permisos as $modulo => $grupoPermiso)
                                <div class="col-md-4">
                                    <h4><b>{{ $modulo }}</b></h4>
                                    @foreach ($grupoPermiso as $permiso)
                                      <div class="form-check">
                                        <input type="checkbox" class="form-check-input"  name="permisos[]" value="{{ $permiso->id }}" {{ $rol->hasPermissionTo($permiso->name) ? ' checked' : '' }}>
                                        <label class="form-check-label">{{ $permiso->name }}</label>
                                      </div>
                                    @endforeach
                                    <br>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/roles') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save ml-2"></i> Guardar
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
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
