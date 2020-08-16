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
                        {!! Form::open([ 'route' => 'take-weights.store', 'method' => 'POST', 'class' => 'form-horizontal form-material']) !!} {{ csrf_field() }}

                        {{ Form::hidden('code_id', $code_id) }}
                        {{ Form::hidden('purchase_id', $purchase_id) }}

                        <div class="form-group">
                            {!! Form::label('code_id', 'Código animalito') !!}
                            <div class="col-md-12">
                                {!! Form::text('code_id', $code_id, ['class' => 'form-control form-control-line', 'name' => 'code_id', 'disabled' => 'true', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('weight', 'Peso en libras') !!}
                            <div class="col-md-12">
                                {!! Form::text('weight', null , ['class' => 'form-control form-control-line', 'name' => 'weight', 'placeholder' => 'Ej: 15.25', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('registration_date', 'Fecha de registro') !!}
                            <div class="col-md-12">
                                {!! Form::date('registration_date', null , ['class' => 'form-control form-control-line', 'name' => 'registration_date', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{ url('/take-weights/'.$purchase_id) }}" class="btn btn-outline-info"><i class="fa fa-arrow-left"> </i> Regresar</a>
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