@extends('layout.layout') @section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        <b> {{ $title }} </b>
        <span class="pull-right"> <a href="{{ url('/purchases/create') }}"> <button class="btn btn-rounded btn-outline-success"> <i class="fa fa-plus"></i> Crear</button> </a> </span>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Descripción</th>
                    <th>Peso en libras</th>
                    <th>Precio de compra</th>
                    <th>Fecha de compra</th>
                    <th>Edad en meses</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->code }}</td>
                    <td>{{ $purchase->description }} </td>
                    <td>{{ $purchase->weight }}</td>
                    <td>Q. {{ $purchase->purchase_price }}</td>
                    <td>{{ $purchase->purchase_date }}</td>
                    <td>{{ $purchase->age }}</td>
                    <td>
                        <form method="POST" action="/purchases/delete/{{ $purchase->id }}">
                            {{ csrf_field() }}
                            <a href="{{ url('/take-weights/'.$purchase->id) }}" class=" btn btn-outline-info"> <i class="fa fa-balance-scale"></i> </a>
                            <a href="{{ url('/sales/to-sell/'.$purchase->id) }}" class=" btn btn-outline-success"> <i class="fa fa-money"></i> </a>
                            <a href="{{ url('/purchases/'.$purchase->id.'/edit') }} " class=" btn btn-outline-primary "> <i class="fa fa-pencil-square-o "></i> </a>
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
                    <th>Precio de compra</th>
                    <th>Fecha de compra</th>
                    <th>Edad en meses</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>



@endsection