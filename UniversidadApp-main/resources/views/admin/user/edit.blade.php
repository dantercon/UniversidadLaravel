@extends('adminlte::page')

@section('title', 'Editar_Usuario')

@section('content_header')
<h1>Editar Usuario</h1>
@stop

@section('content')
{!! Form::model($usuario, ['route' => ['user.update', $usuario], 'method' => 'put']) !!}
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="name" name="name" class="form-control" value="{{$usuario->name}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="text" id="email" name="email" class="form-control" value="{{$usuario->email}}">
    </div>
    <h2 class="h5"> Roles</h2>
    @foreach ($rol as $roles)
        <div>
            @if ($roles->id==$usuario->rol_id)
                <label>
                    {!! Form::checkbox('roles', $roles->id, $usuario->rol_id, ['class' => 'mr-1']) !!}
                    {{$roles->name}}
                </label> 
            @endif
            @if ($roles->id!=$usuario->rol_id)
            <label>{!! Form::checkbox('roles', $roles->id, null, ['class' => 'mr-1']) !!}
                {{$roles->name}} </label>
            @endif
        </div>
    @endforeach
    
    <a href="/user" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
{!! Form::close() !!}

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

