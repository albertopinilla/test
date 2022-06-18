@extends('layouts.app')

@section('css')
   

@endsection

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

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ediar producto</h3>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('productos.update', [$producto->id ]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Nombre de producto</label>
                        <input type="text" class="form-control" name="nombre_de_producto" value="{{ $producto->nombre_de_producto }}">
                        @if ($errors->has('nombre_de_producto'))
                            <p style="color: red">{{ $errors->first('nombre_de_producto') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Referencia</label>
                        <input type="text" class="form-control" name="referencia" value="{{ $producto->referencia }}">
                        @if ($errors->has('referencia'))
                            <p style="color: red">{{ $errors->first('referencia') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="precio" value="{{ $producto->precio }}">
                        @if ($errors->has('precio'))
                            <p style="color: red">{{ $errors->first('precio') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Peso</label>
                        <input type="number" class="form-control" name="peso" value="{{ $producto->peso }}">
                        @if ($errors->has('peso'))
                            <p style="color: red">{{ $errors->first('peso') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Categoría</label>
                        <input type="text" class="form-control" name="categoria" value="{{ $producto->categoria }}">
                        @if ($errors->has('categoria'))
                            <p style="color: red">{{ $errors->first('categoria') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Stock</label>
                        <input type="number" class="form-control" name="stock" value="{{ $producto->stock }}">
                        @if ($errors->has('stock'))
                            <p style="color: red">{{ $errors->first('stock') }}</p>
                        @endif
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>

@endsection
