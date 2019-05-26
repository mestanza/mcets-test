@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Lista de Grupos</h3>
            </div>
            <div class="col-sm-4">
                <a class="btn btn-sm btn-success" href="{{ route('grupoUsuario.create') }}">Crear Grupo</a>
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

                <th>Accion</th>
            </tr>

            @foreach ($grupos as $grupo)
                <tr class="text-center">
                    <td><b>{{++$i}}</b></td>
                    <td>{{$grupo->nombre}}</td>

                    <td>
                        <form method="post" action="{{ route('grupoUsuario.destroy',  $grupo->id) }}">
                            
                            <a href="{{route('grupoUsuario.show',  $grupo->id)}}" class="btn btn-sm btn-success">Detalles</a>
                            <a href="{{route('grupoUsuario.edit',  $grupo->id)}}" class="btn btn-sm btn-warning">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $grupos->links() !!}
    </div>
@endsection