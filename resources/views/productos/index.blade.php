@extends('layouts.app')

@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Productos</h3>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <a href="{{ route('productos.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Nuevo producto
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
                <div class="table-responsive">
                    <table id="table-productos" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre de producto</th>
                                <th>Referencia</th>
                                <th>Peso</th>
                                <th>Categoría</th>
                                <th>Precio unitario</th>
                                <th>Stock</th>
                                <th>Fecha de creación</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
    
                    </table>
                </div>
            </div>
       
        </div>
    </div>

   
@endsection

@push('js')

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
$('#table-productos').DataTable({

    responsive: true,
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
    },
    //serverSide: true,
    ajax: "{{ url('/') }}/api/productos",
    "columns": [
        {
            data: 'id'
        },
        {
            data: 'nombre_de_producto',
        },
        {
            data: 'referencia'
        },
        
        {
            data: 'peso'
        },
        {
            data: 'categoria'
        },
        {
            data: 'precio'
        },
        {
            data: 'stock'
        },
        {
            data: 'created_at.display'
        },
        {
            data: 'btn-edit',
           
        },
        {
           
            data: 'btn-delete'
        },
    ]
});
</script>

@endpush
