@extends('adminlte::page')

@section('title', 'Secciones')

@section('content_header')
    <h1>Lista De Secciones</h1>
@stop

@section('content')
        <a href="seccion/create" class="btn btn-primary mb-3">Crear</a>
    <table id="tabla_secciones" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Matricula</th>
                <th scope="col">apertura</th>
                <th scope="col">Cierre</th>
                <th scope="col">Lapso</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($secciones as $seccion)
                <tr>
                    <td>{{ $seccion->id}}</td>
                    <td>{{ $seccion->nombre}}</td>
                    <td>{{ $seccion->matricula}}</td>
                    <td>{{ $seccion->apertura}}</td>
                    <td>{{ $seccion->cierre}}</td>
                    <td>{{ $seccion->lapso_de_la_seccion}}</td>
                    <td>
                        <form action="{{ route ('seccion.destroy', $seccion->id) }}" method="POST">
                            <a href="/seccion/{{$seccion->id}}/edit" class="btn btn-info">Editar</a>
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
        $(document).ready(function () {
            $('#tabla_profesor').DataTable({
                "lengthMenu":[[5,10,50,-1], [5, 10, 50, "All" ]]
            });
        });
    </script>
@stop
