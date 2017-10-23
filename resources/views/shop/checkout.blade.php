@extends('main')

@section('title', '| Checkout')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Checkout</h1>

            <h4>Total Price:#{{ $total }}</h4>

            <form action="{{ route('checkout') }}" method="post" data-app-validate="">
                {{ csrf_field() }}
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" required="">
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="address">Addrss</label>
                        <input type="text" id="address" class="form-control" required="">
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="card-name">Card Holder Name</label>
                        <input type="text" id="card-name" class="form-control" required="">
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="card-number">Card Number</label>
                        <input type="text" id="card-number" class="form-control" required="">
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="expiration-month">Expiration Month</label>
                            <input type="text" id="expiration-month" class="form-control" required="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="expiration-year">Expiration Yearr</label>
                            <input type="text" id="expiration-year" class="form-control" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="ccv">CCV</label>
                        <input type="text" id="ccv" class="form-control" required="">
                    </div>
                    <button type="submit" class="btn btn-success">Proceed to Checkout</button>
                </div>
            </form>
        </div>
    </div>

@endsection
