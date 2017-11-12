@extends('main')

@section('title', '| Find Friends')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ Auth::user()->name }}
            </div>
            <div class="panel-body">
                 <div class="col-md-12">
                     @foreach ($allUsers as $uList)
                         <div class="col-md-2 pull-left">
                                <img src="{{Storage::url($uList->img) }}"
                                width="80px" height="80px" class="img-rounded"/>
                        </div>
                        <br>
                        <div class="col-md-7 pull-left">
                               <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$uList->slug}}">
                                 {{ucwords($uList->name)}}</a></h3>
                               <p><i class="fa fa-globe"></i> {{$uList->city}}  - {{$uList->country}}</p>
                               <p>{{$uList->account_type}}</p>

                        </div>
                        <hr>
                        <div>
                            <?php
                            $check = DB::table('followers')->where('requested', '=', $uList->id)
                            ->where('requester','=',Auth::user()->id)->first();


                        if($check == ''){
                            ?>
                            <a href="{{ url('/addFriend') }}/{{ $uList->id }}" class="btn btn-info btn-sm" style="margin-top:10px">Follow</a>
                        <?php } else {?>
                            <div class="">
                                <a href="{{ url('unfollow') }}/{{$uList->id}}" class="btn btn-primary btn-sm" style="margin-top:10px">UnFollow</a>
                            </div>
                        <?php }?>
                        </div>
                     @endforeach
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
