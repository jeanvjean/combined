@extends('main')

@section('title',"| Profile")

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/profile') }}/{{ Auth::user()->slug }}">Profile</a></li>
        <li><a href="{{ url('/editProfile') }}/{{ Auth::user()->slug }}">Edit profile</a></li>
    </ol>
    @if (Auth::user()->account_type == 'customer')
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
            <div class="">

            </div>
        </div>
    @else
        <div class="about agileinfo">
    		<div class="container">
    			<h3 class="agileits-title">My Profile</h3>
    			<div class="col-md-8 about-w3left">
    				<h4>About Me</h4>
    				<p>{{ $data->about }}</p>
    			</div>
    			<div class="col-md-4 about-w3right">
    				<img src="{{ url('../') }}/img/{{ Auth::user()->img }}" width="100px" height="100px"><br><br>
                    <p align="center"> <a href="{{ url('/editProfile') }}/{{ Auth::user()->slug }}" class="btn btn-primary btn-sm" role="button">Edit Profile</a>
    			</div>
    			<div class="clearfix"> </div>
    		</div>
	   </div>
	<div class="col-md-12">
        <div class="contact">
		<div class="container">
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-right">
                    	<h3 class="agileits-title">Leave A Message</h3>
					<form action="#" method="post">
						<input type="text" name="Name" placeholder="Name" required="">
						<input type="text" class="email" name="Email" placeholder="Email" required="">
						<input type="text" name="Phone no" placeholder="Phone" required="">
						<textarea name="Message" placeholder="Message" required=""></textarea>
						<input type="submit" class="" value="SUBMIT" >
					</form>
				</div>
				<div class="col-md-5 contact-left" style="background:#ffffff">
                    <h3 class="agileits-title">Contact Me</h3>
					<div class="address">
						<h5>Address:</h5>
						<p><i class="glyphicon glyphicon-home"></i>{{ $data->address }}</p>
					</div>
					<div class="address address-mdl">
						<h5>Phones:</h5>
						<p><i class="glyphicon glyphicon-earphone"></i>{{ $data->phone_no }}</p>
					</div>
					<div class="address">
						<h5>Website:</h5>
						<p><i class="glyphicon glyphicon-envelope"></i> <a href="{{ $data->website }}">{{ $data->website }}</a></p>
					</div>
					<div class="address">
						<h5>Email:</h5>
						<p><i class="glyphicon glyphicon-envelope"></i> <a href="#">{{ $data->work_email }}</a></p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	</div>
	<div class="team">
		<div class="container">
			<h3 class="agileits-title">My Designs</h3>
			<div class="team-row w3ls-team-row">
                @forelse ($designs as $design)
                    <div class="col-md-3 col-sm-3 col-xs-6 team-wthree-grids">
                        <div class="w3ls-effect">
                            <img src="{{ url('../') }}/storage/designs/{{ $design->design_img }}" alt="img">
                            <div class="w3layouts-caption">
                                <h4>{{ $design->name }}</h4>
                                <p>{{ $design->description }}</p>
                                <p>{{ $design->category->name }}</p>
                            </div>
                            <div class="wthree-icon social-icon">
                                <a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                        @if (Auth::user()->profile)
                            <a href="{{ route('designs.show',$design->id) }}" class="btn btn-success btn-sm">Details</a>
                        @endif
                    </div>
                @empty
                    <div class="text-center">
                        <h3>Upload New Designs In Ur profile </h3>
                    </div>
                @endforelse
				<div class="clearfix"> </div>
                <hr>
                <div class="col-md-8 col-md-offset-2">
                    <div class="">
                        <form class="" action="{{ url('design') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ Form::label('design_img','Image:') }}
                            {{ Form::file('design_img',null,['class'=>'form-control']) }}

                            {{ Form::label('name', 'Design Name:') }}
                            {{ Form::text('name',null,['class'=>'form-control']) }}

                            {{ Form::label('category_id','Category:') }}
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {{ Form::label('description','Design information:') }}
                            {{ Form::textarea('description',null,['class'=>'form-control','rows'=>'3']) }}

                            {{ Form::submit('Upload Design',['class'=>'btn btn-primary btn-sm','style'=>'margin-top:5px']) }}
                        </form>
                    </div>
                </div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
    @endif
</div>
@endsection
