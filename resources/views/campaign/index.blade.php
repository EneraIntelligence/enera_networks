@extends('layouts.main')

@section('title', 'Campañas')

@section('head_scripts')
@stop

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <div class="md-card-list-wrapper" id="mailbox">
                <div class="uk-width-large-8-10 uk-container-center">
                    <div class="md-card-list">
                        <div class="md-card-list-header heading_list">Campañas</div>
                        <div class="md-card-list-header md-card-list-header-combined heading_list"
                             style="display: none">All Messages
                        </div>
                        <span class="md-card-list-item-sender" style="text-align: center;">{{'Nombre'}}</span>
                        <div class="md-card-list-item-sender" style="text-align: center;">
                            <span>{{ 'Tipo' }}</span>
                        </div>
                        <div class="md-card-list-item-sender" style="width: 350px; text-align: left;">
                            <span>{{ 'Días de interacción' }}</span>
                        </div>
                        <div class="md-card-list-item-sender" style="width: 100px; text-align: center;">
                                        <span>
                                            Completadas
                                        </span>
                        </div>
                        <div class="md-card-list-item-sender" style="width: 200px; text-align: right;">
                            <span>Fecha de terminación</span>
                        </div>
                        <ul class="hierarchical_slide">
                            @foreach($campaigns as $campaign)
                                <li>
                                    <span class="md-card-list-item-date">{{date('Y-m-d',$campaign->filters['date']['end']->sec)}}</span>
                                    <div class="md-card-list-item-avatar-wrapper">
                                        <span class="md-card-list-item-avatar md-bg-cyan">um</span>
                                    </div>
                                    <div class="md-card-list-item-sender">
                                        <span>{{ $campaign->name }}</span>
                                    </div>
                                    <div class="md-card-list-item-sender" style="width: 120px;">
                                        <span>{{ $campaign->interaction['name'] }}</span>
                                    </div>
                                    <div class="md-card-list-item-sender" style="width: 400px;">
                                        <span>
                                            @if(isset($campaign->filters['week_days'] ))
                                                @foreach($campaign->filters['week_days'] as $dia)
                                                    {{ trans('days.'.$dia) }},
                                                @endforeach
                                            @else
                                                no definido
                                            @endif
                                        </span>
                                    </div>
                                    <div class="md-card-list-item-subject" style="width: 100px;">
                                        <span>2323</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
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

@stop

