<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'usuarios';
    protected $fillable = [
        'nombre',
        'email'
    ];

    public function usuarioLibroResenya(){
        return $this->hasOne(UsuarioLibroResenya::class,'usuario_id');
    }
    public function libroReservado(){
        return $this->hasMany(LibroReservado::class,'usuario_id');
    }
}
