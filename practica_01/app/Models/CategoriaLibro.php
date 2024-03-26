<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaLibro extends Model
{
    use HasFactory;
    protected $table = 'categoria_libro';
    public $timestamps = false;
    protected $fillable = [
        'categoria_id',
        'libro_id'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
    public function libro(){
        return $this->belongsTo(Libro::class,'libro_id');
    }
}
