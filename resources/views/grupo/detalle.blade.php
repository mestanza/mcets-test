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
                <div class="card-header">{{ __('Detalle Grupo') }}</div>

                <div class="card-body">
                    <h5 class="card-title">Detalle del grupo</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Nombre del grupo: {{$detalles->nombre}}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">Fecha Creacion: {{$detalles->created_at}}</h6>
                </div>
            </div>

            <div class="col-md-12">
                <a href="{{route('grupoUsuario.index')}}" class="btn btn-sm btn-success">Regresar</a>
            </div>
        </div>
    </div>
</div>
@endsection
