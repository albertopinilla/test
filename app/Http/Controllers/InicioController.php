<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Producto,Venta};
use DB;

class InicioController extends Controller
{
    public function index()
    {
        $stock = Producto::select('nombre_de_producto','stock')
            ->groupBy('nombre_de_producto','stock')
            ->orderBy('stock','DESC')->first();
  
        $ventas = Venta::selectRaw('productos.nombre_de_producto, SUM(ventas.cantidad) as cantidad')
            ->join('productos','ventas.producto_id','=','productos.id')
            ->groupBy('productos.nombre_de_producto')
            ->orderBy('cantidad','DESC')
            ->first();

        return view('inicio',compact('stock','ventas'));
    }
}
