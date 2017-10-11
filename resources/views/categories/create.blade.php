@extends('main')

@section('title','| Create New Category')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="form-group" action="{{ route('categories.store') }}" method="post" data-app-validate="">
                {{ csrf_field() }}
                <h2>New Category</h2>
                {{ Form::label('name','Name:') }}
                {{ Form::text('name',null,['class'=>'form-control', 'required'=>'']) }}

                {{ Form::submit('Create Category',['class'=>'btn btn-success btn-block', 'style'=>'margin-top:10px']) }}
            </form>
        </div>
    </div>

@endsection
