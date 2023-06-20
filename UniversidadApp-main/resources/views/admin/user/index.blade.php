@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
    <h1>Usuario</h1>
@stop

@section('content')
    <a href="user/create" class="btn btn-primary mb-3">Crear</a>
    <table id="tabla_usuario" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Accion</th>
                <th scope="col">Estatus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id}}</td>
                    <td>{{ $usuario->name}}</td>
                    <td>{{ $usuario->email}}</td>
                    <td>
                        <form action="{{ route ('user.destroy', $usuario->id) }}" method="POST">
                            <a href="/user/{{$usuario->id}}/edit" class="btn btn-info">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                        <td> 
                            <form action="{{ route('user.cambiarEstado', ['id' => $usuario->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm {{ $usuario->status ? 'btn-danger' : 'btn-success' }}">
                                    {{ $usuario->status ? 'Desactivar' : 'Activar' }}
                                </button>
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
            $('#tabla_usuario').DataTable({
                "lengthMenu":[[5,10,50,-1], [5, 10, 50, "All" ]]
            });
        });
    </script>
@stop
