@extends('adminlte::page')

@section('title', 'Crear_Usuario')

@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')
    {{ Form::open( array('url' => 'user'))}}
    @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" id="name" name="name"  class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" id="email" name="email"  class="form-control" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control" tabindex="4">
        </div>
        <h2 class="h5"> Roles</h2>
        @foreach ($roles as $role)
            <div>
                <label>
                    {!! Form::checkbox('roles', $role->id, null, ['class' => 'mr-1']) !!}
                    {{$role->name}}
                </label>
            </div>
        @endforeach

        <a href="/user" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
        {{ Form::close() }}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
