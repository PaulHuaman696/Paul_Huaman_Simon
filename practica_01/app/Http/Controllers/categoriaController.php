<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;

class categoriaController extends Controller
{
    // Listar categorias
    public function index(){
        $categorias = Categoria::get();
        return $categorias;
    }

    // Ver un categoria
    public function show($id){  
        $categoria = categoria::find($id);
        if (is_null($categoria)) {
            return 'El categoria buscado no existe.';
        }
        return $categoria;
    }

    // Crear un categoria
    public function store(Request $request){
        $params = $request->all();
        $categoria = categoria::create([
            'tipoCategoria' => $params['tipoCategoria']
        ]);
        
        return $categoria;
    }

    // Eliminar categoria
    public function destroy($id){
        $categoria = categoria::find($id)->delete();

        if ($categoria){
            return 'categoria eleminado.';
        }else{
            return 'No se pudo eliminar.';
        }
    }

    // Actualizar categoria
    public  function update ($id,Request $request){
        $params = $request->all();
        $categoria = categoria::find($id)->update([
            'tipoCategoria' => $params['tipoCategoria']
        ]);
        return $categoria ? 'El categoria fue actualizado.' : 'No se pudo actualizar al categoria.';
    }
}
