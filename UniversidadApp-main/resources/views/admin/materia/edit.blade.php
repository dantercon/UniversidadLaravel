@extends('adminlte::page')

@section('title', 'Editar_Materia')

@section('content_header')
<h1>Editar Materia</h1>
@stop

@section('content')
<form action="/materia/{{$materia->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Profesor</label>
        <select name="profesor_id" id="profesor_id" class="form-control" tabindex="1" value="{{$materia->profesor_id}}">
            @foreach ($maestro as $maestros)
                @if ($maestros->id==$materia->profesor_id)
                    <option value="{{ $maestros->id}}" selected >{{$maestros->nombre}}</option>
                @endif
                @if ($maestros->id!=$materia->profesor_id)
                    <option value="{{ $maestros->id}}">{{$maestros->nombre}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Seccion</label>
        <select name="seccion_id" id="seccion_id" class="form-control" tabindex="2" value="{{$materia->seccion_id}}">
            @foreach ($seccione as $seccion)
                @if ($seccion->id==$materia->seccion_id)
                    <option value="{{ $seccion->id}}">{{$seccion->nombre}}</option>
                @endif
                @if ($seccion->id!=$materia->seccion_id)
                    <option value="{{ $seccion->id}}">{{$seccion->nombre}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" tabindex="3" value="{{$materia->nombre}}">
    </div>
    <a href="/materia" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
