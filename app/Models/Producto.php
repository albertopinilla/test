<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre_de_producto', 'referencia', 'precio','peso','categoria','stock'
    ];
}
