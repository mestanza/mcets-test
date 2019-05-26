@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Lista de Usuarios</h3>
            </div>
            <div class="col-sm-4">
                <a class="btn btn-sm btn-success" href="{{ route('usuario.create') }}">Crear Usuario</a>
                <a class="btn btn-sm btn-primary" href="{{ route('home') }}">Regresar</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif

        <table class="table table-hover table-sm table-bordered">
            <tr class="text-center">
                <th width="30px"><b>ID</b></th>
                <th>Nombre</th>
                <th width="450px">email</th>
                <th>Accion</th>
            </tr>

            @foreach ($usuarios as $usuario)
                <tr class="text-center">
                    <td><b>{{++$i}}</b></td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>
                        <form method="post" action="{{ route('usuario.destroy',  $usuario->id) }}">
                            
                            <a href="{{route('usuario.show',  $usuario->id)}}" class="btn btn-sm btn-success">Detalles</a>
                            <a href="{{route('usuario.edit',  $usuario->id)}}" class="btn btn-sm btn-warning">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $usuarios->links() !!}
    </div>
@endsection