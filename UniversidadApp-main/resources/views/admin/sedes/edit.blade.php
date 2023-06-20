@extends('adminlte::page')

@section('title', 'Editar_Sede')

@section('content_header')
<h1>Editar Sede</h1>
@stop

@section('content')
<form action="/sedes/{{$sede->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" tabindex="1" value="{{$sede->nombre}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Direccion</label>
        <input type="text" id="direccion" name="direccion" class="form-control" tabindex="2"value="{{$sede->direccion}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Rif</label>
        <input type="text" id="rif" name="rif" class="form-control" tabindex="3"value="{{$sede->rif}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Director</label>
        <input type="text" id="director" name="director" class="form-control" tabindex="4"value="{{$sede->director}}">
    </div>
    <a href="/sedes" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
