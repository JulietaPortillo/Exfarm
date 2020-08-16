@extends('layout.layout') @section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        <b> {{ $title }} </b>
        <span class="pull-right"> <a href="{{ url('/roles/create') }}"> <button class="btn btn-rounded btn-outline-success"> <i class="fa fa-plus"></i> Crear</button> </a> </span>
    </div>
    <div class="card-body">
        <table id="tblroles" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->description }}</td>
                    <td>{{ $role->status }}</td>
                    <td>
                        <form method="POST" action="/roles/delete/{{ $role->id }}">
                            {{ csrf_field() }}
                            <a href="{{ url('/roles/'.$role->id.'/edit') }} " class=" btn btn-outline-primary "> <i class="fa fa-pencil-square-o "></i> </a>
                            <button type="submit " class="btn btn-outline-danger "> <i class="fa fa-trash-o "></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


@endsection