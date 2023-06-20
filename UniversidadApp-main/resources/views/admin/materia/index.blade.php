@extends('adminlte::page')

@section('title', 'Materia')

@section('content_header')
<h1>Materia</h1>
@stop

@section('content')
<a href="materia/create" class="btn btn-primary mb-3">Crear</a>
<table id="tabla_materia" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Profesor</th>
            <th scope="col">Seccion</th>
            <th scope="col">Nombre</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($materias as $materia)
        <tr>
            <td>{{ $materia->id}}</td>
            <td>{{ $materia->profesor_id}}</td>
            <td>{{ $materia->seccion_id}}</td>
            <td>{{ $materia->nombre}}</td>
            <td>
                <form action="{{ route ('materia.destroy', $materia->id) }}" method="POST">
                    <a href="/materia/{{$materia->id}}/edit" class="btn btn-info">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabla_materia').DataTable({
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "All"]
            ]
        });
    });
</script>
@stop
