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

                                <!-- Inicio del script -->
                <script>
                    // Esta función se ejecuta cuando el documento HTML está completamente cargado y listo para interactuar con JavaScript.
                    $(document).ready(function() {

                        // Manejador de eventos para el campo de entrada 'alumno_nombre'.
                        $('#alumno_nombre').on('keyup', function() {
                            // Captura el valor ingresado en el campo de entrada 'alumno_nombre'.
                            var searchTerm = $(this).val();

                            // Verifica si el valor tiene al menos longitud 0 (no está vacío).
                            if (searchTerm.length >= 0) {
                                // Realiza una solicitud AJAX para buscar alumnos en el servidor.
                                $.ajax({
                                    url: "{{ route('notas.buscar_alumnos') }}", // URL de la ruta definida en Laravel para buscar alumnos.
                                    type: 'POST', // Tipo de solicitud HTTP (POST).
                                    data: {
                                        _token: "{{ csrf_token() }}", // Token CSRF para protección contra ataques CSRF.
                                        searchTerm: searchTerm // El término de búsqueda ingresado por el usuario.
                                    },
                                    success: function(response) {
                                        // Cuando la solicitud es exitosa, actualiza el contenido del elemento 'alumno_sugerencias' con la respuesta del servidor.
                                        $('#alumno_sugerencias').html(response);
                                    }
                                });
                            } else {
                                // Si el campo de entrada está vacío, borra el contenido del elemento 'alumno_sugerencias'.
                                $('#alumno_sugerencias').html('');
                            }
                        });

                        // Manejador de eventos para el campo de entrada 'curso_nombre'.
                        $('#curso_nombre').on('keyup', function() {
                            // Captura el valor ingresado en el campo de entrada 'curso_nombre'.
                            var searchTerm = $(this).val();

                            // Verifica si el valor tiene al menos longitud 0 (no está vacío).
                            if (searchTerm.length >= 0) {
                                // Realiza una solicitud AJAX para buscar cursos en el servidor.
                                $.ajax({
                                    url: "{{ route('notas.buscar_cursos') }}", // URL de la ruta definida en Laravel para buscar cursos.
                                    type: 'POST', // Tipo de solicitud HTTP (POST).
                                    data: {
                                        _token: "{{ csrf_token() }}", // Token CSRF para protección contra ataques CSRF.
                                        searchTerm: searchTerm // El término de búsqueda ingresado por el usuario.
                                    },
                                    success: function(response) {
                                        // Cuando la solicitud es exitosa, actualiza el contenido del elemento 'curso_sugerencias' con la respuesta del servidor.
                                        $('#curso_sugerencias').html(response);
                                    }
                                });
                            } else {
                                // Si el campo de entrada está vacío, borra el contenido del elemento 'curso_sugerencias'.
                                $('#curso_sugerencias').html('');
                            }
                        });

                        // Manejador de eventos para el campo de entrada 'profesor_nombre'.
                        $('#profesor_nombre').on('keyup', function() {
                            // Captura el valor ingresado en el campo de entrada 'profesor_nombre'.
                            var searchTerm = $(this).val();

                            // Verifica si el valor tiene al menos longitud 0 (no está vacío).
                            if (searchTerm.length >= 0) {
                                // Realiza una solicitud AJAX para buscar profesores en el servidor.
                                $.ajax({
                                    url: "{{ route('notas.buscar_profesores') }}", // URL de la ruta definida en Laravel para buscar profesores.
                                    type: 'POST', // Tipo de solicitud HTTP (POST).
                                    data: {
                                        _token: "{{ csrf_token() }}", // Token CSRF para protección contra ataques CSRF.
                                        searchTerm: searchTerm // El término de búsqueda ingresado por el usuario.
                                    },
                                    success: function(response) {
                                        // Cuando la solicitud es exitosa, actualiza el contenido del elemento 'profesor_sugerencias' con la respuesta del servidor.
                                        $('#profesor_sugerencias').html(response);
                                    }
                                });
                            } else {
                                // Si el campo de entrada está vacío, borra el contenido del elemento 'profesor_sugerencias'.
                                $('#profesor_sugerencias').html('');
                            }
                        });

                        // Manejadores de eventos para cuando el usuario hace clic en una sugerencia.

                        // Cuando el usuario hace clic en una sugerencia de alumno.
                        $('#alumno_sugerencias').on('click', 'li', function() {
                            // Esta línea captura el evento de clic en un elemento 'li' dentro del elemento con el ID 'alumno_sugerencias'.

                            var alumnoNombre = $(this).text();
                            // Aquí se obtiene el texto del elemento 'li' en el que se hizo clic y se almacena en la variable 'alumnoNombre'.

                            var alumnoId = $(this).data('id');
                            // Esta línea obtiene el valor del atributo 'data-id' del elemento 'li' en el que se hizo clic y lo almacena en la variable 'alumnoId'.
                            
                            $('#alumno_nombre').val(alumnoNombre);
                            // Aquí se establece el valor del campo de entrada con el ID 'alumno_nombre' con el valor de 'alumnoNombre', que es el nombre del alumno seleccionado.

                            $('#alumno_id').val(alumnoId);
                            // Esta línea establece el valor del campo de entrada con el ID 'alumno_id' con el valor de 'alumnoId', que es el ID del alumno seleccionado.

                            $('#alumno_sugerencias').html('');
                            // Finalmente, se borra el contenido del elemento con el ID 'alumno_sugerencias', lo que oculta las sugerencias después de seleccionar un alumno.
                        });

                        //-- Misma logica --
                        // Cuando el usuario hace clic en una sugerencia de curso.
                        $('#curso_sugerencias').on('click', 'li', function() {
                            var cursoNombre = $(this).text();
                            var cursoId = $(this).data('id');
                            $('#curso_nombre').val(cursoNombre);
                            $('#cursos_id').val(cursoId);
                            $('#curso_sugerencias').html('');
                        });

                        // Cuando el usuario hace clic en una sugerencia de profesor.
                        $('#profesor_sugerencias').on('click', 'li', function() {
                            var profesorNombre = $(this).text();
                            var profesorId = $(this).data('id');
                            $('#profesor_nombre').val(profesorNombre);
                            $('#profesor_id').val(profesorId);
                            $('#profesor_sugerencias').html('');
                        });
                    });
                </script>
<!-- Fin del script -->

            </div>
        </div>
    </div>

    <!-- Lista de Notas -->
    <div class="container mt-3">
        <h1>Lista de Notas</h1>
        <table id="example" class="table">
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
