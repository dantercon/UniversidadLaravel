@extends('adminlte::page')

@section('title', 'Sede')

@section('content_header')
    <h1>Lista De Sedes</h1>
@stop

@section('content')
        <a href="sedes/create" class="btn btn-primary mb-3">Crear</a>
    <table id="tabla_sedes" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Direccion</th>
                <th scope="col">Rif</th>
                <th scope="col">Director</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sedes as $sede)
                <tr>
                    <td>{{ $sede->id}}</td>
                    <td>{{ $sede->nombre}}</td>
                    <td>{{ $sede->direccion}}</td>
                    <td>{{ $sede->rif}}</td>
                    <td>{{ $sede->director}}</td>
                    <td>
                        <form action="{{ route ('sedes.destroy', $sede->id) }}" method="POST">
                            <a href="/sedes/{{$sede->id}}/edit" class="btn btn-info">Editar</a>
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
            $('#tabla_sedes').DataTable({
                "lengthMenu":[[5,10,50,-1], [5, 10, 50, "All" ]]
            });
        });
    </script>
@stop
