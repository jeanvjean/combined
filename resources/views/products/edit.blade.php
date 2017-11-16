@extends('main')

@section('title','Details')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3 thumbnail">
        {!! Form::model($product,['route'=>['products.update',$product->id]]) !!}
        <div>
            {{ Form::file('image',null,['class'=>'form-control']) }}
        </div>
        <div>
            {{ Form::text('product',null,['class'=>'form-control']) }}
        </div>
        <div>
            {{ Form::textarea('description',null,['class'=>'form-control']) }}
        </div>
        <div class="clearfix">
            {{ Form::text('price',null,['class'=>'form-control']) }}

        </div>
        <div>
            {{ form::submit('Save',['class'=>'btn btn-success']) }}
        </div>
        <div class="">
                {!! Html::linkRoute('products.show','Cancel',[$product->id],['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>


@endsection
