@extends('layout.layout') @section('content')

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <b> {{ $title }} </b>
            </div>
            <div class="card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        {!! Form::open([ 'route' => 'users.store', 'method' => 'POST', 'class' => 'form-horizontal form-material']) !!} {{ csrf_field() }}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre') !!}
                            <div class="col-md-12">
                                {!! Form::text('name', null , ['class' => 'form-control form-control-line', 'name' => 'name', 'placeholder' => 'Ej: Juliet', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Correo') !!}
                            <div class="col-md-12">
                                {!! Form::email('email', null , ['class' => 'form-control form-control-line', 'name' => 'email', 'placeholder' => 'Ej: juliet@gmail.com', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Contraseña') !!}
                            <div class="col-md-12">
                                {!! Form::password('password', null , ['class' => 'form-control form-control-line', 'name' => 'password', 'placeholder' => 'Ej: *****', 'required' => 'required']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            {!! Form::label('role', 'Role') !!}
                            <div class="col-md-12">
                                <select name="role" class="form-control form-material" required>
                                    <option>Seleccione un role...</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}" required> {{ $role->description }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{ url('/users') }}" class="btn btn-outline-info"><i class="fa fa-arrow-left"> </i> Regresar</a>
                                <button type="submit" class="btn btn-outline-success"> <i class="fa fa-save"> </i> Guardar</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection