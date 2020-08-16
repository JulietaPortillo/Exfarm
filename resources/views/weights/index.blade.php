@extends('layout.layout') @section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        <b> {{ $title }} </b>
        <span class="pull-right"> <a href="{{ url('/take-weights/weight-assign/'.$purchase->id) }}"> <button class="btn btn-rounded btn-outline-success"> <i class="fa fa-plus"></i> Crear</button> </a> </span>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Descripción</th>
                    <th>Peso en libras</th>
                    <th>Fecha de registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($weights as $weight)
                <tr>
                    <td>{{ $weight->code_id }}</td>
                    <td>{{ $weight->purchase->description }} </td>
                    <td>{{ $weight->weight }}</td>
                    <td>{{ $weight->registration_date }}</td>
                    <td>
                        <form method="POST" action="/take-weights/delete/{{ $weight->id }}">
                            {{ csrf_field() }}
                            <a href="{{ url('/take-weights/'.$weight->id.'/edit') }} " class=" btn btn-outline-primary "> <i class="fa fa-pencil-square-o "></i> </a>
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
                    <th>Fecha de registro</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="card-footer">
        <span> <a href="{{ url('/purchases') }}"> <button class="btn btn-rounded btn-outline-info"> <i class="fa fa-arrow-left"></i> Regresar</button> </a> </span>
    </div>
</div>



@endsection