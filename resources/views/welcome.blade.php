@extends('main')

@section('title','| Home')

@section('content')

    <div class="w3-row">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
        </ol>
        <div class="col-md-8 col-md-offset-2">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="thumbnail">
                            <img style="width:100%" src="/storage/image/{{ $product->image }}" alt="">
                        <div>
                            <h4>{{ $product->name }}</h4>
                        </div>
                        <div>
                            <p>{{ $product->description }}</p>
                        </div>
                        <div>
                            <p>#{{ $product->price }}</p>
                        </div>
                        <div class="clearfix">
                            <p><a class="btn btn-success btn-sm pull-right" href="{{ route('products.addToCart',$product->id) }}">Add To Cart</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
