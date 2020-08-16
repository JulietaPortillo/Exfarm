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
                        {!! Form::open([ 'route' => 'purchases.store', 'method' => 'POST', 'class' => 'form-horizontal form-material']) !!} {{ csrf_field() }}

                        <div class="form-group">
                            {!! Form::label('code', 'Codigo animalito') !!}
                            <div class="col-md-12">
                                {!! Form::text('code', null , ['class' => 'form-control form-control-line', 'name' => 'code', 'placeholder' => 'Ej: CD-0125', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Descripción') !!}
                            <div class="col-md-12">
                                {!! Form::text('description', null , ['class' => 'form-control form-control-line', 'name' => 'description', 'placeholder' => 'Ej: Porcino', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('weight', 'Peso en libras') !!}
                            <div class="col-md-12">
                                {!! Form::text('weight', null , ['class' => 'form-control form-control-line', 'name' => 'weight', 'placeholder' => 'Ej: 15.25', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('purchase_price', 'Precio de compra') !!}
                            <div class="col-md-12">
                                {!! Form::number('purchase_price', null , ['class' => 'form-control form-control-line', 'name' => 'purchase_price', 'step' => '0.01', 'placeholder' => 'Ej: 0.00', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('purchase_date', 'Fecha de compra') !!}
                            <div class="col-md-12">
                                {!! Form::date('purchase_date', null , ['class' => 'form-control form-control-line', 'name' => 'purchase_date', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('age', 'Edad en meses') !!}
                            <div class="col-md-12">
                                {!! Form::number('age', null , ['class' => 'form-control form-control-line', 'name' => 'age', 'step' => '0', 'placeholder' => 'Ej: 0', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{ url('/purchases') }}" class="btn btn-outline-info"><i class="fa fa-arrow-left"> </i> Regresar</a>
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