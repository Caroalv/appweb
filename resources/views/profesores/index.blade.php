@extends('layouts.app')

@section('content')
            <!-- Formulario para agregar nuevos profesores en una caja -->
            <div class="card mt-3">
                <div class="card-body">
                    <h2>Agregar Profesor mediante Insert</h2>
                    <div class="container my-form">
                        <!-- Formulario para agregar nuevos profesores -->
                        <form method="POST" action="/profesores">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                    
                            <div class="form-group">
                                <label for="apellido">Apellido:</label>
                                <input type="text" name="apellido" class="form-control" required>
                            </div>
                    
                            <div class="form-group">
                                <label for="dui">DUI:</label>
                                <input type="text" name="dui" class="form-control" required>
                            </div>
                    
                            <div class="form-group">
                                <label for="telefono">Teléfono:</label>
                                <input type="text" name="telefono" class="form-control" required>
                            </div>
                    
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <input type="email" name="correo" class="form-control" required>
                            </div>
                    
                            <div class="form-group">
                                <label for="clave">Clave:</label>
                                <input type="password" name="clave" class="form-control" required>
                            </div>
                    
                            <button type="submit" class="btn btn-primary">Agregar Profesor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h1>Lista de Profesores con DB:: SELECT</h1>

    <!-- Mostrar la lista de profesores en una tabla -->
    <table class="table" id="example">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DUI</th>
                <th>Teléfono</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profesores as $profesor)
                <tr>
                    <td>{{ $profesor->nombre }}</td>
                    <td>{{ $profesor->apellido }}</td>
                    <td>{{ $profesor->dui }}</td>
                    <td>{{ $profesor->telefono }}</td>
                    <td>{{ $profesor->correo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="btn btn-primary">Volver a Home</a>
</div>
@endsection
