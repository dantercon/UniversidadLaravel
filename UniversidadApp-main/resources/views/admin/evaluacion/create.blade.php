@extends('adminlte::page')

@section('title', 'Crear_Evaluacion')

@section('content_header')
    <h1>Crear Evaluacion</h1>
@stop

@section('content')
    <form action="/evaluacion" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" id="name" name="name"  class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo</label>
            <input type="text" id="tipo" name="tipo"  class="form-control" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Porcentaje</label>
            <input type="number" id="porcentaje" name="porcentaje"  class="form-control" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Materiales</label>
            <input type="text" id="materiales" name="materiales"  class="form-control" tabindex="4">
        </div>
        <a href="/evaluacion" class="btn btn-secondary" tabindex="6">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
    </form>
@stop


