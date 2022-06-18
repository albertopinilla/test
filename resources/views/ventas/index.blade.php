@extends('layouts.app')


@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

@endsection

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ventas</h3>
            <div class="col-12 col-md-auto ms-auto d-print-none">
                <div class="btn-list">

                    <a href="{{ route('ventas.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Nueva venta
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
            <table id="table-ventas"  class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de producto</th>
                        <th>Referencia</th>
                        <th>Peso</th>
                        <th>Categoría</th>
                  
                        <th>Valor unitario</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        
                    </tr>
                </thead>

            </table>
        </div>
       
    </div>
</div>

@endsection

@push('js')

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>

$(document).ready(function() {
                $('#table-ventas').DataTable({
                    //serverSide: true,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                    },
                    ajax: "{{url('/')}}/api/ventas",
                    
                    columns: [
                        {data: 'id', name: 'ventas.id'},
                        {data: 'nombre_de_producto',  name: 'productos.nombre_de_producto'},
                        {data: 'referencia', name: 'productos.referencia'},
                        {data: 'peso',  name: 'productos.peso'},
                        {data: 'categoria', name: 'productos.categoria'},
                        {data: 'valor_unitario',  name: 'ventas.valor_unitario'},
                        {data: 'cantidad',  name: 'ventas.cantidad'},
                        {data: 'total',  name: 'ventas.total'},
                        {data: 'created_at.display',  name: 'ventas.created_at'}
                 
                    ]
                })
            })

</script>

@endpush