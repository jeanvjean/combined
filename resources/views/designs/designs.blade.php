@extends('main')

@section('title', '| All Designs')

@section('content')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 align="center">Designs by our designers</h2>
            </div>
            <div class="panel-body">
                @forelse ($designs as $design)
                    <div class="col-md-10 col-md-offset-1">
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <img src="{{ url('../') }}/storage/designs/{{ $design->design_img }}">
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h3 align="center">No New Designs</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection
