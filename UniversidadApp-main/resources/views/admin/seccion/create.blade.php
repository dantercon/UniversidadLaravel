@extends('adminlte::page')

@section('title', 'Crear_Seccion')

@section('content_header')
    <h1>Crear Seccion</h1>
@stop

@section('content')
    <form action="/seccion" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre"  class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <input type="text" id="matricula" name="matricula"  class="form-control" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apertura</label>
            <input type="date" id="apertura" name="apertura"  class="form-control" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cierre</label>
            <input type="date" id="cierre" name="cierre"  class="form-control" tabindex="4">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Lapso</label>
            <input type="text" id="lapso" name="lapso"  class="form-control" tabindex="5">
        </div>
        <a href="/seccion" class="btn btn-secondary" tabindex="6">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
    </form>
@stop


