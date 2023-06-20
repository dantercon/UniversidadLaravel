@extends('adminlte::page')

@section('title', 'Profesor')

@section('content_header')
    <h1>Lista De Profesores</h1>
@stop

@section('content')
        <a href="profesor/create" class="btn btn-primary mb-3">Crear</a>
    <table id="tabla_profesor" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Cedula</th>
                <th scope="col">Telefono</th>
                <th scope="col">Direccion</th>
            <!--<th scope="col">Carrera</th>
                <th scope="col">Seccion</th>-->
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($maestros as $maestro)
                <tr>
                    <td>{{ $maestro->id}}</td>
                    <td>{{ $maestro->nombre}}</td>
                    <td>{{ $maestro->apellido}}</td>
                    <td>{{ $maestro->email}}</td>
                    <td>{{ $maestro->cedula}}</td>
                    <td>{{ $maestro->telefono}}</td>
                    <td>{{ $maestro->direccion}}</td>
                    <td>
                        <form action="{{ route ('profesor.destroy', $maestro->id) }}" method="POST">
                            <a href="/profesor/{{$maestro->id}}/edit" class="btn btn-info">Editar</a>
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
