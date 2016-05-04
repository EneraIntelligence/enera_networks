@extends('layouts.mainmat')

@section('title', 'Nodos')

@section('head_scripts')
    {!! HTML::style('assets/css/nodes.css') !!}
@stop

@section('content')
    <ul class="collapsible  hide-on-med-and-up menu" data-collapsible="accordion">
        <li>
            <div class="collapsible-header">
                <div class="row zero">
                    <div class="col s6" style="text-align: center;">
                        <span>Nombre</span>
                    </div>
                    <div class="col s6" style="text-align: right;">
                        <span>Nodos</span>
                    </div>
                </div>
            </div>
        </li>
        @foreach($branches as $branche)
            <li>
                <div class="collapsible-header">
                    <span class="icon-menu">
                        {{strtoupper(substr($branche->name, 0, 2)) }}
                    </span>
                    <span>
                        {{$branche->name}}
                    </span>
                    <span class="data-menu" style="padding: 0 10px 0 0;">
                        {{ $branche->campaign_logs()->where('interaction.welcome_loaded','exists',true)->count() }}
                        / {{ count($branche->aps) }}
                    </span>
                </div>
                <div class="collapsible-body">
                    <ul class="list black-text">
                        <li data-icon="keyboard_arrow_right">Status: {{$branche->status}}</li>
                        <li data-icon="keyboard_arrow_right">Globales: {{($branche->filters['external_ads']) ? 'Activas' : 'Inactivas'}}</li>
                        <li data-icon="keyboard_arrow_right">Aps: {{count($branche->aps)}}</li>
                        <li data-icon="keyboard_arrow_right">Red: {{$branche->network->name}}</li>
                    </ul>
                    <a href="{{route('branches::show', ['id' => $branche->id])}}" class="center">Ver más detalles</a>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="hide-on-small-only">
        <div class="row">
            @foreach($branches as $branche)
                <div class="col m4 l3">
                    <div class="card blue-grey white">
                        <div class="card-content white-text">
                            <span class="card-title black-text">{{$branche->name}}</span>
                            <ul class="list black-text">
                                <li data-icon="keyboard_arrow_right">Status: {{$branche->status}}</li>
                                <li data-icon="keyboard_arrow_right">Globales: {{($branche->filters['external_ads']) ? 'Activas' : 'Inactivas'}}</li>
                                <li data-icon="keyboard_arrow_right">Aps: {{count($branche->aps)}}</li>
                                <li data-icon="keyboard_arrow_right">Red: {{$branche->network->name}}</li>
                            </ul>
                        </div>
                        <div class="card-action ">
                            <a href="{{route('branches::show', ['id' => $branche->id])}}">Ver más detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.collapsible').collapsible({
                accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            });
        });
    </script>
@stop

