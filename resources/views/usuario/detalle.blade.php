@extends('layouts.app')

@section('content')
<div class="container">
        @if ($message = Session::get('warning'))
            <div class="alert alert-warning">
                <p>{{$message}}</p>
            </div>
        @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detalle Usuario') }}</div>

                <div class="card-body">
                    <h5 class="card-title">Detalle del usuario</h5>
                    <img class="card-img-top rounded-circle mx-auto d-block img-thumbnail" style="width: 200px; height: 200px; background-color: #EFEFEF; margin:20px;" src="../images/{{$detalles->img}}"  alt="">
                    <h6 class="card-subtitle mb-2 text-muted">Nombre del usuario: {{$detalles->name}}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">Email: {{$detalles->email}}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">Grupo: {{($grupo->nombre)}}</h6>
                   
                </div>
            </div>

            <div class="col-md-12">
                <a href="{{route('usuario.index')}}" class="btn btn-sm btn-success">Regresar</a>
            </div>
        </div>
    </div>
</div>
@endsection
