@extends('adminlte::page')

@section('title', 'Record Academico')

@section('content_header')
    <h1>Record Academico</h1>
@stop

@section('content')
    <a href="record_academico/create" class="btn btn-primary mb-3">Crear</a>
    <table id="tabla_record_academico" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha de inicio</th>
                <th scope="col">Fecha Fin</th>
                <th scope="col">Porcentaje</th>
                <th scope="col">Materiales</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluaciones as $evaluacion)
                <tr>
                    <td>{{ $evaluacion->id}}</td>
                    <td>{{ $evaluacion->name}}</td>
                    <td>{{ $evaluacion->tipo}}</td>
                    <td>{{ $evaluacion->porcentaje}}</td>
                    <td>{{ $evaluacion->materiales}}</td>
                    <td>
                        <form action="{{ route ('record_academico.destroy', $evaluacion->id) }}" method="POST">
                            <a href="/record_academico/{{$evaluacion->id}}/edit" class="btn btn-info">Editar</a>
                        </form>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
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
        $(document).ready(function () {
            $('#tabla_record_academico').DataTable({
                "lengthMenu":[[5,10,50,-1], [5, 10, 50, "All" ]]
            });
        });
    </script>
@stop
