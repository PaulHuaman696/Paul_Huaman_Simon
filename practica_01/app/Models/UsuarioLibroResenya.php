<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioLibroResenya extends Model
{
    use HasFactory;
    protected $table = 'usuario_libro_resenya';
    public $timestamps = false;
    protected $fillable = [
        'libro_resenya_id',
        'usuario_id'
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class,'usuario_id');
    }
    public function libroResenya(){
        return $this->belongsTo(LibroResenya::class,'libro_resenya_id');
    }
}
