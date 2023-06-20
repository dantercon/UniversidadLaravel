@extends('adminlte::page')

@section('title', 'Crear_Sede')

@section('content_header')
    <h1>Crear Sede</h1>
@stop

@section('content')
    <form action="/sedes" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre"  class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Direccion</label>
            <input type="text" id="direccion" name="direccion"  class="form-control" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Rif</label>
            <input type="text" id="rif" name="rif"  class="form-control" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Director</label>
            <input type="text" id="director" name="director"  class="form-control" tabindex="4">
        </div>
        <a href="/profesor" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
