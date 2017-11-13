@extends('main')

@section('title','| Available Products')

@section('content')
   <div class="row">
        <div class="col-md-10">
            <h1>All Products</h1>
        </div>
@if (Auth::user()->account_type == 'designer')
    <div class="col-md-2">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Post New Product</a>
    </div>
@endif
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="">
        <div class="col-md-12">
            <div class="gallery">
        		<div class="container">
        			<h3 class="agileits-title">Shop</h3>
        			<div class="gallery-agileinfo">
                    @forelse ($products as $product)
        				<div class="col-md-4 col-xs-6 w3gallery-grids">
        					<a href="{{ url('../') }}/storage/image/{{ $product->image }}" class="imghvr-hinge-right figure">
        						<img height="450px" width="300px" style="border-redius:50%" src="{{ url('../') }}/storage/image/{{ $product->image }}" alt="" title="New Designs Image"/>
        						<div class="agile-figcaption">
        						  <h4>{{ $product->name }}</h4>
        						  <p>{{ $product->description }}</p>
        						  <p>By:{{ $product->user->profile->brand }}</p>
        						</div>
                                <div class="">
                                    <a href="{{ route('products.addToCart',$product->id) }}" class="btn btn-primary btn-sm">Add To Cart</a>
                                </div>
        					</a>
        				</div>
                    @empty
                        <div class="col-md-12">
                            <h3 align="center"><strong>This Shop Is Empty</strong></h3>
                        </div>
                    @endforelse
        				<div class="clearfix"> </div>
        				<script type="text/javascript" src="{{asset('js/simple-lightbox.min.js')}}"></script>
        				<script>
        					$(function(){
        						var gallery = $('.w3gallery-grids a').simpleLightbox({navText:		['&lsaquo;','&rsaquo;']});
        					});
        				</script>
        			</div>
        		</div>
        	</div>
        </div>
    </div>

@endsection
