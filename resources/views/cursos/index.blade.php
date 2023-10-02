@extends('layouts.app')

@section('content')
    <!-- Formulario para agregar nuevos cursos en una caja -->
    <div class="card mt-3">
        <div class="card-body">
            <h2>Agregar curso mediante Insert</h2>
            <div class="container my-form">
                <!-- Formulario para agregar nuevos cursos -->
                <form method="POST" action="{{ route('cursos.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nombrecurso">Nombre del Curso:</label>
                        <input type="text" name="nombrecurso" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="año">Año:</label>
                        <input type="text" name="año" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="ciclo">Ciclo:</label>
                        <input type="text" name="ciclo" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="profesor_id">Profesor:</label>
                        <input type="text" name="profesor_nombre" id="profesor_nombre" class="form-control" required>
                        <ul id="sugerencias"></ul> <!-- Aquí se mostrarán las sugerencias -->
                        <input type="hidden" name="profesor_id" id="profesor_id" value="">
                    </div>
                                      
                    <button type="submit" class="btn btn-primary">Agregar curso</button>
                </form>

                <!-- script-->
                <script>
                    // Esta función se ejecuta cuando el documento HTML se ha cargado completamente
                    $(document).ready(function() {
                        // Selecciona el elemento con el id 'profesor_nombre' y asigna una función para el evento 'keyup' (cuando se suelta una tecla)
                        $('#profesor_nombre').on('keyup', function() {
                            // Obtiene el valor del campo de texto con id 'profesor_nombre'
                            var searchTerm = $(this).val();
                            // Verifica si la longitud del valor es mayor o igual a 0 (siempre es cierto, puedes cambiarlo si es necesario)
                            if (searchTerm.length >= 0) {
                                // Realiza una solicitud AJAX al servidor
                                $.ajax({
                                    // URL a la que se enviará la solicitud (ruta para buscar profesores)
                                    url: "{{ route('cursos.buscar_profesores') }}",
                                    // Tipo de solicitud (POST en este caso)
                                    type: 'POST',
                                    // Datos que se enviarán al servidor, incluyendo el token CSRF y el término de búsqueda
                                    data: {
                                        _token: "{{ csrf_token() }}", // Token CSRF para protección contra ataques CSRF
                                        searchTerm: searchTerm // Término de búsqueda ingresado por el usuario
                                    },
                                    // Función que se ejecuta cuando la solicitud es exitosa
                                    success: function(response) {
                                        // Inserta la respuesta del servidor (las sugerencias) en la lista con id 'sugerencias'
                                        $('#sugerencias').html(response);
                                    }
                                });
                            } else {
                                // Si el término de búsqueda es corto, vacía la lista de sugerencias
                                $('#sugerencias').html('');
                            }
                        });

                        // Maneja la selección de un profesor de la lista de sugerencias
                        $('#sugerencias').on('click', 'li', function() {
                            // Obtiene el nombre del profesor desde el elemento de la lista clicado
                            var profesorNombre = $(this).text();
                            // Obtiene el ID del profesor desde el atributo 'data-id' del elemento de la lista
                            var profesorId = $(this).data('id');
                            // Llena el campo de texto 'profesor_nombre' con el nombre del profesor seleccionado
                            $('#profesor_nombre').val(profesorNombre);
                            // Asigna el ID del profesor al campo oculto 'profesor_id' (para enviarlo con el formulario)
                            $('#profesor_id').val(profesorId);
                            // Limpia la lista de sugerencias después de la selección
                            $('#sugerencias').html('');
                        });
                    });
                </script>

            </div>
        </div>
    </div>

    <!-- Lista de cursos -->
    <div class="container mt-3">
        <h1>Lista de Cursos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre del Curso</th>
                    <th>Año</th>
                    <th>Ciclo</th>
                    <th>Profesor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td>{{ $curso->nombrecurso }}</td>
                        <td>{{ $curso->año }}</td>
                        <td>{{ $curso->ciclo }}</td>
                        <td>{{ $curso->nombre_profesor }} {{ $curso->apellido_profesor }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-primary">Volver a Home</a>
    </div>
@endsection
