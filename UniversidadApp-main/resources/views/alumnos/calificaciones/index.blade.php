@extends('adminlte::page')

@section('title', 'Alumno')

@section('content_header')
    <h1> </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h5>Nombre:  {{ $alumno->alumno_nombre }} {{ $alumno->alumno_apellido }}</h5>
            <h5>Cédula: {{ $alumno->alumno_cedula }}</h5>
        </div>
        <div class="col-md-4">
            @foreach ($materias as $materia)
            <h5>Seccion: {{ $materia->seccion_nombre }}</h5>
            @endforeach
            <h5>Programa: {{ $alumno->carrera_nombre }}</h5>
        </div>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Materia</label>
        <select name="materia_id" id="materia_id" class="form-control">
            <option value="" selected disabled>--Escoja una seccion</option>
            @foreach ($calificaciones as $m)
                <option value="{{ $m->id}}">{{$m->nombre}}</option>
            @endforeach
        </select>
        
    </div>
  
    

   
        
    


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    
@stop


@foreach ($materias as $materia)
 <!--<li> - Materia: {{ $materia->materia_nombre }} - Profesor: {{ $materia->profesor_nombre }}</li>-->
@endforeach