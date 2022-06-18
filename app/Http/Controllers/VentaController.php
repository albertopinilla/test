<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Producto,Venta};

class VentaController extends Controller
{
    public function index()
    {
     
        return view('ventas.index');
    }

    public function create()
    {
        $productos = Producto::get();
        return view('ventas.create',compact('productos'));
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'id' => 'required',
            'cantidad' => 'required|integer|min:1',
        ]);
        
        if($this->validarCantidades($request->id,$request->cantidad))
        {
            $producto = Producto::where('id',$request->id)->first();
           
            $venta_id = Venta::create([
                'producto_id' => $producto->id,
                'cantidad' => $request->cantidad,
                'valor_unitario' => $producto->precio,
                'total' => ($producto->precio * $request->cantidad)
            ])->id;

            $venta = Venta::where('ventas.id',$venta_id)
                ->select('ventas.id','ventas.created_at','productos.nombre_de_producto','ventas.cantidad','ventas.valor_unitario','ventas.cantidad','ventas.total')
                ->leftJoin('productos','ventas.producto_id','=','productos.id')->first();

            Producto::where("id", $request->id)->decrement("stock",$request->cantidad);

            return redirect('ventas/generar')->with('venta',$venta)->with('success', 'La compra ha sido realizada con exito.');
        }else{
            return redirect('ventas/generar')->with('danger', 'La cantidad ingresada supera el stock del producto seleccionado, no es posible hacer la venta.');
        }

        
    }

    public function validarCantidades($id,$cantidad)
    {
        if(Producto::where('id',$id)->where('stock','>=',$cantidad)->exists())
        {
            return true;
        }else{
            return false;
        }
    }

 
}
