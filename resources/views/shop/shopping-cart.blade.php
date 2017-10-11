@extends('main')

@section('title', ' My Cart')

@section('content')

    @if (Session::has('cart'))
        <div class="col-md-8">
            <ul class="list-group">
                @foreach ($products as $product)
                    <li class="list-group-item">
                        <span class="badge">{{ $product->qty }}</span>
                        <strong>{{ $product['item']['name'] }}</strong>
                        <span class="label label-success">{{ $product['price'] }}</span>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-xs
                             dropdown-toggle" data-toggle="dropdown" name="button">
                         Action <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                                <li><a href="#">Remove 1</a></li>
                                <li><a href="#">Remove all</a></li>
                         </ul>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-3">
            <div class="well">
                <strong>Total: {{ $totalPrice }}</strong>
            </div>
            <hr>
            <div class="well">
                <a href="{{ route('checkout') }}" class="btn btn-success">checkout</a>
            </div>
        </div>
        @else
            <div class="well">
                <h2>Cart is empty..!!</h2>
            </div>
    @endif


@endsection
