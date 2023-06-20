@extends('adminlte::page')

@section('title', 'Alumno')

@section('content_header')
    <h1>Alumno</h1>
@stop

@section('content')
    <a href="alumno/create" class="btn btn-primary mb-3">Crear</a>
    <table id="tabla_alumno" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Telefono</th>
                <th scope="col">Email</th>
                <th scope="col">Direccion</th>
                <th scope="col">Seccion</th>
                <th scope="col">Carrera</th>
                <!--<th scope="col">Materia</th>-->
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id}}</td>
                    <td>{{ $alumno->cedula}}</td>
                    <td>{{ $alumno->nombre}}</td>
                    <td>{{ $alumno->apellido}}</td>
                    <td>{{ $alumno->telefono}}</td>
                    <td>{{ $alumno->email}}</td>
                    <td>{{ $alumno->direccion}}</td>
                    <td>{{ $alumno->seccion_id}}</td>
                    <td>{{ $alumno->carrera_id}}</td>
                    <td>
                        <form action="{{ route ('alumno.destroy', $alumno->id) }}" method="POST">
                            <a href="/alumno/{{$alumno->id}}/edit" class="btn btn-info">Editar</a>
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
            $('#tabla_alumno').DataTable({
                "lengthMenu":[[5,10,50,-1], [5, 10, 50, "All" ]]
            });
        });
    </script>
@stop
