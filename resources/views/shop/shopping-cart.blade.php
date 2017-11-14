@extends('main')

@section('title', ' My Cart')

@section('content')
    <div class="row">
        @if (Session::has('cart'))
            <div class="col-md-8">
                <ul class="list-group">
                    @foreach ($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{ $product['qty'] }}</span>
                            <strong>{{ $product->name }}</strong>
                            <span class="label label-success">{{ $product->price }}</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-xs
                                 dropdown-toggle" data-toggle="dropdown" name="button">
                             Remove <span class="caret"></span></button>
                             <ul class="dropdown-menu">
                                    <li><a href="{{ route('products.removeOne',['id'=>$product['item']['id']]) }}">Remove 1</a></li>
                                    <li><a href="{{ route('products.removeAll',['id'=>$product['item']['id']]) }}">Remove all</a></li>
                             </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-md-3">
                        <a href="{{ route('checkout') }}" class="btn btn-success btn-sm">Checkout</a>
                </div>
                </div>
                @else
                    <div class="well">
                        <h2 align="center">Cart is empty..!!</h2>
                    </div>
            @endif
            </div>
    </div>

@endsection
