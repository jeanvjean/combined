@extends('main')

@section('title','| Notifications')

@section('content')
<div class="container">

    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li><a href="">Edit Profile</a></li>
    </ol>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}</div>

                <div class="panel-body">
                    <div class="col-sm-12 col-md-12">
                         @if ( session()->has('msg') )
                         <p class="alert alert-success">
                                      {{ session()->get('msg') }}
                                   </p>
                                @endif
                        @foreach($messages as $message)

                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">

                            <ul>
                                <li>
                                    <p><a href="{{url('/profile')}}/{{$message->slug}}" style="font-weight: bold; color:green">
                                            {{$message->name}}</a> {{$message->message}}</p>
                                </li>
                            </ul>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
