@extends('layouts.main')

@section('title', 'Nodos')

@section('head_scripts')
    {!! HTML::style('assets/css/campaign.css') !!}
    {!! HTML::style('bower_components/c3js-chart/c3.min.css') !!}
@stop

@section('content')
    <div id="page_heading">
        <h1>{{ $branch->name }}</h1>
        <span class="uk-text-muted uk-text-upper uk-text-small">
           {{  $network->name }}
        </span>
    </div>

    <div id="page_content_inner">
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            <div class="uk-width-xLarge-2-10 uk-width-large-3-10 uk-row-first">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Portal
                        </h3>
                    </div>
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                Detalles
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <ul class="md-list">
                                <li>
                                    <div class="md-list-content">
                                        <span class="uk-text-small uk-text-muted uk-display-block">Antenas</span>
                                    <span class="md-list-heading uk-text-large uk-text-success">
                                        {{ count($branch->aps) }}
                                    </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-content">
                                        <span class="uk-text-small uk-text-muted uk-display-block">Conexiones</span>
                                    <span class="md-list-heading uk-text-large">
                                        {{ number_format($branch->campaign_logs()->count(),0,'.',',') }}
                                    </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-content">
                                        <span class="uk-text-small uk-text-muted uk-display-block">Dispositivos detectados</span>
                                    <span class="md-list-heading uk-text-large">
                                        {{ number_format($devices,0,'.',',') }}
                                    </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-content">
                                        <span class="uk-text-small uk-text-muted uk-display-block">Usuarios recolectados</span>
                                    <span class="md-list-heading uk-text-large">
                                        {{ number_format($users,0,'.',',') }}
                                    </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="uk-width-xLarge-8-10  uk-width-large-7-10">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Ubicación
                        </h3>
                    </div>
                    <div class="md-card-content large-padding" style="padding: 5px 35px;">
                        <div class="uk-grid uk-grid-divider uk-grid-medium">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection

    @section('scripts')
    {!! HTML::script('js/preview_helper.js') !!}
    {!! HTML::script('http://maps.google.com/maps/api/js') !!}
            <!-- d3 -->
    {{--<script src="bower_components/d3/d3.min.js"></script>--}}
    {!! HTML::script('bower_components/d3/d3.min.js') !!}
            <!-- metrics graphics (charts) -->
    {{--<script src="bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>--}}
            <!-- c3.js (charts) -->
    {!! HTML::script('bower_components/c3js-chart/c3.min.js') !!}


    {!! HTML::script('bower_components/d3/d3.min.js') !!}
    {!! HTML::script('js/d3.layout.cloud.js') !!}
@stop