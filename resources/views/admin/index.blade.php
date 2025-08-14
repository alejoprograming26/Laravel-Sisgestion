@extends('adminlte::page')

@section('content_header')
    <h1><b>Bienvenido: </b>{{Auth::user()->name}}</h1>
    <hr>

@stop

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/grafico.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Gestiones registrados</b></span>
                <span class="info-box-number"  style="color:rgb(80, 63, 215);font-size:18pt">{{ $total_gestiones }} Gestiones</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/calendario.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Periodos Registrados</b></span>
                <span class="info-box-number"  style="color:rgb(80, 63, 215);font-size:18pt">{{ $total_periodos }} Periodos</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/birrete.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Niveles Registrados</b></span>
                <span class="info-box-number"  style="color:rgb(80, 63, 215);font-size:18pt">{{ $total_niveles }} Niveles</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/documento.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Grados Registrados</b></span>
                <span class="info-box-number"  style="color:rgb(80, 63, 215);font-size:18pt">{{ $total_grados}} Grados</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/diagrama.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Paralelos Registrados</b></span>
                <span class="info-box-number"  style="color:rgb(80, 63, 215);font-size:18pt">{{ $total_paralelos }} Paralelos</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/hogar.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Turnos Registrados</b></span>
                <span class="info-box-number"  style="color:rgb(80, 63, 215);font-size:18pt">{{ $total_turnos }} Turnos</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP"style="background-color: " >
            <img src="{{ url('/img/materia.gif') }}" width="90px" alt="">
            <div class="info-box-content" >
                <span class="info-box-text"><b>Materias Registradas</b></span>
                <span class="info-box-number"  style="color:rgb(80, 63, 215);font-size:18pt">{{ $total_materias }} Materias</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP" >
            <img src="{{ url('/img/role.gif') }}" width="90px" alt="">
            <div class="info-box-content" >
                <span class="info-box-text"><b>Roless Registrados</b></span>
                <span class="info-box-number"  style="color:rgb(80, 63, 215);font-size:18pt">{{ $total_roles }} Roles</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/admin.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Personal Administrativo Registrado</b></span>
                <span class="info-box-number"  style="color:rgb(80, 63, 215);font-size:18pt">{{ $total_personal_admin }} Administrativos</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/docente.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Personal Docente Registrado</b></span>
                <span class="info-box-number"  style="color:rgb(80, 63, 215);font-size:18pt">{{ $total_personal_docente}} Docentes</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
     <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/estudiante.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Estudiantes Registrados</b></span>
                <span class="info-box-number"  style="color:rgb(80, 63, 215);font-size:18pt">{{ $total_estudiantes }} Estudiantes</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/padre.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Padres Registrados</b></span>
                <span class="info-box-number"  style="color:rgb(80, 63, 215);font-size:18pt">{{ $total_ppff }} Padres</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
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
