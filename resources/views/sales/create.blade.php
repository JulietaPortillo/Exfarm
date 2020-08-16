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
                        {!! Form::open([ 'route' => 'sales.store', 'method' => 'POST', 'class' => 'form-horizontal form-material']) !!} {{ csrf_field() }}

                        {{ Form::hidden('purchase_id', $purchase) }}
                        {{ Form::hidden('code_id', $code) }}

                        <div class="form-group">
                            {!! Form::label('code_id', 'Código animalito') !!}
                            <div class="col-md-12">
                                {!! Form::text('code_id', $code , ['class' => 'form-control form-control-line', 'name' => 'code_id', 'disabled' => 'true', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('weight', 'Peso en libras') !!}
                            <div class="col-md-12">
                                {!! Form::text('weight', null , ['class' => 'form-control form-control-line', 'name' => 'weight', 'placeholder' => 'Ej: 15.25', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('sale_price', 'Precio de venta') !!}
                            <div class="col-md-12">
                                {!! Form::number('sale_price', null , ['class' => 'form-control form-control-line', 'name' => 'sale_price', 'step' => '0.01', 'placeholder' => 'Ej: 0.00', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('sale_date', 'Fecha de venta') !!}
                            <div class="col-md-12">
                                {!! Form::date('sale_date', null , ['class' => 'form-control form-control-line', 'name' => 'sale_date', 'required' => 'required']) !!}
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