<?php
namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Profesor;
use App\Models\Nota;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class notas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alumno::create([
            'nombre' => 'John Doe',
            'apellido' => 'Smith',
            'fechanacimiento' => '2023-09-09',
            'direccion' => 'Santiago Nonualco',
            'genero' => 'Masculino',
            'telefono' => '72197632',
            'correo' => 'johndoe@example.com',
            'clave' => bcrypt('contrasena_secreta'), // Se utiliza bcrypt() para cifrar la contraseña
        ]);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////7
        Profesor::create([
            'nombre' => 'Tyler',
            'apellido' => 'Smith',
            'dui' => '22222222',
            'telefono' => '72197632',
            'correo' => 'jo@example.com',
            'clave' => bcrypt('contrasena_secreta'), // Se utiliza bcrypt() para cifrar la contraseña
        ]);

        DB::table('profesor')->insert([
            'nombre' => 'John Doe',
            'apellido' => 'Smith',
            'dui' => '22222222',
            'telefono' => '72197632',
            'correo' => 'ty@example.com',
            'clave' => bcrypt('contrasena_secreta'), // Se utiliza bcrypt() para cifrar la contraseña
        ]);
        ////////////////////////////////////////////////////////////////////////////////////////////////////////7
        Curso::create([
            'nombrecurso' => 'mate1',
            'año' => '2023',
            'ciclo' => '1-2023',
            'profesor_id' => 1,
        ]);

        DB::table('cursos')->insert([
            'nombrecurso' => 'mate2',
            'año' => '2023',
            'ciclo' => '2-2023',
            'profesor_id' => 1,
        ]);
        ////////////////////////////////////////////////////////////////////////////////////////////////////////7
        Nota::create([
            'nota1' => 10,
            'nota2' => 10,
            'nota3' => 10,
            'nota4' => 10,
            'promedio' => 10,
            'parcial' => 10,
            'alumno_id' => 1,
            'cursos_id' => 1,
            'profesor_id' => 1,
        ]);

        DB::table('notas')->insert([
            'nota1' => 10,
            'nota2' => 10,
            'nota3' => 10,
            'nota4' => 10,
            'promedio' => 10,
            'parcial' => 10,
            'alumno_id' => 1,
            'cursos_id' => 1,
            'profesor_id' => 1,
        ]);

    }
}
