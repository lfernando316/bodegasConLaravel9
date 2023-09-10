<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];
    // En el modelo Producto
    
    public function inventarios()
    {
        return $this->hasManyThrough(Inventario::class, Bodega::class);
    }
}
