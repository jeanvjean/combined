@extends('main')

@section('title','| Available Products')

@section('content')
   <div class="row">
        <div class="col-md-10">
            <h1>All Products</h1>
        </div>
    @if(Auth::check())
        <div class="col-md-2">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Post New Product</a>
        </div>
    @endif
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

                @foreach ($products as $product)
            <div class="thumbnail col-md-3">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>#{{ $product->price }}</p>
                    <a href="{{ route('products.addToCart',$product->id) }}" class="btn btn-success btn-block">Add To Cart</a>
            </div>
                @endforeach


        </div>
    </div>

@endsection
