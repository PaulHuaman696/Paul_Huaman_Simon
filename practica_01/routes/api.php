<?php

use App\Http\Controllers\autorController;
use App\Http\Controllers\libroController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\resenyaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# Autores
Route::get('autores',[autorController::class, 'index']);
Route::get('autores/{id}',[autorController::class, 'show']);
Route::post('autores',[autorController::class, 'store']);
Route::patch('autores/{id}',[autorController::class, 'update']);
Route::delete('autores/{id}',[autorController::class, 'destroy']);

# libros
Route::get('libros',[libroController::class, 'index']);
Route::get('libros/{id}',[libroController::class, 'show']);
Route::post('libros',[libroController::class, 'store']);
Route::patch('libros/{id}',[libroController::class, 'update']);
Route::delete('libros/{id}',[libroController::class, 'destroy']);

# categorias
Route::get('categorias',[categoriaController::class, 'index']);
Route::get('categorias/{id}',[categoriaController::class, 'show']);
Route::post('categorias',[categoriaController::class, 'store']);
Route::patch('categorias/{id}',[categoriaController::class, 'update']);
Route::delete('categorias/{id}',[categoriaController::class, 'destroy']);

# resenyas
Route::get('resenyas',[resenyaController::class, 'index']);
Route::get('resenyas/{id}',[resenyaController::class, 'show']);
Route::post('resenyas',[resenyaController::class, 'store']);
Route::patch('resenyas/{id}',[resenyaController::class, 'update']);
Route::delete('resenyas/{id}',[resenyaController::class, 'destroy']);

# usuarios
Route::get('usuarios',[usuarioController::class, 'index']);
Route::get('usuarios/{id}',[usuarioController::class, 'show']);
Route::post('usuarios',[usuarioController::class, 'store']);
Route::patch('usuarios/{id}',[usuarioController::class, 'update']);
Route::delete('usuarios/{id}',[usuarioController::class, 'destroy']);

