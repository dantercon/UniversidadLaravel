@extends('adminlte::page')

@section('title', 'Crear_Materia')

@section('content_header')
    <h1>Crear Materia</h1>
@stop

@section('content')
    <form action="/materia" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Profesor</label>
            <select name="profesor_id" id="profesor_id" class="form-control" tabindex="1">
                <option value="" selected disabled>--Escoja un profesor</option>
                @foreach ($maestros as $maestro)
                    <option value="{{ $maestro->id}}">{{$maestro->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Seccion</label>
            <select name="seccion_id" id="seccion_id" class="form-control" tabindex="2">
                <option value="" selected disabled>--Escoja una seccion</option>
                @foreach ($secciones as $seccion)
                    <option value="{{ $seccion->id}}">{{$seccion->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre"  class="form-control" tabindex="3">
        </div>
        <a href="/materia" class="btn btn-secondary" tabindex="4">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
