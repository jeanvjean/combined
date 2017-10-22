@extends('main')

@section('title',"| Profile")

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ Auth::user()->firstname }}
            </div>
            <img src="{{ url('../') }}/img/{{ Auth::user()->img }}" width="100px" height="100px"><br>
            <br>
            <hr>

            <form action="{{ url('/') }}/uploadImage" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" class="form-control">

                {{ Form::submit('Save',['class'=>'btn btn-primary btn-sm','style'=>'margin-top:10px']) }}
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
