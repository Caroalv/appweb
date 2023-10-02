<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Curso;
use App\Models\Profesor;

class CursoController extends Controller
{
    // Método para mostrar la vista de cursos con los nombres de los profesores
    public function index()
    {
        // Obtener la lista de cursos con los nombres de los profesores utilizando SQL raw
        $cursos = DB::select('SELECT c.*, p.nombre AS nombre_profesor, p.apellido AS apellido_profesor FROM cursos c
            JOIN profesor p ON c.profesor_id = p.id');

        // Obtener la lista de todos los profesores para la lista desplegable
        $profesores = Profesor::all();

        // Retornar la vista 'cursos.index' con los datos de los cursos y profesores
        return view('cursos.index', ['cursos' => $cursos, 'profesores' => $profesores]);
    }

    // Método para almacenar un nuevo curso en la base de datos
    public function store(Request $request)
    {
        // Validar y obtener los datos del formulario
        $data = $request->validate([
            'nombrecurso' => 'required|string',
            'año' => 'required|string',
            'ciclo' => 'required|string',
            'profesor_id' => 'required|integer',
        ]);

        // Insertar los datos en la tabla de cursos utilizando DB::table
        DB::table('cursos')->insert([
            'nombrecurso' => $data['nombrecurso'],
            'año' => $data['año'],
            'ciclo' => $data['ciclo'],
            'profesor_id' => $data['profesor_id'],
        ]);

        // Redireccionar a la vista de cursos después de la inserción
        return redirect('/cursos');
    }

    // Método para buscar profesores en función del término de búsqueda
    public function buscarProfesores(Request $request)
    {
        // Obtener el término de búsqueda del formulario
        $searchTerm = $request->input('searchTerm');
        
        // Realizar una consulta para buscar profesores por nombre o apellido que coincidan con el término
        $profesores = Profesor::where('nombre', 'LIKE', "%$searchTerm%")
                            ->orWhere('apellido', 'LIKE', "%$searchTerm%")
                            ->get();

        $html = '';
        // Crear una lista HTML de sugerencias de profesores que coinciden con el término
        foreach ($profesores as $profesor) {
            $html .= "<li data-id='{$profesor->id}'>{$profesor->nombre} {$profesor->apellido}</li>";
        }

        // Devolver la lista de sugerencias como respuesta al cliente (utilizada en la búsqueda AJAX)
        return $html;
    }
}

