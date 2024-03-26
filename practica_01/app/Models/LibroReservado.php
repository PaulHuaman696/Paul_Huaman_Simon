<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroReservado extends Model
{
    use HasFactory;
    protected $table = 'libro_reservado';
    public $timestamps = false;
    protected $fillable = [
        'usuario_id',
        'libro_id'
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class,'usuario_id');
    }
    public function libro(){
        return $this->belongsTo(Libro::class,'libro_id');
    }
}
