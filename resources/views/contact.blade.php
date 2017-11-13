@extends('main')

@section('title', '|contact')

@section('content')
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <h1>contact Us</h1>
                <h6>Send A Mail To Our Admin</h6>
                <hr>
                <form action="{{ url('contact') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-md-8 col-md-offset-2">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="email" name="message">Email:</label>
                                <input class="form-control" placeholder="your email" type="text" name="email" id="email">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="subject" name="subject">Name:</label>
                                <input class="form-control" placeholder="input your Name" type="text" name="name" id="subject">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="message" name="message">Message:</label>
                                {{ Form::textarea('message',null,['class'=>'form-control','id'=>'message']) }}
                            </div>
                            <input type="submit" value="submit" class="btn btn-success btn-sm">
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
