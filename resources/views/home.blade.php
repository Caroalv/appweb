@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="text-center mb-4">¡Iniciaste sesión correctamente!</h2>            
                    <hr class="my-4">

                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('alumnos.index') }}" class="btn btn-primary btn-block btn-square btn-green-hover">Ver Alumnos (select/insert)</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('profesores.index') }}" class="btn btn-primary btn-block btn-square btn-green-hover">Ver Profesores (select/insert)</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('cursos.index') }}" class="btn btn-primary btn-block btn-square btn-green-hover">Ver Cursos (select/insert)</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('notas.index') }}" class="btn btn-primary btn-block btn-square btn-green-hover">Ver Notas (select/insert)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-green-hover {
        transition: background-color 0.3s;
    }

    .btn-green-hover:hover {
        background-color: #4CAF50; /* Cambiar a verde al posarse */
    }

    .btn-square {
        border-radius: 0; /* Hacer los botones cuadrados */
    }
</style>

@endsection

