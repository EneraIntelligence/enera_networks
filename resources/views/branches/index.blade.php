@extends('layouts.main')

@section('title', 'Nodos')

@section('head_scripts')
@stop

@section('content')
    <div id="page_heading">
        <h1>{{ $network->name }}</h1>
        <span class="uk-text-muted uk-text-upper uk-text-small">
            <b>W: {{ number_format($welcome,0,'.',',') }}</b> |
            <b>J: {{ number_format($joined,0,'.',',') }}</b> |
            <b>R: {{ number_format($requested,0,'.',',') }}</b> |
            <b>L: {{ number_format($loaded,0,'.',',') }}</b> |
            <b>C: {{ number_format($completed,0,'.',',') }}</b> |
        </span>
    </div>

    <div id="page_content">
        <div id="page_content_inner">
            <div class="md-card-list-wrapper" id="mailbox">
                <div class="uk-width-large-8-10 uk-container-center">
                    <div class="md-card-list">
                        <ul class="hierarchical_slide">
                            @if(count($branches) == 0)
                                <li>
                                    <span class="md-card-list-item-date"></span>
                                    <span class="md-card-list-item-date"></span>
                                    <div class="md-card-list-item-avatar-wrapper">
                                        <img src="assets/img/avatars/avatar_08_tn@2x.png"
                                             class="md-card-list-item-avatar dense-image dense-ready" alt="">
                                    </div>
                                    <div class="md-card-list-item-sender">

                                    </div>
                                    <div class="md-card-list-item-subject">
                                        <span>Sin nodos en esta red.</span>
                                    </div>
                                </li>
                            @endif
                            @foreach($branches as $branche)
                                <li style=" cursor: pointer;"
                                    onclick="window.location.href='{!! route('branches::show',['id' => $branche->_id]) !!}'">
                                    <span class="md-card-list-item-date">
                                        {{ $branche->campaign_logs()->where('interaction.welcome_loaded','exists',true)->count() }}
                                        / {{ count($branche->aps) }}
                                    </span>
                                    <span class="md-card-list-item-date">

                                    </span>
                                    <div class="md-card-list-item-avatar-wrapper">
                                        <span class="md-card-list-item-avatar md-bg-light-{!! $branche->status == 'active'?'green':'blue'!!}">
                                            {{ strtoupper(substr($branche->name, 0, 2)) }}
                                        </span>
                                    </div>
                                    <div class="md-card-list-item-sender">
                                        <span>{{ $branche->name }}</span>
                                    </div>
                                    <div class="md-card-list-item-subject">

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="md-fab-wrapper md-fab-in-card" id="button" style="position: fixed; bottom: 25px; right: 25px;">
        <div class="md-fab md-fab-accent md-fab-sheet">
            <i class="material-icons md-color-white">&#xE145;</i>
            <div class="md-fab-sheet-actions">
                <a href="#" class="md-color-white"><i
                            class="material-icons md-color-white">&#xE8DC;</i> Aceptar</a>
                <a href="#" class="md-color-white"><i
                            class="material-icons md-color-white">&#xE8DB;</i> Rechazar</a>
            </div>
        </div>
    </div>




    {{--<div class="md-fab-wrapper">--}}
    {{--<a class="md-fab md-fab-accent md-fab-wave" href="#mailbox_new_message" data-uk-modal="{center:true}">--}}
    {{--<i class="material-icons">&#xE150;</i>--}}
    {{--</a>--}}
    {{--</div>--}}

    {{--<div class="uk-modal" id="mailbox_new_message">--}}
    {{--<div class="uk-modal-dialog">--}}
    {{--<button class="uk-modal-close uk-close" type="button"></button>--}}
    {{--<form>--}}
    {{--<div class="uk-modal-header">--}}
    {{--<h3 class="uk-modal-title">Compose Message</h3>--}}
    {{--</div>--}}
    {{--<div class="uk-margin-medium-bottom">--}}
    {{--<label for="mail_new_to">To</label>--}}
    {{--<input type="text" class="md-input" id="mail_new_to"/>--}}
    {{--</div>--}}
    {{--<div class="uk-margin-large-bottom">--}}
    {{--<label for="mail_new_message">Message</label>--}}
    {{--<textarea name="mail_new_message" id="mail_new_message" cols="30" rows="6"--}}
    {{--class="md-input"></textarea>--}}
    {{--</div>--}}
    {{--<div id="mail_upload-drop" class="uk-file-upload">--}}
    {{--<p class="uk-text">Drop file to upload</p>--}}
    {{--<p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p>--}}
    {{--<a class="uk-form-file md-btn">choose file<input id="mail_upload-select" type="file"></a>--}}
    {{--</div>--}}
    {{--<div id="mail_progressbar" class="uk-progress uk-hidden">--}}
    {{--<div class="uk-progress-bar" style="width:0">0%</div>--}}
    {{--</div>--}}
    {{--<div class="uk-modal-footer">--}}
    {{--<a href="#" class="md-icon-btn"><i class="md-icon material-icons">&#xE226;</i></a>--}}
    {{--<button type="button" class="uk-float-right md-btn md-btn-flat md-btn-flat-primary">Send</button>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}

    @stop

    @section('scripts')

            <!-- slider script -->
    {{--{!! HTML::script('js/preview_helper.js') !!}--}}

    {!! HTML::script('bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') !!}
    {!! HTML::script('bower_components/ionrangeslider/js/ion.rangeSlider.min.js') !!}
    {!! HTML::script('bower_components/countUp.js/countUp.js') !!}
    {!! HTML::script('js/circle-progress.js') !!}
    {!! HTML::style('css/show.css') !!}

            <!-- page specific plugins -->
    <!-- d3 -->
    {{--<script src="bower_components/d3/d3.min.js"></script>--}}
    {!! HTML::script('bower_components/d3/d3.min.js') !!}
            <!-- metrics graphics (charts) -->
    {{--<script src="bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>--}}
            <!-- c3.js (charts) -->
    {!! HTML::script('bower_components/c3js-chart/c3.min.js') !!}
            <!-- chartist -->
    {{--<script src="bower_components/chartist/dist/chartist.min.js"></script>--}}
            <!-- links para que funcione la grafica demografica  -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!--  charts functions -->
    {{--<script src="assets/js/pages/plugins_charts.min.js"></script>--}}

    {!! HTML::script('js/ajax/graficas.js') !!}

@stop

