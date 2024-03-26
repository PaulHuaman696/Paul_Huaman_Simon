<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroResenya extends Model
{
    use HasFactory;
    protected $table = 'libro_resenya';
    public $timestamps = false;
    protected $fillable = [
        'resenya_id',
        'libro_id'
    ];

    public function resenya(){
        return $this->belongsTo(Resenya::class,'resenya_id');
    }
    public function libro(){
        return $this->belongsTo(Libro::class,'libro_id');
    }
}
