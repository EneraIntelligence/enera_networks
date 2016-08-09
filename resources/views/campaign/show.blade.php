@extends('layouts.mainmat')
@section('title', 'Campañas')
@section('head_scripts')
        <!-- c3.js (charts) -->
{!! HTML::style('bower_components/c3js-chart/c3.min.css') !!}
{!! HTML::style('assets/css/welcome.css') !!}
{!! HTML::style('assets/css/campaign.css') !!}

@endsection

@section('content')
    <?php $size = sizeof($cam->filters['day_hours']) ?>

    <div class="container main-container">
        <div class="row">
            <div class="col s12" style="padding: 0 20px">
                <h3 class="black-text left-align">{{$cam->name}}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col m12">
                <div class="col s12 m6 l4">
                    <div class="card grey darken-3 white-text">
                        <div class="card-content white-text">
                            <ul class="white-text">
                                <span class="card-title">Información</span>
                                <li data-icon="keyboard_arrow_right">Status: <span
                                            class="light-text">{{$cam->status}}</span></li>
                                <hr>
                                <li data-icon="keyboard_arrow_right">
                                    Administrador: <span
                                            class="light-text">{{$cam->administrator->name['first']. ' '. $cam->administrator->name['last']}}</span>
                                </li>
                                <hr>
                                <li data-icon="keyboard_arrow_right">Interacción: <span
                                            class="light-text">{{$cam->interaction['name']}}</span></li>
                                <hr>
                                <li data-icon="keyboard_arrow_right">Fitros:
                                    <ul class="white-text">
                                        <li data-icon="remove" style="margin-left: 25px;">
                                            Edad: <span
                                                    class="light-text">{{ 'De '.$cam->filters['age'][0] . ' - Hasta '.$cam->filters['age'][1]. ' años'}}</span>
                                        </li>
                                        <li data-icon="remove" style="margin-left: 25px;">
                                            Genero: <span
                                                    class="light-text">{{(!isset($cam->filters['gender']) ? 'No definidos' : (count($cam->filters['gender']) == 1) ? $cam->filters['gender'][0] : 'Ambos')}}</span>
                                        </li>
                                        <li data-icon="remove" style="margin-left: 25px;">
                                            Días:@if(isset($cam->filters['week_days'] ))
                                                @foreach($cam->filters['week_days'] as $dia)
                                                    <span class="light-text">{{ trans('days.'.$dia) }},</span>
                                                @endforeach
                                            @else
                                                <span class="light-text">no definido</span>
                                            @endif</li>
                                        <li data-icon="remove" style="margin-left: 25px;">
                                            Horario: <span
                                                    class="light-text">{{'De las '. $cam->filters['day_hours'][0] . ' - hasta las'.$cam->filters['day_hours'][$size - 1] .' horas'}}</span>
                                        </li>
                                        </li>
                                        <li data-icon="remove" style="margin-left: 25px;">
                                            <span class="light-text">{{'Inicia: '. date('Y-m-d',$cam->filters['date']['start']->sec)}}</span>
                                        </li>
                                        </li>
                                        <li data-icon="remove" style="margin-left: 25px;">
                                            <span class="light-text">{{'Finaliza: '. date('Y-m-d',$cam->filters['date']['end']->sec)}}</span>
                                        </li>
                                    </ul>
                                </li>
                                <hr>
                            </ul>
                        </div>
                    </div>

                    <div class="card grey darken-3 white-text">
                        <div class="card-content white-text" style="min-height: 157px;">
                            <span class="card-title">Elemento de campaña</span>
                            @if(view()->exists('campaign.partials.content'))
                                @include('campaign.partials.content', ['type' => $cam->interaction['name']])
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l4">
                    <div class="card grey darken-3 white-text" style="min-height: 300px;">
                        <div class="card-content black-text">
                            <span class="card-title white-text">Grafícas</span>
                            <div id="genderAge" class="md-card-content"></div>
                        </div>
                    </div>
                    <div class="card grey darken-3 white-text" style="min-height: 300px;">
                        <div class="card-content black-text">
                            <span class="card-title white-text">Grafícas</span>
                            <div id="so" class="md-card-content"></div>
                        </div>
                    </div>
                </div>
                <div class="col s12 l4">
                    <div class="card grey darken-3 white-text" style="min-height: 614px;">
                        <div class="card-content white-text">
                            <span class="card-title">Contenido</span>
                            <div style="position: relative; width: 250px; margin: 0 auto;">
                                <div class="preview" style="text-align: center;">
                                    <img src="{{asset('images/iphone_placeholder.png')}}" alt="">
                                </div>
                                <div class="preview-content grey lighten-3" id="mydiv" style="overflow: hidden;">
                                    @if(view()->exists('campaign.partials.preview_'.$cam->interaction['name']))
                                        @include('campaign.partials.preview_'.$cam->interaction['name'], ['fb_id' => 10206656662069174, 'cam' => $cam])
                                    @endif
                                </div>
                            </div>
                        </div>
                        <span class="light-text" style="padding: 10px;font-size: 12px;">*Vista previa puede variar de la reailidad</span>
                    </div>
                </div>
            </div>
        </div>

        @if($cam->status == 'active')
            <div class="fixed-action-btn" style="bottom: 55px; right: 24px;">
                <a class="btn-floating btn-large red waves-effect waves-light modal-trigger" href="#cancel">
                    <i class="material-icons">clear</i>
                </a>
            </div>
        @endif

        <div id="cancel" class="modal" style="height: 330px;width: 60%;">
            <div class="modal-content" style="padding-left: 5px;">
                <i class="material-icons right-corner" style="cursor: pointer">close</i>
                <div class="row" style="margin: 10px;">
                    <h5>Cancelar Campaña</h5>
                    <p>Ingresa el motivo de la cancelación y tu password para confirmar </p>
                    <form class="col m12 s12 formValidate" action="{!! route('campaigns::reject::campaign') !!}"
                          method="post" id="validate"
                          novalidate="novalidate">
                        <div class="row">
                            <div class="input-field col m10 s9">
                                <input id="reason" type="text" name="reason" class="" required>
                                <label for="reason">Motivo de cancelación</label>
                            </div>
                            <div class="input-field col m10 s9">
                                <input id="password" type="password" name="password" required>
                                <label for="password">Contraseña*</label>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{$cam->_id}}">
                            <div class="input-field col m2 s3">
                                {{--<a class="waves-effect waves-light btn">Crear</a>--}}
                                <button type="submit" class="sbm-button waves-light teal lighten-2" id="btn-modal">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop

@section('scripts')
    {!! HTML::script('bower_components/c3js-chart/c3.min.js') !!}
    {!! HTML::script('bower_components/d3/d3.min.js') !!}
    {!! HTML::script('js/ajax/graficas.js') !!}
    {!! HTML::script('js/jquery-validation/dist/jquery.validate.min.js') !!}

    <script>
        var grafica = new graficas;
        var menJson = '{!! json_encode($men) !!}';
        var menObj = JSON.parse(menJson);
        var womenJson = '{!! json_encode($women) !!}';
        var womenObj = JSON.parse(womenJson);

        var intLJson = '{!! json_encode($IntHours) !!}';
        var intLObj = JSON.parse(intLJson);

        var gra = grafica.genderAge(menObj, womenObj);
        var graf = grafica.intPerHour(intLObj);


        $(document).ready(function () {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();

            $('.right-corner').click(function () {
                $('.modal').closeModal();
            });


            $("#validate").validate({
                rules: {
                    password: "required",
                    reason: {
                        required: true,
                        minlength: 20
                    }

                },
                //For custom messages
                messages: {
                    reason: {
                        required: "* Ingresa el motivo de la cancelación",
                        minlength: "* El motivo debe tener minimo 20 caracteres"

                    },
                    password: "* Ingresa la contraseña"
                },
                errorElement: 'div',
                errorPlacement: function (error, element) {
                    var placement = $(element).data('error');
                    if (placement) {
                        $(placement).append(error)
                    } else {
                        error.insertAfter(element);
                    }
                }
            });


        });
    </script>
@stop