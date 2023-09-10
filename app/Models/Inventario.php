<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'inventarios';

    protected $fillable = [
        'bodega_id',
        'producto_id',
        'cantidad',
    ];

    public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'bodega_id');
        return $this->belongsToMany(Bodega::class)->withPivot('cantidad');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

}
