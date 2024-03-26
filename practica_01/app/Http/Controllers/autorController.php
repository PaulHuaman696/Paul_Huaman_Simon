<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class autorController extends Controller
{
    // Listar Autores
    public function index(){
        $autores = Autor::get();
        return $autores;
    }

    // Ver un Autor
    public function show($id){  
        $autor = Autor::find($id);
        if (is_null($autor)) {
            return 'El autor buscado no existe.';
        }
        return $autor;
    }

    // Crear un Autor
    public function store(Request $request){
        $params = $request->all();
        // dd($params);
        $autor = Autor::create([
            'nombre' => $params['nombre'],
            'biografia' => $params['biografia']
        ]);
        
        return $autor;
    }

    // Eliminar Autor
    public function destroy($id){
        $autor = Autor::find($id)->delete();

        if ($autor){
            return 'Autor eleminado.';
        }else{
            return 'No se pudo eliminar.';
        }
    }

    // Actualizar Autor
    public  function update ($id,Request $request){
        $params = $request->all();
        $autor = Autor::find($id)->update([
            'nombre' => $params['nombre'],
            'biografia' => $params['biografia']
        ]);
        return $autor ? 'El autor fue actualizado.' : 'No se pudo actualizar al autor.';
    }
}
