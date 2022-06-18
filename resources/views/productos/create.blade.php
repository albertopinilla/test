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

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Crear nuevo producto</h3>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <a href="javascript:history.back()" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->

                            Regresar
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('productos.store') }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Nombre de producto</label>
                        <input type="text" class="form-control" name="nombre_de_producto" value="{{ old('nombre_de_producto') }}">
                        @if ($errors->has('nombre_de_producto'))
                            <p style="color: red">{{ $errors->first('nombre_de_producto') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Referencia</label>
                        <input type="text" class="form-control" name="referencia" value="{{ old('referencia') }}">
                        @if ($errors->has('referencia'))
                            <p style="color: red">{{ $errors->first('referencia') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="precio" value="{{ old('precio') }}">
                        @if ($errors->has('precio'))
                            <p style="color: red">{{ $errors->first('precio') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Peso</label>
                        <input type="number" class="form-control" name="peso" value="{{ old('peso') }}">
                        @if ($errors->has('peso'))
                            <p style="color: red">{{ $errors->first('peso') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Categoría</label>
                        <input type="text" class="form-control" name="categoria" value="{{ old('categoria') }}">
                        @if ($errors->has('categoria'))
                            <p style="color: red">{{ $errors->first('categoria') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Stock</label>
                        <input type="number" class="form-control" name="stock" value="{{ old('stock') }}">
                        @if ($errors->has('stock'))
                            <p style="color: red">{{ $errors->first('stock') }}</p>
                        @endif
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
@endsection

@push('js')

    

@endpush
