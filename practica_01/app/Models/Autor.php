<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'autores';
    protected $fillable = [
        'nombre',
        'biografia'
    ];

    public function autorLibro(){
        return $this->hasMany(AutorLibro::class,'autor_id');
    }
}
