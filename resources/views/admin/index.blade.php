@extends('adminlte::page')

@section('content_header')
    <h1><b>Bienvenido  ({{Auth::user()->roles->pluck('name')->implode(', ')}}):  </b>{{Auth::user()->name}}</h1>
    <hr>

@stop

@section('content')
<div class="row">
    @can('admin.gestiones.index')
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/gestiones.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Gestiones registrados</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_gestiones }} Gestiones
                </span>
            </div>
        </div>
    </div>
 @endcan
 @can('admin.periodos.index')
     <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/periodo.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Periodos Registrados</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_periodos }} Periodos
                </span>
            </div>
        </div>
    </div>
 @endcan

@can('admin.niveles.index')
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/nivell.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Niveles Registrados</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_niveles }} Niveles
                </span>
            </div>
        </div>
    </div>
@endcan


    @can('admin.grados.index')
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/grado.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Grados Registrados</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_grados }} Grados
                </span>
            </div>
        </div>
    </div>
    @endcan

    @can('admin.paralelos.index')
        <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/paralelo.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Paralelos Registrados</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_paralelos }} Paralelos
                </span>
            </div>
        </div>
    </div>
    @endcan

    @can('admin.turnos.index')
        <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/turno.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Turnos Registrados</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_turnos }} Turnos
                </span>
            </div>
        </div>
    </div>
    @endcan

   @can('admin.materias.index')
   <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/materias.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Materias Registradas</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_materias }} Materias
                </span>
            </div>
        </div>
    </div>
   @endcan

   @can('admin.roles.index')
       <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/roles.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Roles Registrados</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_roles }} Roles
                </span>
            </div>
        </div>
    </div>
   @endcan


  @can('admin.personal.index')
  <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/adminis.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Personal Administrativo Registrado</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_personal_admin }} Administrativos
                </span>
            </div>
        </div>
    </div>

     <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/maestro.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Personal Docente Registrado</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_personal_docente }} Docentes
                </span>
            </div>
        </div>
    </div>
  @endcan


@canany(['admin.estudiantes.index', 'admin.pagos.index'])
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/estudiante.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Estudiantes Registrados</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_estudiantes }} Estudiantes
                </span>
            </div>
        </div>
    </div>
    @endcan

    @can('admin.ppffs.index')
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/padre.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Padres Registrados</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_ppff }} Padres
                </span>
            </div>
        </div>
    </div>
    @endcan
      @can('admin.pagos.index')
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/dinero.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Pagos Registrados</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_pagos }} Pagos
                </span>
            </div>
        </div>
    </div>
    @endcan
      @canany(['admin.matriculaciones.index', 'admin.pagos.index'])
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/matri.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Matriculas Registradas</b></span>
                <span class="info-box-number" style="font-size:18pt">
                    {{ $total_matriculas }} Matriculas
                </span>
            </div>
        </div>
    </div>
    @endcan



</div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-purple">
            <div class="card-header">
                <h3 class="card-title">Total Estudiantes Matriculados por Gestion</h3>
            </div>
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Total Pagos Matriculados por Mes</h3>
            </div>
            <div class="card-body">
                <canvas id="myChart2"></canvas>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script>
        var gestiones =@json($gestionesArray);
        var matriculas =@json($datosMatriculados);
        new Chart(document.getElementById('myChart'), {
            type: 'line',
            data: {
                labels: gestiones,
                datasets: [{
                    label: 'Matriculas por gestion',
                    data: matriculas,
                    backgroundColor: 'rgba(84, 162, 235, 0.2)',
                    borderColor: 'rgba(170, 152, 295, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.6
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        var meses =@json($meses);
        var montos =@json($montos);
        new Chart(document.getElementById('myChart2'), {
            type: 'bar',
            data: {
                labels: meses,
                datasets: [{
                    label: 'Pagos por mes',
                    data: montos,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
