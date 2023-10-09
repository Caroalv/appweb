<?php

namespace App\Http\Controllers;
use App\Models\Nota;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Profesor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index()
    {
        // Obtener la lista de notas con nombres de alumno, curso y profesor
        $notas = DB::table('notas')
            ->select('notas.*', 'alumnos.nombre', 'alumnos.apellido', 'cursos.nombrecurso', 'profesor.nombre as nombre_profesor', 'profesor.apellido as apellido_profesor')
            // Realiza una consulta en la base de datos para seleccionar información de la tabla 'notas' y de las tablas relacionadas ('alumnos', 'cursos', 'profesor').
            ->join('alumnos', 'notas.alumno_id', '=', 'alumnos.id')
            ->join('cursos', 'notas.cursos_id', '=', 'cursos.id')
            ->join('profesor', 'notas.profesor_id', '=', 'profesor.id')
            ->get(); // Obtiene los resultados de la consulta y los almacena en la variable '$notas'.
    
        // Devuelve la vista 'notas.index' y pasa la variable '$notas' a la vista como datos para ser mostrados en la página.
        return view('notas.index', ['notas' => $notas]);
    }
    

    public function store(Request $request)
    {
        // Validar y obtener los datos del formulario
        $data = $request->validate([
            'nota1' => 'required|numeric',
            'nota2' => 'required|numeric',
            'nota3' => 'required|numeric',
            'nota4' => 'required|numeric',
            'promedio' => 'required|numeric',
            'parcial' => 'required|numeric',
            'alumno_id' => 'required|numeric',
            'cursos_id' => 'required|numeric',
            'profesor_id' => 'required|numeric',
        ]);

        // Insertar los datos en la tabla de notas utilizando el método insert
        DB::table('notas')->insert([
            'nota1' => $data['nota1'],
            'nota2' => $data['nota2'],
            'nota3' => $data['nota3'],
            'nota4' => $data['nota4'],
            'promedio' => $data['promedio'],
            'parcial' => $data['parcial'],
            'alumno_id' => $data['alumno_id'],
            'cursos_id' => $data['cursos_id'],
            'profesor_id' => $data['profesor_id'],
        ]);

        return redirect('/notas');
    }

    public function buscarAlumnos(Request $request)
    {
        // Obtiene el término de búsqueda ingresado por el usuario desde la solicitud HTTP.
        $searchTerm = $request->input('searchTerm');
    
        // Realiza una consulta en la base de datos para buscar alumnos cuyos nombres o apellidos coincidan con el término de búsqueda.
        $alumnos = Alumno::where('nombre', 'LIKE', "%$searchTerm%")
                         ->orWhere('apellido', 'LIKE', "%$searchTerm%")
                         ->get();
    
        // Inicializa una variable para almacenar el HTML de las sugerencias de alumnos.
        $html = '';
    
        // Itera a través de los resultados de la consulta de alumnos.
        foreach ($alumnos as $alumno) {
            // Genera un elemento 'li' con el ID del alumno como atributo 'data-id' y su nombre completo como contenido.
            $html .= "<li data-id='{$alumno->id}'>{$alumno->nombre} {$alumno->apellido}</li>";
        }
    
        // Devuelve el HTML generado como respuesta a la solicitud AJAX.
        return $html;
    }
    
      //misma logica
    public function buscarCursos(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $cursos = Curso::where('nombrecurso', 'LIKE', "%$searchTerm%")
                       ->get();

        $html = '';
        foreach ($cursos as $curso) {
            $html .= "<li data-id='{$curso->id}'>{$curso->nombrecurso}</li>";
        }

        return $html;
    }

    public function buscarProfesores(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $profesores = Profesor::where('nombre', 'LIKE', "%$searchTerm%")
                             ->orWhere('apellido', 'LIKE', "%$searchTerm%")
                             ->get();

        $html = '';
        foreach ($profesores as $profesor) {
            $html .= "<li data-id='{$profesor->id}'>{$profesor->nombre} {$profesor->apellido}</li>";
        }

        return $html;
    }
}
