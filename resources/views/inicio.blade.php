@extends('layouts.app')

@section('content')

<div class="row row-cards">
    <div class="col-sm-6 col-lg-6">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-blue text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
              </span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
                Más productos en Stock
              </div>
              <div class="text-muted">
                @if(!empty($stock))
                    {{ $stock->stock }} {{ $stock->nombre_de_producto }}
                @endif

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-6">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
              </span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
                Lo mas vendido
              </div>
              <div class="text-muted">
                @if(!empty($ventas))
                    {{ $ventas->cantidad }} {{ $ventas->nombre_de_producto }}
                @endif
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
  </div>
  <br>
  <div class="row">
    <div class="col-sm-6 col-lg-6">
        SELECT nombre_de_producto, stock 
        FROM productos
        GROUP BY nombre_de_producto, stock
        ORDER BY stock DESC
        LIMIT 1
    </div>
    <div class="col-sm-6 col-lg-6">
        SELECT productos.nombre_de_producto, SUM(ventas.cantidad) as cantidad
        FROM ventas
        INNER JOIN productos ON ventas.producto_id = productos.id
        GROUP BY productos.nombre_de_producto
        ORDER BY cantidad DESC
        LIMIT 1
    </div>
  </div>

@endsection

