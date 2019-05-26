@extends('layouts.app')

@section('content')

<style>
.list-group-item:hover {
    background-color: #007BFF;
    color: white;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="margin-bottom: 20px;">
                        Por favor elige una opcion del submenú para hacer pruebas
                    </div>
                    <div class="list-group">

                        {{-- @foreach ($menus as $menu)
                        <a href='{{ route($menu->ruta) }}' class="list-group-item list-group-item-action">
                            {{ ucfirst($menu->nombre) }}
                        </a>
                        @endforeach --}}

                        <a href='{{ route('usuario.index') }}' class="list-group-item list-group-item-action">
                            Persona
                        </a>
                        <a href='{{ route('grupoUsuario.index') }}' class="list-group-item list-group-item-action">
                            Grupo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
