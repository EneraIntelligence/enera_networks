@extends('layouts.mainmat')

@section('title', 'Campañas')

@section('head_scripts')
    {!! HTML::style('assets/css/campaign.css') !!}
@stop

@section('content')
    <ul class="collapsible  hide-on-med-and-up menu grey darken-3 white-text" data-collapsible="accordion">
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
                <div class="collapsible-body grey darken-3 white-text">
                    <div class="container">
                        <ul class="list grey darken-3 white-text">
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
                        <a href="{{route('campaigns::show', ['id' => $campaign->id])}}" class="waves-effect waves-light btn btn-mobil">Ver más detalles</a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>


    <div class="hide-on-small-only">
        <div class="container">
            <div class="row">
                @foreach($campaigns as $campaign)
                    <div class="col m6 l4">
                        <div class="card grey darken-3 white-text">
                            <div class="card-content white-text">
                                <div class="card-image">
                                    <img src="{{"https://s3-us-west-1.amazonaws.com/enera-publishers/items/". ($campaign->interaction['name'] != 'survey' ? $campaign->content['images']['large'] : $campaign->content['images']['survey'])}}"
                                         class="responsive-img">
                                    <span class="card-title">{{$campaign->name}}</span>
                                </div>
                                {{--<span class="card-title black-text">{{$campaign->name}}</span>--}}
                                <ul class="list white-text">
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
                                <a  class="blue-text" href="{{route('campaigns::show', ['id' => $campaign->id])}}">Ver más detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="fixed-action-btn hide-on-small-only" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red waves-effect waves-light modal-trigger" href="#modal1">
            <i class="material-icons">add</i>
        </a>
    </div>

    <div id="modal1" class="modal">
        <div class="modal-content" style="height: 70px;">
            <div class="row">
                <form class="col m12 formValidate" action="" method="get" id="validate" novalidate="novalidate">
                    <div class="row">
                        <div class="input-field col m10">
                            <input id="campaign" type="text" name="campaign" required>
                            <label for="campaign">Nombre de Campaña</label>
                        </div>
                        <div class="input-field col m2">
                            {{--<a class="waves-effect waves-light btn">Crear</a>--}}
                            <button type="submit" class="sbm-button teal lighten-2">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!"  class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
    </div>



@stop

@section('scripts')
    {!! HTML::script('js/jquery-validation/dist/jquery.validate.js') !!}
    <script>
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
        });
        $("#validate").validate({
            rules: {
                campaign: {
                    required: true,
                    minlength: 5,
                    maxlength: 30
                }
            },
            //For custom messages
            messages: {
                campaign:{
                    required: "* Ingresa un nombre para la campaña",
                    minlength: "* La campaña debe tener por lo menos 5 caracteres",
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

