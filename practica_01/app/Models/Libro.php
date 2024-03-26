<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'libros';
    protected $fillable = [
        'titulo',
        'descripcion',
        'anyo'
    ];

    public function categoriaLibro(){
        return $this->hasMany(CategoriaLibro::class,'libro_id');
    }
    public function autorLibro(){
        return $this->hasOne(AutorLibro::class,'libro_id')->with('autor');
    }
    public function libroReservado(){
        return $this->hasMany(LibroReservado::class,'libro_id');
    }
    public function libroResenya(){
        return $this->hasMany(LibroResenya::class,'libro_id');
    }
}
