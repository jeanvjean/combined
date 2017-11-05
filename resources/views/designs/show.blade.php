@extends('main')

@section('title', "| $design->id")

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-6 col-md-offset-3 thumbnail">
                <div class="">
                    <img style="width:100%" src="{{ url('../') }}/storage/designs/{{ $design->design_img }}" alt="">
                </div>
                <div>
                    <h3>{{ $design->name }}</h3>
                </div>
                <div>
                    <p>{{ $design->description }}</p>
                </div>
                <div class="col-sm-6">
                    {!! Form::open(['route'=>['designs.destroy',$design->id], 'method'=>'DELETE']) !!}

                    {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}

                    {!! Form::close() !!}
                    <a href="{{ route('designs.edit',$design->id) }}" class="btn btn-success btn-sm btn-block" style="margin-top:5px">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
