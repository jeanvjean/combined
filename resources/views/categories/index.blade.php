@extends('main')

@section('title', '| Categories')

@section('content')
<div class="row">
    <div class="col-md-8">
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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Products</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @endif
        </section>
    </div>
    <div class="col-md-3">
        <div class="well">
            <h2>New Category</h2>
            <form class="form-group" action="{{ route('categories.store') }}" method="post" data-app-validate="">
                {{ csrf_field() }}

                {{ Form::label('name','Name:') }}
                {{ Form::text('name',null,['class'=>'form-control', 'required'=>'']) }}

                {{ Form::submit('Create Category',['class'=>'btn btn-success btn-block', 'style'=>'margin-top:10px']) }}
            </form>
        </div>
    </div>
</div>

@endsection
