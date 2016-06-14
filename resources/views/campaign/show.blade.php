@extends('layouts.mainmat')
@section('head_scripts')
        <!-- c3.js (charts) -->
{!! HTML::style('bower_components/c3js-chart/c3.min.css') !!}
{!! HTML::style('assets/css/welcome.css') !!}
{!! HTML::style('assets/css/campaign.css') !!}


@endsection

@section('content')
    <?php $size = sizeof($cam->filters['day_hours']) ?>
    <div class="hide-on-med-and-up">
        <div class="col s14">
            <div class="card-panel grey darken-3 white-text avatar circle">
                <img class="svg" src="{!! URL::asset('images/icons/'.
                         CampaignStyle::getCampaignIcon( $cam->interaction['name']) ) !!}2.svg"
                     alt="Enera"/>
                <h4 class="white-text center-align enera-title"><span class="light-text">{{$cam->name}}</span></h4>
            </div>
        </div>

        <div class="card grey darken-3 white-text white">
            <div class="card-content white-text show">
                <ul class="white-text">
                    <span class="card-title">Información</span>
                    <li data-icon="keyboard_arrow_right">Status: <span class="light-text">{{$cam->status}}</span></li>
                    <hr>
                    <li data-icon="keyboard_arrow_right">
                        Administrador: <span class="light-text">{{$cam->administrator->name['first']. ' '. $cam->administrator->name['last']}}</span></li>
                    <hr>
                    <li data-icon="keyboard_arrow_right">Interacción: <span class="light-text">{{$cam->interaction['name']}}</span></li>
                    <hr>
                    <li data-icon="keyboard_arrow_right">Fitros:
                        <ul class="white-text">
                            <li data-icon="remove" style="margin-left: 25px;">
                                Edad: <span class="light-text">{{ 'De '.$cam->filters['age'][0] . ' - Hasta '.$cam->filters['age'][1]. ' años'}}</span></li>
                            <li data-icon="remove" style="margin-left: 25px;">
                                Genero: <span class="light-text">{{(!isset($cam->filters['gender']) ? 'No definidos' : (count($cam->filters['gender']) == 1) ? $cam->filters['gender'][0] : 'Ambos')}}</span></li>
                            <li data-icon="remove" style="margin-left: 25px;">
                                Días:@if(isset($cam->filters['week_days'] ))
                                    @foreach($cam->filters['week_days'] as $dia)
                                        <span class="light-text">{{ trans('days.'.$dia) }},</span>
                                    @endforeach
                                @else
                                    <span class="light-text">no definido</span>
                                @endif</li>
                            <li data-icon="remove" style="margin-left: 25px;">
                                Horario: <span class="light-text">{{'De las '. $cam->filters['day_hours'][0] . ' - hasta las'.$cam->filters['day_hours'][$size - 1] .' horas'}}</span></li>
                            </li>
                            <li data-icon="remove" style="margin-left: 25px;">
                                <span class="light-text">{{'Inicia: '. date('Y-m-d',$cam->filters['date']['start']->sec)}}</span></li>
                            <li data-icon="remove" style="margin-left: 25px;">
                                <span class="light-text">{{'Finaliza: '. date('Y-m-d',$cam->filters['date']['end']->sec)}}</span></li>
                        </ul>
                    </li>
                    <hr>
                </ul>
            </div>
        </div>
    </div>


    <div class="hide-on-small-only">


        <div class="row">
            <div class="col m12">
                <div class="card grey darken-3 white-text head-info">
                    <div class="card-content white-text">
                        <div class="row" style="height: 120px;">
                            <div class="col m3 l2">
                                <div class="avatar circle" id="circle" style="height: 150px;">
                                    <img class="svg" src="{!! URL::asset('images/icons/'.
                         CampaignStyle::getCampaignIcon( $cam->interaction['name']) ) !!}2.svg"
                                         alt="Enera"/>
                                </div>
                            </div>
                            <div class="col m9 l10">
                                <h4 class="white-text left-align"><span class="light-text">{{$cam->name}}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col m6 l4">
                    <div class="card grey darken-3 white-text">
                        <div class="card-content white-text">
                            <ul class="white-text">
                                <span class="card-title">Información</span>
                                <li data-icon="keyboard_arrow_right">Status: <span class="light-text">{{$cam->status}}</span></li>
                                <hr>
                                <li data-icon="keyboard_arrow_right">
                                    Administrador: <span class="light-text">{{$cam->administrator->name['first']. ' '. $cam->administrator->name['last']}}</span></li>
                                <hr>
                                <li data-icon="keyboard_arrow_right">Interacción: <span class="light-text">{{$cam->interaction['name']}}</span></li>
                                <hr>
                                <li data-icon="keyboard_arrow_right">Fitros:
                                    <ul class="white-text">
                                        <li data-icon="remove" style="margin-left: 25px;">
                                            Edad: <span class="light-text">{{ 'De '.$cam->filters['age'][0] . ' - Hasta '.$cam->filters['age'][1]. ' años'}}</span>
                                        </li>
                                        <li data-icon="remove" style="margin-left: 25px;">
                                            Genero: <span class="light-text">{{(!isset($cam->filters['gender']) ? 'No definidos' : (count($cam->filters['gender']) == 1) ? $cam->filters['gender'][0] : 'Ambos')}}</span></li>
                                        <li data-icon="remove" style="margin-left: 25px;">
                                            Días:@if(isset($cam->filters['week_days'] ))
                                                @foreach($cam->filters['week_days'] as $dia)
                                                    <span class="light-text">{{ trans('days.'.$dia) }},</span>
                                                @endforeach
                                            @else
                                                <span class="light-text">no definido</span>
                                            @endif</li>
                                        <li data-icon="remove" style="margin-left: 25px;">
                                            Horario: <span class="light-text">{{'De las '. $cam->filters['day_hours'][0] . ' - hasta las'.$cam->filters['day_hours'][$size - 1] .' horas'}}</span></li>
                                        </li>
                                        <li data-icon="remove" style="margin-left: 25px;">
                                            <span class="light-text">{{'Inicia: '. date('Y-m-d',$cam->filters['date']['start']->sec)}}</span></li></li>
                                        <li data-icon="remove" style="margin-left: 25px;">
                                            <span class="light-text">{{'Finaliza: '. date('Y-m-d',$cam->filters['date']['end']->sec)}}</span></li>
                                    </ul>
                                </li>
                                <hr>
                            </ul>
                        </div>
                    </div>

                    <div class="card grey darken-3 white-text">
                        <div class="card-content white-text">
                            <span class="card-title">Elemento de campaña</span>
                            @if(view()->exists('campaign.partials.content'))
                                @include('campaign.partials.content', ['type' => $cam->interaction['name']])
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col m6 l4">
                    <div class="card grey darken-3 white-text" style="min-height: 611px;">
                        <div class="card-content white-text">
                            <span class="card-title">Contenido</span>
                            <div style="position: relative; width: 250px; margin: 0 auto;">
                                <div class="preview" style="text-align: center;">
                                    <img src="{{asset('images/android_placeholder.png')}}" alt="">
                                </div>
                                <div class="preview" id="mydiv" style="overflow: hidden;">
                                    @if(view()->exists('campaign.partials.preview_'.$cam->interaction['name']))
                                        @include('campaign.partials.preview_'.$cam->interaction['name'], ['fb_id' => 10206656662069174, 'cam' => $cam])
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{--<span style="padding: 10px;">*Vista previa puede variar de la reailidad</span>--}}
                    </div>
                </div>

                <div class="col l4 hide-on-med-and-down">
                    <div class="card grey darken-3 white-text" style="min-height: 611px;">
                        <div class="card-content black-text">
                            <span class="card-title white-text">Graficas</span>
                            <div id="genderAge" class="md-card-content"></div>
                            <div id="so" class="md-card-content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('scripts')
    {!! HTML::script('bower_components/c3js-chart/c3.min.js') !!}
    {!! HTML::script('bower_components/d3/d3.min.js') !!}
    {!! HTML::script('js/circle-progress.js') !!}
    {!! HTML::script('js/ajax/graficas.js') !!}

    <script>
        $('.circle').circleProgress({
            value: {!! $porcentaje !!}, //lo que se va a llenar con el color
            size: 120,   //tamaño del circulo
            startAngle: -300, //de donde va a empezar la animacion
            reverse: true, //empieza la animacion al contrario
            thickness: 8,  //el grosor la linea
            fill: {color: "{!! CampaignStyle::getStatusColor($cam->status) !!}"} //el color de la linea
        }).on('circle-animation-progress', function (event, progress) {
            $(this).find('strong').html(parseInt(100 * progress) + '<i>%</i>');
        });
        var grafica = new graficas;
        var menJson = '{!! json_encode($men) !!}';
        var menObj = JSON.parse(menJson);
        var womenJson = '{!! json_encode($women) !!}';
        var womenObj = JSON.parse(womenJson);

        var intLJson = '{!! json_encode($IntHours) !!}';
        var intLObj = JSON.parse(intLJson);
        console.log(intLObj);

        var gra = grafica.genderAge(menObj, womenObj);
        var graf = grafica.intPerHour(intLObj);


        $(document).ready(function () {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
        });
    </script>
@stop