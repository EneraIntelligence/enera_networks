@extends('layouts.mainmat')

@section('title', 'Nodos')

@section('head_scripts')
    {!! HTML::style('assets/css/nodes.css') !!}
@stop

@section('content')
        <div class="col s12">
            <div class="card blue-grey white zero">
                <div class="card-content black-text show">
                    <span class="card-title">{{ $branch->name }}</span>
                    <p class="">{{ $branch->network->name }}</p>
                </div>
            </div>
        </div>

@endsection

@section('scripts')

@stop