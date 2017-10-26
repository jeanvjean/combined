@extends('main')

@section('title','Details')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-6 col-md-offset-3 thumbnail">
            <div class="">
                <img style="width:100%" src="/storage/image/{{ $product->image }}" alt="">
            </div>
            <div>
                <h3>{{ $product->name }}</h3>
            </div>
            <div>
                <p>{{ $product->description }}</p>
            </div>
            <div>
                <p>#{{ $product->price }}</p>
            </div>
        </div>
    </div>
</div>


@endsection
