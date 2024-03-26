<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorLibro extends Model
{
    use HasFactory;
    protected $table = 'autor_libro';
    public $timestamps = false;
    protected $fillable = [
        'autor_id',
        'libro_id'
    ];

    public function autor(){
        return $this->belongsTo(Autor::class,'autor_id');
    }
    public function libro(){
        return $this->belongsTo(Libro::class,'libro_id');
    }
}
