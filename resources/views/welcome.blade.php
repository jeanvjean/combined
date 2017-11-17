@extends('main')

@section('title','| Home')

@section('content')

    <div class="w3-row">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
        </ol>
        <div class="welcome agileits">
		<div class="container">
			<div class="welcome-w3lsrow">
				<div class="col-md-5 col-sm-5 w3welcome-left">
					<div class="w3welcome-text">
						<h5 class="w3l-subtitle">New Trends</h5>
						<p>For your quick,prompt and quality patronise Quikie, we are dedicated to giving you the best service money can buy
                        with the aid of our ever reliable group of tailors and designers we bring to you our valued customer, the newest and
                    trend driven designs of the century.<br> <strong>Stick with us and you will not be disapointed.</strong></p>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 w3welcome-img">

				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="welcome-w3lsrow2">
                @forelse ($designs as $design)
                    <div class="col-sm-3 col-xs-3 w3welcome-grids">
                        <img src="{{ url('../') }}/storage/designs/{{ $design->design_img }}" class="img-responsive">
                        <p>Design By:{{ $design->user->profile->brand }}</p>
                    </div><br>
                @empty
                    <div class="text-center">
                        No New Trends
                    </div>
                @endforelse
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //welcome -->
	<!-- services -->
	<div class="services">
		<div class="container">
			<h3 class="agileits-title">Services</h3>
			<div class="services-agileinfo">
				<div class="col-sm-3 col-xs-6 services-w3grids">
					<h5>1</h5>
					<h6>Fast And Low Priced delivery</h6>
				</div>
				<div class="col-sm-3 col-xs-6 services-w3grids">
					<h5>2</h5>
					<h6>Choiced Designs (choose a design and a tailor that best suits you) </h6>
				</div>
				<div class="col-sm-3 col-xs-6 services-w3grids">
					<h5>3</h5>
					<h6>Home Delivery</h6>
				</div>
				<div class="col-sm-3 col-xs-6 services-w3grids">
					<h5>4</h5>
					<h6>Special Orders, wedding gowns, bridal train, suit etc. </h6>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //services -->
	<!-- w3-agilesale -->
	<div class="w3-agilesale welcome">
		<div class="container">
			<h3 class="agileits-title">FAST DELIVERY</h3>
			<p><a href="{{ url('contact') }}">Contact us</a></p>
		</div>
	</div>
	<!-- //w3-agilesale -->
	<!-- subscribe -->
        <div class="subscribe wthree-sub">
            <div class="container">
                <div class="w3lsfoter-icons social-icon">
                    <a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="social-button dribbble"><i class="fa fa-dribbble"></i></a>
                </div>
            </div>
        </div>
@endsection
