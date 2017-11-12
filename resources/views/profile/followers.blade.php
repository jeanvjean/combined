@extends('main')

@section('title', '| Following')

@section('content')
<div class="container">

    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li><a href="">Friends</a></li>
    </ol>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}, Your Friends</div>

                <div class="panel-body">
                    <div class="col-sm-12 col-md-12">
                         @if ( session()->has('msg') )
                         <p class="alert alert-success">
                                      {{ session()->get('msg') }}
                                   </p>
                                @endif
                        @foreach($friends as $uList)

                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                            <div class="col-md-2 pull-left">
                                <img src="{{Storage::url($uList->img) }}" width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-7 pull-left">
                                <h3 style="margin:0px;"><a href="">{{ucwords($uList->name)}}</a></h3>
                                <p><b>Gender:</b> {{$uList->gender}}</p>
                                   <p><b>Email:</b> {{$uList->email}}</p>
                            </div>

                            <div class="col-md-3 pull-right">

                                     <p>

                                         <a href="{{url('/unfriend')}}/{{$uList->id}}"  class="btn btn-danger btn-sm">UnFriend</a>

                                     </p>

                            </div>

                        </div>
                        @endforeach
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
