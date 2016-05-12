@extends('layouts.mainmat')

@section('title', 'Campañas')

@section('head_scripts')
    {!! HTML::style('assets/css/campaign.css') !!}
@stop

@section('content')
    <ul class="collapsible  hide-on-med-and-up menu" data-collapsible="accordion">
        <li>
            <div class="collapsible-header">
                <div class="row zero">
                    <div class="col s6" style="text-align: center;">
                        <span>Nombre</span>
                    </div>
                </div>
            </div>
        </li>

        @foreach($campaigns as $campaign)
            <li>
                <div class="collapsible-header">
                    <span class="icon-menu">
                        {{strtoupper(substr($campaign->name, 0, 2)) }}
                    </span>
                    <span>
                        {{$campaign->name}}
                    </span>
                </div>
                <div class="collapsible-body">
                    <ul class="list black-text">
                        <li data-icon="keyboard_arrow_right">Status: {{$campaign->status}}</li>
                        <li data-icon="keyboard_arrow_right">Administrador: {{$campaign->administrator->name['first'].
                        ' '. $campaign->administrator->name['last']}}</li>
                        <li data-icon="keyboard_arrow_right">
                            Inicio: {{date('Y-m-d',$campaign->filters['date']['start']->sec)}}</li>
                        <li data-icon="keyboard_arrow_right">
                            Terminación: {{date('Y-m-d',$campaign->filters['date']['end']->sec)}}</li>
                        <li data-icon="keyboard_arrow_right">Dias:
                            @if(isset($campaign->filters['week_days'] ))
                                @foreach($campaign->filters['week_days'] as $dia)
                                    {{ trans('days.'.$dia) }},
                                @endforeach
                            @else
                                no definido
                            @endif
                        </li>
                    </ul>
                    <a href="{{route('campaigns::show', ['id' => $campaign->id])}}" class="center">Ver más detalles</a>
                </div>
            </li>
        @endforeach
    </ul>


    <div class="hide-on-small-only">
        <div class="row">
            @foreach($campaigns as $campaign)
                <div class="col m6 l4">
                    <div class="card blue-grey white">
                        <div class="card-content white-text">
                            <div class="card-image">
                                <img src="{{"https://s3-us-west-1.amazonaws.com/enera-publishers/items/". ($campaign->interaction['name'] != 'survey' ? $campaign->content['images']['large'] : $campaign->content['images']['survey'])}}"
                                class="responsive-img">
                                <span class="card-title">{{$campaign->name}}</span>
                            </div>
                            {{--<span class="card-title black-text">{{$campaign->name}}</span>--}}
                            <ul class="list black-text">
                                <li data-icon="keyboard_arrow_right">Status: {{$campaign->status}}</li>
                                <hr>
                                <li data-icon="keyboard_arrow_right">Administrador: {{$campaign->administrator->name['first'].
                        ' '. $campaign->administrator->name['last']}}</li>
                                <hr>
                                <li data-icon="keyboard_arrow_right">
                                    Inicio: {{date('Y-m-d',$campaign->filters['date']['start']->sec)}}</li>
                                <hr>
                                <li data-icon="keyboard_arrow_right">
                                    Terminación: {{date('Y-m-d',$campaign->filters['date']['end']->sec)}}</li>
                                <hr>
                                <li data-icon="keyboard_arrow_right">Dias:
                                    @if(isset($campaign->filters['week_days'] ))
                                        @foreach($campaign->filters['week_days'] as $dia)
                                            {{ trans('days.'.$dia) }},
                                        @endforeach
                                    @else
                                        no definido
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="card-action ">
                            <a href="{{route('campaigns::show', ['id' => $campaign->id])}}">Ver más detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@stop

@section('scripts')

@stop

