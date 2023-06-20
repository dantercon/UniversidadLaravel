@extends('adminlte::page')

@section('title', 'Editar_Seccion')

@section('content_header')
<h1>Editar Secciones</h1>
@stop

@section('content')
<form action="/seccion/{{$seccion->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <select name="nombre" id="nombre" class="form-control" tabindex="1" value="{{$seccion->id}}">
            @foreach ($nombres as $secciones)
                @if ($secciones->id==$seccion->id)
                    <option value="{{ $secciones->nombre}}">{{$secciones->nombre}}</option>
                @endif
                @if ($secciones->id!=$seccion->id)
                    <option value="{{ $secciones->nombre}}">{{$secciones->nombre}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Matricula</label>
        <input type="text" id="matricula" name="matricula" class="form-control" tabindex="2"value="{{$seccion->matricula}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Apertura</label>
        <input type="text" id="apertura" name="apertura" class="form-control" tabindex="3"value="{{$seccion->apertura}}" disabled>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cierre</label>
        <input type="text" id="cierre" name="cierre" class="form-control" tabindex="4"value="{{$seccion->cierre}}" disabled>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Lapso</label>
        <input type="text" id="lapso" name="lapso" class="form-control" tabindex="5"value="{{$seccion->lapso_de_la_seccion}}">
    </div>
    <a href="/seccion" class="btn btn-secondary" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
