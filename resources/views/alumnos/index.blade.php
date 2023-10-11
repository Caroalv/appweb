
@extends('layouts.app')

@section('content')
<<<<<<< HEAD
            <!-- Formulario para agregar nuevos alumnos en una caja -->
            <div class="card mt-3">
                <div class="card-body">
                    <h2>Agregar Alumno mediante Insert</h2>
                    <div class="container my-form">
                        <!-- Formulario para agregar nuevos profesores -->
                        <form method="POST" action="/alumnos">
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
                                <label for="fechanacimiento">Fecha de Nacimiento:</label>
                                <input type="date" name="fechanacimiento" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="direccion">Direccion:</label>
                                <input type="text" name="direccion" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="genero">Genero:</label>
                                <input type="text" name="genero" class="form-control" required>
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
                    
                            <button type="submit" class="btn btn-primary">Agregar alumno</button>
                        </form>
=======
    <!-- Formulario para agregar nuevos alumnos en una caja -->
    <div class="card mt-3">
        <div class="card-body">
            <h2>Agregar Alumno mediante Insert</h2>
            <div class="container my-form">
                <!-- Formulario para agregar nuevos profesores -->
                <form method="POST" action="/alumnos">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" required>
>>>>>>> 103a115772add18a83c3bb304fbf5e5d8b85547a
                    </div>

                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" name="apellido" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="fechanacimiento">Fecha de Nacimiento:</label>
                        <input type="date" name="fechanacimiento" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <input type="text" name="direccion" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="genero">Género:</label>
                        <select name="genero" class="form-control" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                        </select>
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

                    <button type="submit" class="btn btn-primary">Agregar alumno</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
    <h1>Lista de Alumnos con DB:: SELECT</h1>
<<<<<<< HEAD
    <table class="table" id="example">
=======
    <table id="example" class="table">
>>>>>>> 103a115772add18a83c3bb304fbf5e5d8b85547a
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Dirección</th>
                <th>Género</th>
                <th>Teléfono</th>
                <th>Corgit reo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellido }}</td>
                    <td>{{ $alumno->fechanacimiento }}</td>
                    <td>{{ $alumno->direccion }}</td>
                    <td>{{ $alumno->genero }}</td>
                    <td>{{ $alumno->telefono }}</td>
                    <td>{{ $alumno->correo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('home') }}" class="btn btn-primary">Volver a Home</a>
</div>
@endsection

