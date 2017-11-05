@extends('main')

@section('title', '| Categories')

@section('content')
<div class="">
    <div class="col-md-12">
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
                <div class="">
                    <div class="col-md-12">
                        @forelse ($products as $product)
                                <div class="col-md-4 thumbnail">
                                    <div class="">
                                        <img style="width:300px,height:450px" src="{{ url('../') }}/storage/image/{{ $product->image }}" alt="">
                                    </div>
                                    <div>
                                        <h3>{{ $product->name }}</h3>
                                    </div>
                                    <div>
                                        <p>{{ $product->description }}</p>
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
                </div>
            @endif
        </section>
    </div>
</div>
@endsection
