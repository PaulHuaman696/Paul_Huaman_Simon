<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\AutorLibro;
use App\Models\Categoria;
use App\Models\CategoriaLibro;
use App\Models\Libro;
use Illuminate\Http\Request;

class libroController extends Controller
{
    // Listar libros
    public function index(){
        $libros = libro::with('autorLibro')->get();
        return $libros;
    }

    // Ver un libro
    public function show($id){  
        $libro = Libro::with('autorLibro')->find($id);
        if (is_null($libro)) {
            return 'El libro buscado no existe.';
        }
        return $libro;
    }

    // Crear un libro
    public function store(Request $request){
        $params = $request->all();
        $libro = libro::create([
            'titulo' => $params['titulo'],
            'descripcion' => $params['descripcion'],
            'anyo'=> $params['anyo']
        ]);
        
        # Crear registro en AutorLibro
        if (isset($params['autor']) && is_array($params['autor'])) {
            foreach ($params['autor'] as $key => $autor) {
                if (isset($params['autor']['id'])) {
                    AutorLibro::create([
                        'autor_id' => $autor,
                        'libro_id' => $libro->id
                    ]);
                } else {
                    $autorObj = Autor::create([
                        'nombre' => $params['autor']['nombre'],
                        'biografia' => $params['autor']['biografia']
                    ]);

                    AutorLibro::create([
                        'autor_id' => $autorObj->id,
                        'libro_id' => $libro->id
                    ]);
                };
            };
        };

        # Crear registro en CategoriaLibro
        if (isset($params['categoria']) && is_array($params['categoria'])) {
            foreach ($params['categoria'] as $key => $categoria) {
                if (isset($params['categoria']['id'])) {
                    CategoriaLibro::create([
                        'categoria_id' => $categoria,
                        'libro_id' => $libro->id
                    ]);
                } else {
                    $categoriaObj = Categoria::create([
                        'tipoCategoria' => $params['categoria']['tipoCategoria']
                    ]);

                    CategoriaLibro::create([
                        'categoria_id' => $categoriaObj->id,
                        'libro_id' => $libro->id
                    ]);
                };
            };
        };


        return $libro;
    }

    // Eliminar libro
    public function destroy($id){
        $libro = libro::find($id)->delete();

        if ($libro){
            return 'libro eleminado.';
        }else{
            return 'No se pudo eliminar.';
        }
    }

    // Actualizar libro
    public  function update ($id,Request $request){
        $params = $request->all();
        $libro = libro::find($id)->update([
            'nombre' => $params['nombre'],
            'biografia' => $params['biografia']
        ]);
        return $libro ? 'El libro fue actualizado.' : 'No se pudo actualizar al libro.';
    }
}
