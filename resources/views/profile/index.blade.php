@extends('main')

@section('title',"| Profile")

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/profile') }}/{{ Auth::user()->slug }}">Profile</a></li>
        <li><a href="{{ url('/editProfile') }}/{{ Auth::user()->slug }}">Edit profile</a></li>
    </ol>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}'s Profile</div>
            <div class="panel-body">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <h3 align="center">{{ Auth::user()->firstname }}</h3>
                        <img src="{{ url('../') }}/img/{{ Auth::user()->img }}" width="100px" height="100px"  class="img-rounded">
                        <div class="caption">
                            <p align="center">{{ $data->city }} - {{ $data->country }}</p>
                            <p align="center"> <a href="{{ url('/editProfile') }}/{{ Auth::user()->slug }}" class="btn btn-primary btn-sm" role="button">Edit Profile</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4>About</h4>
                    <p>{{ $data->about }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
