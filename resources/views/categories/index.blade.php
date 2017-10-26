@extends('main')

@section('title', '| Categories')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="navbar">
            <h3>Categories</h3>
            <ul class="nav navbar-nav">
                @if(!empty($categories))
                    @forelse ($categories as $category)
                        <li>
                            <a href="{{ route('categories.show',$category->id) }}">{{$category->name}}</a>
                        </li>
                    @empty
                        <li>No data</li>
                    @endforelse
                @endif
            </ul>
        </div>
            @if(!empty($products))
        <section>
            <h2>Products</h2>
                <div class="col-md-8">
                    <div class="col-md-4">
                        <h3>Products</h3>
                        @forelse ($products as $product)
                        <div class="thumbnail">
                            <div class="">
                                {{ $product->name }}</td>
                            </div>
                            <div class="">
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="">
                                <p>{{ $product->price }}</p>
                            </div>
                            <div class="clearfix">
                                <a href="{{ route('products.addToCart',$product->id) }}" class="btn btn-xs btn-success pull-right">Add To Cart</a>
                            </div>
                        </div>
                        @empty
                            <tr>
                                <td>No Product Available in this Category</td>
                            </tr>
                        @endforelse

                   </div>
                </div>
            @endif
        </section>
    </div>
</div>

@endsection
