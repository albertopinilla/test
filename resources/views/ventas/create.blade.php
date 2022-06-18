@extends('layouts.app')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="mensaje">
            <div class="d-flex">
                <div>
                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                    <!-- SVG icon code with class="alert-icon" -->
                </div>
                <div>
                    <h4 class="alert-title">Éxito!</h4>
                    <div class="text-muted">{{ Session::get('success') }}</div>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif
    @if (Session::has('danger'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <div class="d-flex">
                <div>
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                    <!-- SVG icon code with class="alert-icon" -->
                </div>
                <div>
                    <h4 class="alert-title">Lo sentimos&hellip;</h4>
                    <div class="text-muted">{{ Session::get('danger') }}</div>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <div class="d-flex">
                <div>
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                    <!-- SVG icon code with class="alert-icon" -->
                </div>
                <div>
                    <h4 class="alert-title">Lo sentimos</h4>
                    <div class="text-muted">Debes seleccionar un articulo y una cantidad disponible para poder generar la venta.</div>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Productos
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th></th>
                            <th>Referencia</th>
                            <th>Nombre del producto</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Categoria</th>
                            <th>Cantidad</th>
                            <th></th>
                        </thead>
                        <tbody>

                            @foreach ($productos as $item)
                                <form action="{{ route('ventas.store') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td><input type="checkbox" name="id" value="{{ $item->id }}"></td>
                                        <td>{{ $item->referencia }}</td>
                                        <td>{{ $item->nombre_de_producto }}</td>
                                        <td>{{ $item->precio }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td>{{ $item->categoria }}</td>
                                        <td class="w-25">
                                            <input type="number" class="form-control" name="cantidad">

                                        </td>
                                        <td>
                                            <input class="btn btn-primary" type="submit" value="Vender">
                                        </td>
                                    </tr>

                                </form>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Detalle de venta
                </div>
                <div class="card-body">
                    @if (Session::get('venta'))
                        <table>
                            <tr>
                                <th>Venta N°</th>
                                <td>#0000-{{ Session::get('venta')->id }}</td>
                            </tr>
                            <tr>
                                <th>Fecha</th>
                                <td>{{ Session::get('venta')->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Producto</th>
                                <td>{{ Session::get('venta')->nombre_de_producto }}</td>
                            </tr>
                            <tr>
                                <th>Cantidad</th>
                                <td>{{ Session::get('venta')->cantidad }}</td>
                            </tr>
                            <th>Valor unitario</th>
                            <td>${{ Session::get('venta')->valor_unitario }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>${{ Session::get('venta')->total }}</td>
                            </tr>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
