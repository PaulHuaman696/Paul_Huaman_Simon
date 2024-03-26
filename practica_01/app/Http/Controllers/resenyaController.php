<?php

namespace App\Http\Controllers;

use App\Models\LibroResenya;
use App\Models\Resenya;
use Illuminate\Http\Request;

class resenyaController extends Controller
{
    // Listar resenyas
    public function index()
    {
        $resenyas = Resenya::with('libroResenya')->get();
        return $resenyas;
    }

    // Ver un Resenya
    public function show($id)
    {
        $resenya = Resenya::with('libroResenya')->find($id);
        if (is_null($resenya)) {
            return 'El resenya buscado no existe.';
        }
        return $resenya;
    }

    // Crear un Resenya
    public function store(Request $request)
    {
        $params = $request->all();
        // dd($params);
        $resenya = Resenya::create([
            'titulo' => $params['titulo'],
            'contenido' => $params['contenido']
        ]);

        # Crear registro en LibroResenya
        if (isset($params['libro']) && is_array($params['libro'])) {
            foreach ($params['libro'] as $key => $libro) {
                if (isset($params['libro']['id'])) {
                    LibroResenya::create([
                        'libro_id' => $libro,
                        'resenya_id' => $resenya->id
                    ]);
                };
            };
        }

        return $resenya;
    }

    // Eliminar Resenya
    public function destroy($id)
    {
        $resenya = Resenya::find($id)->delete();

        if ($resenya) {
            return 'Resenya eleminado.';
        } else {
            return 'No se pudo eliminar.';
        }
    }

    // Actualizar Resenya
    public  function update($id, Request $request)
    {
        $params = $request->all();
        $resenya = Resenya::find($id)->update([
            'titulo' => $params['titulo'],
            'contenido' => $params['contenido']
        ]);
        return $resenya ? 'El resenya fue actualizado.' : 'No se pudo actualizar al resenya.';
    }
}
