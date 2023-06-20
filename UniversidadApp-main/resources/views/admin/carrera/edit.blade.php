@extends('adminlte::page')

@section('title', 'Editar_Carrera')

@section('content_header')
<h1>Editar Carrera</h1>
@stop

@section('content')
<form action="/carrera/{{$carrera->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Codigo</label>
        <input type="text" id="codigo" name="codigo" class="form-control" tabindex="1" value="{{$carrera->codigo}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" tabindex="2" value="{{$carrera->nombre}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Apertura</label>
        <input type="text" id="apertura" name="apertura" class="form-control" tabindex="3" value="{{$carrera->apertura}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cierre</label>
        <input type="text" id="cierre" name="cierre" class="form-control" tabindex="4" value="{{$carrera->cierre}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Reseña</label>
        <input type="text" id="resena" name="resena" class="form-control" tabindex="5" value="{{$carrera->resena}}">
    </div>
    <a href="/alumno" class="btn btn-secondary" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
