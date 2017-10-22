@extends('main')

@section('title', '| update Profile')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/profile') }}/{{ Auth::user()->slug }}">Profile</a></li>
        <li><a href="#">Change Image</a></li>
    </ol>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->firstname }}'s Profile</div>
                <div class="panel-body">
                    <h3>Edit Profile</h3>
                    <div class="col-md-12">
                        <div class="thumbnail">
                            <h3 align="center">{{ Auth::user()->firstname }}</h3>
                            <img src="{{ url('../') }}/img/{{ Auth::user()->img }}" width="80px" height="80px">
                            <div class="caption">
                                <p align="center">{{ $data->city }} - {{ $data->country }}</p>
                                <p align="center"> <a href="{{ url('/') }}/changeImage" class="btn btn-primary btn-sm" role="button">Change Image</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h3>Update Profile</h3>
                        <div class="col-md-6 col-md-offset-3">
                            <form action="{{ url('updateProfile') }}" method="post">
                                {{ csrf_field() }}
                                {{ Form::label('country','Country:') }}
                                {{ Form::text('country', null, ['class'=>'form-control']) }}

                                {{ Form::label('city', 'City:') }}
                                {{ Form::text('city', null, ['class'=>'form-control']) }}

                                {{ Form::label('phone_no','Phone No.:') }}
                                {{ Form::text('phone_no', null, ['class'=>'form-control']) }}

                                {{ Form::label('about', 'Bio:') }}
                                {{ Form::textarea('about',null,['class'=>'form-control']) }}

                                {{ Form::submit('Save Update',['class'=>'btn btn-primary btn-sm', 'style'=>'margin-top:10px']) }}

                            </form>

                        </div>
                 </div>
            </div>
        </div>
    </div>

@endsection
