@extends('main')

@section('title', 'Create Product')

@section('content')

    <h2 align="center" style="margin-top:20px">Add Product</h2>
    <hr>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6 col-md-offset-2 thumbnail">
                <form action="{{route('products.store')}}" method="POST" data-app-validate="" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    {{ Form::label('image', 'Product Image') }}
                    {{ Form::file('image',null,['class'=>'form-control','required'=>'']) }}

                    {{ Form::label('name', 'Product:') }}
                    {{ Form::text('name',null,['class'=>'form-control','required'=>'']) }}

                    {{ Form::label('category_id','Category:') }}
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    {{ Form::label('description','Description:') }}
                    {{ Form::textarea('description',null,['class'=>'form-control', 'rows'=>'2','required'=>'']) }}


                    {{ Form::label('price','Price') }}
                    {{ Form::text('price',null,['class'=>'form-control','required'=>'']) }}
                        <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
