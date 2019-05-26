@extends('layouts.app')

@section('content')
<div class="container">
        @if ($message = Session::get('warning'))
            <div class="alert alert-warning">
                <p>{{$message}}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Se ha presentdo un error en el registro</strong>
                <ul>
                    @foreach ($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Grupo') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('grupoUsuario.store') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Grupo') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

     

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                            
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar Grupo') }}
                                </button>

                                <a class="btn btn-success" href="{{route('usuario.index')}}">
                                        {{ __('Regresar') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
