<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        return view('productos.index');
    }

    public function create()
    {
     
        return view('productos.create');
    }

    public function store(Request $request)
    {
        // Validación de los campos del formulario 
        $request->validate([

            'nombre_de_producto' => 'required|unique:productos,nombre_de_producto',
            'referencia' => 'required|unique:productos,referencia',
            'precio' => 'required',
            'peso' => 'required',
            'categoria' => 'required',
            'stock' => 'required',

        ]);

        Producto::create([
            'nombre_de_producto' => $request->nombre_de_producto,
            'referencia' => $request->referencia,
            'precio' => $request->precio,
            'peso' => $request->peso,
            'categoria' => $request->categoria,
            'stock' => $request->stock
        ]);

        return redirect()->back()->with('success', 'El nuevo producto ha sido registrado con éxito.');  

    }

    public function edit($id)
    {
        try {
            $producto= Producto::FindOrFail($id);
        
            return view('productos.edit',compact('producto'));

        } catch (\Exception $e) {
            return response()->json(['mensaje'=>'Este producto no existe'], 404);
        }

    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'nombre_de_producto' => 'required',
            'referencia' => 'required',
            'precio' => 'required',
            'peso' => 'required',
            'categoria' => 'required',
            'stock' => 'required',

        ]);

        Producto::where('id',$id)
            ->update([
                'nombre_de_producto' => $request->nombre_de_producto,
                'referencia' => $request->referencia,
                'precio' => $request->precio,
                'peso' => $request->peso,
                'categoria' => $request->categoria,
                'stock' => $request->stock
        ]);

        return redirect()->back()->with('success', 'La actualización del producto se ha realizado satisfactoriamente.');  
       
    }

    public function delete($id)
    {

    }
}
