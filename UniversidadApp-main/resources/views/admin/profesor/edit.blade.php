@extends('adminlte::page')

@section('title', 'Editar_Profesor')

@section('content_header')
<h1>Editar Profesor</h1>
@stop

@section('content')
<form action="/profesor/{{$maestro->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" tabindex="1" value="{{$maestro->nombre}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Apellido</label>
        <input type="text" id="apellido" name="apellido" class="form-control" tabindex="2"value="{{$maestro->apellido}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="text" id="email" name="email" class="form-control" tabindex="3"value="{{$maestro->email}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cedula</label>
        <input type="text" id="cedula" name="cedula" class="form-control" tabindex="4"value="{{$maestro->cedula}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Telefono</label>
        <input type="text" id="telefono" name="telefono" class="form-control" tabindex="5"value="{{$maestro->telefono}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Direccion</label>
        <input type="text" id="direccion" name="direccion" class="form-control" tabindex="6"value="{{$maestro->direccion}}">
    </div>
    <a href="/profesor" class="btn btn-secondary" tabindex="7">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
