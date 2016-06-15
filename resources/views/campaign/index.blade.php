@extends('layouts.mainmat')

@section('title', 'Campañas')

@section('head_scripts')
    {!! HTML::style('assets/css/campaign.css') !!}
@stop

@section('content')
    @if( count($campaigns) > 0 )
        <ul class="collapsible hide-on-med-and-up menu grey darken-3 white-text" data-collapsible="accordion">


        <li>
            <div class="collapsible-header grey darken-3 white-text">
                <div class="row zero">
                    <div class="col s6" style="text-align: center;">
                        <span>Nombre</span>
                    </div>
                </div>
            </div>
        </li>


        @foreach($campaigns as $campaign)
            <li>
                <div class="collapsible-header grey darken-3 white-text">
                    <span class="icon-menu">
                        {{strtoupper(substr($campaign->name, 0, 2)) }}
                    </span>
                    <span>
                        {{$campaign->name}}
                    </span>
                </div>
                <div class="collapsible-body grey">
                    <div class="container">
                        <ul class="list grey white-text card_info" >
                            <li data-icon="keyboard_arrow_right">Status: <span class="light-text">{{$campaign->status}}</span></li>
                            <li data-icon="keyboard_arrow_right">Administrador: <span class="light-text">{{$campaign->administrator->name['first'].
                        ' '. $campaign->administrator->name['last']}}</span></li>
                            <li data-icon="keyboard_arrow_right">
                                Inicio: <span class="light-text">{{date('Y-m-d',$campaign->filters['date']['start']->sec)}}</span></li>
                            <li data-icon="keyboard_arrow_right">
                                Fin: <span class="light-text">{{date('Y-m-d',$campaign->filters['date']['end']->sec)}}</span></li>
                            <li data-icon="keyboard_arrow_right">Dias:
                                @if(isset($campaign->filters['week_days'] ))
                                    @foreach($campaign->filters['week_days'] as $dia)
                                        <span class="light-text">{{ trans('days.'.$dia) }},</span>
                                    @endforeach
                                @else
                                    <span class="light-text">no definido</span>
                                @endif
                            </li>
                        </ul>
                        <a href="{{route('campaigns::show', ['id' => $campaign->id])}}" class="waves-effect waves-light btn btn-mobil">Ver más detalles</a>
                    </div>
                </div>
            </li>
        @endforeach


    </ul>

    @endif


    @if( count($campaigns) == 0 )
        <div class="container hide-on-med-and-up">
            <h5 style="text-align:center;">Aún no tienes campañas. <br>Crea tu primer campaña.</h5>
        </div>
    @endif

    <div class="hide-on-small-only">
        <div class="container">
            <div class="row">
                @foreach($campaigns as $campaign)
                    <div class="col m4 l3">
                        <div class="card grey darken-3 white-text card-campaign" style="min-height: 610px;">
                            <div class="card-content white-text">
                                <div class="card-image margin-image">
                                    <img src="{{"https://s3-us-west-1.amazonaws.com/enera-publishers/items/". ($campaign->interaction['name'] != 'survey' ? $campaign->content['images']['large'] : $campaign->content['images']['survey'])}}"
                                         class="responsive-img">
                                    {{--<span class="card-title">{{$campaign->name}}</span>--}}
                                </div>
                                {{--<span class="card-title black-text">{{$campaign->name}}</span>--}}
                                <ul class="list white-text">
                                    <li data-icon="keyboard_arrow_right">Nombre: <span class="light-text">{{$campaign->name}}</span></li>
                                    <hr>
                                    <li data-icon="keyboard_arrow_right">Administrador: <span class="light-text">{{$campaign->administrator->name['first'].
                        ' '. $campaign->administrator->name['last']}}</span></li>
                                    <hr>
                                    <li data-icon="keyboard_arrow_right">
                                        Inicio: <span class="light-text">
                                            {{date('y-m-d',$campaign->filters['date']['start']->sec)}}
                                        </span></li>
                                    <hr>
                                    <li data-icon="keyboard_arrow_right">
                                        Fin: <span class="light-text">{{date('y-m-d',$campaign->filters['date']['end']->sec)}}</span></li>
                                    <hr>
                                    <li data-icon="keyboard_arrow_right">Dias:
                                        @if(isset($campaign->filters['week_days'] ))
                                            @foreach($campaign->filters['week_days'] as $dia)
                                                <span class="light-text">{{ trans('days.'.$dia) }}</span>,
                                            @endforeach
                                        @else
                                            <span class="light-text">no definido</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div class="card-action ">
                                <a  class="blue-text" href="{{route('campaigns::show', ['id' => $campaign->id])}}">Ver más detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach


                @if( count($campaigns) == 0 )
                    <div class="empty-message" style="width: 80%; margin:20px auto 0;">
                        <img style="margin:0 auto; width:200px; display:block;" src="{!! URL::asset('images/icons/banner_new.svg') !!}" alt="">
                        <h3 style="text-align:center;">
                            Aún no tienes campañas. <br>Crea tu primer campaña.
                        </h3>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">

        @if( count($campaigns) == 0 )
            <i class="large material-icons animated-arrow grey-text" style="right: -15px; bottom: 30px; position: absolute;" >arrow_drop_down</i>
        @endif

        <a class="btn-floating btn-large red waves-effect waves-light modal-trigger" href="#create">
            <i class="material-icons">add</i>
        </a>
    </div>

    <div id="create" class="modal">
        <div class="modal-content" style="height: 100px;">
            <i class="material-icons right-corner" style="cursor: pointer">close</i>
            <div class="row" style="margin: 0;">
                <form class="col m12 s12 formValidate" action="/campaigns/new" method="get" id="validate" novalidate="novalidate">
                    <div class="row">
                        <div class="input-field col m10 s9">
                            <input id="name" type="text" name="name" required>
                            <label for="name">Nombre de Campaña</label>
                        </div>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="input-field col m2 s3">
                            {{--<a class="waves-effect waves-light btn">Crear</a>--}}
                            <button type="submit" class="sbm-button waves-light teal lighten-2" id="btn-modal">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@stop

@section('scripts')
    {!! HTML::script('js/jquery-validation/dist/jquery.validate.js') !!}

    @if( count($campaigns) == 0 )

        <!-- animated arrow for new campaign button -->
        <script>
            $( document ).ready(function() {
                animateArrow();

                function animateArrow() {
                    TweenLite.to(".animated-arrow", .7, {
                        y: -50, ease:Quad.easeOut,onComplete: function () {
                            TweenLite.to(".animated-arrow", .7, {y: 0, ease:Quad.easeIn, onComplete: animateArrow});
                        }
                    });
                }
            });
        </script>
    @endif

    <script>
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
            
            $('.right-corner').click(function () {
                $('.modal').closeModal();
            })
        });
        $("#validate").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 30
                }
            },
            //For custom messages
            messages: {
                name:{
                    required: "* Ingresa un nombre para la campaña",
                    maxlength: "* La campaña debe tener maximo 30 caracteres"

                },
                curl: "Enter your website"
            },
            errorElement : 'div',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });
    </script>
@stop

