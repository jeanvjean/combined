@extends('main')

@section('title', '|Edit Design')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="">
            {!!Form::model($design, ['route'=>['designs.update',$design->id],'method'=>'PUT'])!!}
                {{ Form::label('design_img','Image:') }}
                {{ Form::file('design_img',null,['class'=>'form-control']) }}

                {{ Form::label('name', 'Design Name:') }}
                {{ Form::text('name',null,['class'=>'form-control']) }}

                {{ Form::label('category_id','Category:') }}
                <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                {{ Form::label('description','Design information:') }}
                {{ Form::textarea('description',null,['class'=>'form-control','rows'=>'3']) }}
                <div class="">
                    <div class="">
                        {{ Form::submit('Update Design',['class'=>'btn btn-primary btn-sm','style'=>'margin-top:5px']) }}
                    </div>
                    <br>
                    <div class="">
                      {{ Html::linkRoute('designs.show', 'Cancel', array($design->id),['class'=>'btn btn-danger','style'=>'margin-bottom:5px']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
