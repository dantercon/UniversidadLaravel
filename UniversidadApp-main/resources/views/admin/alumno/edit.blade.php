@extends('adminlte::page')

@section('title', 'Editar_Alumno')

@section('content_header')
<h1>Editar Alumno</h1>
@stop

@section('content')
<form action="/alumno/{{$alumno->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Cedula</label>
        <input type="text" id="cedula" name="cedula" class="form-control" tabindex="1" value="{{$alumno->cedula}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" tabindex="2" value="{{$alumno->nombre}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Apellido</label>
        <input type="text" id="apellido" name="apellido" class="form-control" tabindex="3" value="{{$alumno->apellido}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Telefono</label>
        <input type="text" id="tlfn" name="tlfn" class="form-control" tabindex="4" value="{{$alumno->telefono}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="text" id="email" name="email" class="form-control" tabindex="5" value="{{$alumno->email}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Direccion</label>
        <input type="text" id="direccion" name="direccion" class="form-control" tabindex="6" value="{{$alumno->direccion}}">
    </div>
    <a href="/alumno" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
