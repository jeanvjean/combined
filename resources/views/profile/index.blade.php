@extends('main')

@section('title',"| Profile")

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ Auth::user()->name }}
            </div>
            <div class="panel-body">
            <img src="{{ url('../') }}/img/{{ Auth::user()->img }}" width="80px" height="80px"><br>
            <a href="#">Add Profile picture</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
                
            </div>
        </div>
    </div>
</div>

@endsection
