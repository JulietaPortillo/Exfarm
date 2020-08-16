@extends('layout.layout') @section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        <b> {{ $title }} </b>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Descripción</th>
                    <th>Peso en libras</th>
                    <th>Precio de venta</th>
                    <th>Fecha de venta</th>
                    <th>Edad en meses</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->code_id }}</td>
                    <td>{{ $sale->purchase->description }} </td>
                    <td>{{ $sale->weight }}</td>
                    <td>Q. {{ $sale->sale_price }}</td>
                    <td>{{ $sale->sale_date }}</td>
                    <td>{{ $sale->age }}</td>
                    <td>
                        <form method="POST" action="/sales/delete/{{ $sale->id }}">
                            {{ csrf_field() }}
                            <a href="{{ url('/take-weights/'.$sale->purchase->id) }}" class=" btn btn-outline-info"> <i class="fa fa-balance-scale"></i> </a>
                            <a href="{{ url('/sales/'.$sale->id.'/edit') }} " class=" btn btn-outline-primary "> <i class="fa fa-pencil-square-o "></i> </a>
                            <button type="submit" class="btn btn-outline-danger"> <i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Codigo</th>
                    <th>Descripción</th>
                    <th>Peso en libras</th>
                    <th>Precio de venta</th>
                    <th>Fecha de venta</th>
                    <th>Edad en meses</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>



@endsection