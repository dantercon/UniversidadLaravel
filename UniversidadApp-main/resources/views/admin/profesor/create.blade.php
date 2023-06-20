@extends('adminlte::page')

@section('title', 'Crear_Profesor')

@section('content_header')
    <h1>Crear Profesor</h1>
@stop

@section('content')
    <form action="/profesor" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Cedula</label>
            <input type="number" id="cedula" name="cedula"  class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre"  class="form-control" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellido</label>
            <input type="text" id="apellido" name="apellido"  class="form-control" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" id="email" name="email"  class="form-control" tabindex="4">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Telefono</label>
            <input type="number" id="telefono" name="telefono"  class="form-control" tabindex="5">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Direccion</label>
            <input type="text" id="direccion" name="direccion"  class="form-control" tabindex="6">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Carrera</label>
            <select name="carrera_id" id="carrera_id" class="form-control" tabindex="7" onchange="searchSecciones()">
                <option value="" selected disabled>--Escoja una carrera</option>
                @foreach ($carreras as $carrera)
                <option value="{{ $carrera->id}}">{{$carrera->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Seccion</label>
            <select name="seccion_id" id="seccion_id" class="form-control" tabindex="8">
                <option value="" selected disabled>--Escoja una sección</option>
                <!--netamente informativo-->
                <option value=""></option>
    
            </select>
        </div>
        <a href="/profesor" class="btn btn-secondary" tabindex="9">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="10">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script defer>
    function searchSecciones() {
        const selectCarrera = document.getElementById('carrera_id');
        const carreraId = selectCarrera.value; //obtenemos el valor del select en cuestion

        $.ajax({
            url: `getSecciones/${carreraId}`,
            method: 'get',
            success: function(result) {

                let bodySelect = '';
                result.forEach(element => {
                    bodySelect += `<option value = "${element.id}" > ${element.nombre} </option>`;
                });

                document.getElementById('seccion_id').innerHTML = bodySelect;
            },
           
            
        });
    }
</script>
@stop
