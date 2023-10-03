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
                        <label for="nota1">Nota 1:</label>
                        <input type="text" name="nota1" class="form-control" required>
                    </div>           
                    <div class="form-group">
                        <label for="nota2">Nota 2:</label>
                        <input type="text" name="nota2" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nota3">Nota 3:</label>
                        <input type="text" name="nota3" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nota4">Nota 4:</label>
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
                        <label for="alumno_id">Alumno:</label>
                        <input type="text" name="alumno_nombre" id="alumno_nombre" class="form-control" required>
                        <ul id="alumno_sugerencias"></ul>
                        <input type="hidden" name="alumno_id" id="alumno_id" value="">
                    </div>
                    <div class="form-group">
                        <label for="cursos_id">Curso:</label>
                        <input type="text" name="curso_nombre" id="curso_nombre" class="form-control" required>
                        <ul id="curso_sugerencias"></ul>
                        <input type="hidden" name="cursos_id" id="cursos_id" value="">
                    </div>
                    <div class="form-group">
                        <label for="profesor_id">Profesor:</label>
                        <input type="text" name="profesor_nombre" id="profesor_nombre" class="form-control" required>
                        <ul id="profesor_sugerencias"></ul>
                        <input type="hidden" name="profesor_id" id="profesor_id" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar nota</button>
                </form>

                <!-- script-->
                <script>
                    $(document).ready(function() {
                        $('#alumno_nombre').on('keyup', function() {
                            var searchTerm = $(this).val();
                            if (searchTerm.length >= 0) {
                                $.ajax({
                                    url: "{{ route('notas.buscar_alumnos') }}",
                                    type: 'POST',
                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        searchTerm: searchTerm
                                    },
                                    success: function(response) {
                                        $('#alumno_sugerencias').html(response);
                                    }
                                });
                            } else {
                                $('#alumno_sugerencias').html('');
                            }
                        });

                        $('#curso_nombre').on('keyup', function() {
                            var searchTerm = $(this).val();
                            if (searchTerm.length >= 0) {
                                $.ajax({
                                    url: "{{ route('notas.buscar_cursos') }}",
                                    type: 'POST',
                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        searchTerm: searchTerm
                                    },
                                    success: function(response) {
                                        $('#curso_sugerencias').html(response);
                                    }
                                });
                            } else {
                                $('#curso_sugerencias').html('');
                            }
                        });

                        $('#profesor_nombre').on('keyup', function() {
                            var searchTerm = $(this).val();
                            if (searchTerm.length >= 0) {
                                $.ajax({
                                    url: "{{ route('notas.buscar_profesores') }}",
                                    type: 'POST',
                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        searchTerm: searchTerm
                                    },
                                    success: function(response) {
                                        $('#profesor_sugerencias').html(response);
                                    }
                                });
                            } else {
                                $('#profesor_sugerencias').html('');
                            }
                        });

                        $('#alumno_sugerencias').on('click', 'li', function() {
                            var alumnoNombre = $(this).text();
                            var alumnoId = $(this).data('id');
                            $('#alumno_nombre').val(alumnoNombre);
                            $('#alumno_id').val(alumnoId);
                            $('#alumno_sugerencias').html('');
                        });

                        $('#curso_sugerencias').on('click', 'li', function() {
                            var cursoNombre = $(this).text();
                            var cursoId = $(this).data('id');
                            $('#curso_nombre').val(cursoNombre);
                            $('#cursos_id').val(cursoId);
                            $('#curso_sugerencias').html('');
                        });

                        $('#profesor_sugerencias').on('click', 'li', function() {
                            var profesorNombre = $(this).text();
                            var profesorId = $(this).data('id');
                            $('#profesor_nombre').val(profesorNombre);
                            $('#profesor_id').val(profesorId);
                            $('#profesor_sugerencias').html('');
                        });
                    });
                </script>
            </div>
        </div>
    </div>

    <!-- Lista de Notas -->
    <div class="container mt-3">
        <h1>Lista de Notas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Nota 4</th>
                    <th>Promedio</th>
                    <th>Parcial</th>
                    <th>Alumno</th>
                    <th>Curso</th>
                    <th>Profesor</th>
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
                        <td>{{ $nota->nombre }} {{ $nota->apellido }}</td>
                        <td>{{ $nota->nombrecurso }}</td>
                        <td>{{ $nota->nombre_profesor }} {{ $nota->apellido_profesor }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
