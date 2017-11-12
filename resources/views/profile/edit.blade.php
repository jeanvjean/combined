@extends('main')

@section('title', '| update Profile')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/profile') }}/{{ Auth::user()->slug }}">Profile</a></li>
        <li><a href="#">Change Image</a></li>
    </ol>
    <div class="row">
        @if(Auth::user()->account_type == 'customer')

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}'s Profile</div>
                <div class="panel-body">
                    <h3 align="center">Update Profile</h3>
                        <br>
                        <div class="col-md-6 col-md-offset-3">
                            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                {{ Form::label('img','Profile Image:') }}
                                {{ Form::file('img',null, ['class'=>'form-control', 'accept'=>'image/']) }}

                                {{ Form::label('country','Country:') }}
                                {{ Form::text('country', $data->country, ['class'=>'form-control']) }}

                                {{ Form::label('city', 'City:') }}
                                {{ Form::text('city', $data->city, ['class'=>'form-control']) }}

                                {{ Form::label('address', 'Address:') }}
                                {{ Form::text('address', $data->address,['class'=>'form-control']) }}

                                {{ Form::label('phone_no','Phone No.:') }}
                                {{ Form::text('phone_no', $data->phone_no, ['class'=>'form-control']) }}

                                {{ Form::label('about', 'Bio:') }}
                                {{ Form::textarea('about',$data->about,['class'=>'form-control']) }}

                                {{ Form::submit('Save Update',['class'=>'btn btn-primary btn-sm', 'style'=>'margin-top:10px']) }}

                            </form>
                        </div>
                 </div>
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->firstname }}'s Profile</div>
                <div class="panel-body">
                    <br>
                    <h3 align="center">Update Profile</h3>
                    <br><br>
                        <div class="col-md-6 col-md-offset-3">
                            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                {{ Form::label('img','Profile Image:') }}
                                {{ Form::file('img',null, ['class'=>'form-control', 'accept'=>'image/']) }}

                                {{ Form::label('country','Country:') }}
                                {{ Form::text('country',$data->country, ['class'=>'form-control']) }}

                                {{ Form::label('city', 'City:') }}
                                {{ Form::text('city',$data->city, ['class'=>'form-control']) }}

                                {{ Form::label('brand', 'Brand:') }}
                                {{ Form::text('brand',$data->brand, ['class'=>'form-control']) }}

                                {{ Form::label('address', 'Address:') }}
                                {{ Form::text('address',$data->address, ['class'=>'form-control']) }}

                                {{ Form::label('website', 'Website:') }}
                                {{ Form::text('website', $data->website, ['class'=>'form-control']) }}

                                {{ Form::label('work_email', 'Company Email:') }}
                                {{ Form::text('work_email',$data->work_email, ['class'=>'form-control']) }}

                                {{ Form::label('phone_no','Phone No.:') }}
                                {{ Form::text('phone_no',$data->phone_no, ['class'=>'form-control']) }}

                                {{ Form::label('about', 'Bio:') }}
                                {{ Form::textarea('about',$data->about,['class'=>'form-control']) }}

                                {{ Form::submit('Save Update',['class'=>'btn btn-primary btn-sm', 'style'=>'margin-top:10px']) }}

                            </form>
                        </div>
                 </div>
            </div>
        </div>
    </div>
@endif
@endsection
