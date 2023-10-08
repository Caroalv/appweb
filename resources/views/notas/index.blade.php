@extends('layouts.app')


@section('content')
            <!-- Formulario para agregar nuevas notas en una caja -->
            <div class="card mt-3">
                <div class="card-body">
                    <h2>Agregar notas mediante Insert</h2>
                    <div class="container my-form">
                        <!-- Formulario para agregar nuevas notas -->
                        <form method="POST" action="/notas">
                            @csrf
                            <div class="form-group">
                                <label for="nota1">Ingrese la nota 1:</label>
                                <input type="text" name="nota1" class="form-control" required>
                            </div>           
                            <div class="form-group">
                                <label for="nota2">Ingrese la nota 2:</label>
                                <input type="text" name="nota2" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nota3">Ingrese la nota 3:</label>
                                <input type="text" name="nota3" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nota4">Ingrese la nota 4:</label>
                                <input type="text" name="nota4" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="promedio">Promedio:</label>
                                <input type="text" name="promedio" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="parcial">Parcial:</label>
                                <input type="text" name="parcial" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="alumno_id">Id alumno:</label>
                                <input type="text" name="alumno_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cursos_id">Id curso:</label>
                                <input type="text" name="cursos_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="profesor_id">Id profesor:</label>
                                <input type="text" name="profesor_id" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar nota</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <h1>Lista de Notas con DB:: SELECT</h1>
    <table class="table" id="example">
        <thead>
            <tr>
                <th>Nota1</th>
                <th>Nota2</th>
                <th>Nota3</th>
                <th>Nota4</th>
                <th>promedio</th>
                <th>parcial</th>
                <th>id alumno</th>
                <th>id_curso</th>
                <th>id_profesor</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
                <tr>
                    <td>{{ $nota->nota1 }}</td>
                    <td>{{ $nota->nota2 }}</td>
                    <td>{{ $nota->nota3 }}</td>
                    <td>{{ $nota->nota4 }}</td>
                    <td>{{ $nota->promedio }}</td>
                    <td>{{ $nota->parcial }}</td>
                    <td>{{ $nota->alumno_id }}</td>
                    <td>{{ $nota->cursos_id }}</td>
                    <td>{{ $nota->profesor_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('home') }}" class="btn btn-primary">Volver a Home</a>
</div>
@endsection
