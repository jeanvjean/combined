@extends('main')

@section('title', '| Followers')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li><a href="{{ url('editProfile') }}/{{Auth::user()->slug}}">Edit Profile</a></li>
    </ol>
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}</div>

                <div class="panel-body">
                    <div class="col-sm-12 col-md-12">
                        @foreach($FriendRequests as $uList)

                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                            <div class="col-md-2 pull-left">
                                <img src="{{Storage::url($uList->img) }}" width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-7 pull-left">
                                <h3 style="margin:0px;"><a href="">{{ucwords($uList->name)}}</a></h3>

                                <p><b>Gender:</b> {{$uList->sex}}</p>
                                   <p><b>Email:</b> {{$uList->email}}</p>

                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
