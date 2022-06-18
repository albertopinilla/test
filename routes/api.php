<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\{Producto,Venta};
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('productos', function(){

    $data =  Producto::all();
    
    return DataTables::of($data)
        ->editColumn('created_at', function ($data) {
            return [
                'display' => Carbon::parse($data->created_at)->format('Y-m-d'),
                'timestamp' => $data->created_at->timestamp
            ];
        })
	    ->addColumn('btn-edit','productos.btn-actions.btn-edit')
        ->addColumn('btn-delete','productos.btn-actions.btn-delete')
        ->rawColumns(['btn-edit','btn-delete'])
		->toJson();
});

Route::get('ventas', function(){

    $data =  Venta::
        select('ventas.id AS id','productos.nombre_de_producto','productos.referencia','productos.peso','productos.categoria','ventas.cantidad','ventas.valor_unitario','ventas.total','ventas.created_at')
        ->Join('productos','ventas.producto_id','=','productos.id')
        ->orderBy('id','DESC')
        ->get();
    
    return DataTables::of($data)
        ->editColumn('created_at', function ($data) {
            return [
                'display' => Carbon::parse($data->created_at)->format('Y-m-d H:i:s'),
                'timestamp' => $data->created_at->timestamp
            ];
        })->toJson();
	
});