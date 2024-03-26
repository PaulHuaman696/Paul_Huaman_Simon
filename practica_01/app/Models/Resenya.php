<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resenya extends Model
{
    use HasFactory;
    protected $table = 'resenyas';
    protected $fillable = [
        'titulo',
        'contenido'
    ];

    public function libroResenya(){
        return $this->hasOne(LibroResenya::class,'resenya_id')->with('libro');
    }
}
