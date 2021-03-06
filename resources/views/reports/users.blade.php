@extends('layouts.mainmat')

@section('title', 'Reportes Usuarios')


@section('head_scripts')
    {!! HTML::style('bower_components/c3js-chart/c3.min.css') !!}
    {!! HTML::style('assets/css/report.css') !!}

@stop


@section('content')

    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card white">
                    <div class="card-content">
                        <p>Sección</p>
                        <div class="row no-margin">
                            <h5 class="header header-border">Fecha de inicio: <span
                                        class="font-200">{{$date->toDateTime()->format('d-m-Y')}} </span></h5>
                            <h5 class="header header-border">Nombre de la red: <span
                                        class="font-200">{{$name->name}} </span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card white">
                    <div class="progress" style="display: none;" id="loader">
                        <div class="indeterminate"></div>
                    </div>
                    <div class="card-content">
                        <p>Sección</p>
                        <div class="row no-margin">
                            <div class=" col s12 m4">
                                <div>
                                    <h5 class="center-align section-title">Usuarios</h5>
                                </div>
                            </div>
                            <div class="input-field col s12 m4">

                            </div>
                            <div class="input-field col s12 m4">
                                <select id="user_chart">
                                    <option value="All">Todos los nodos</option>
                                    @foreach($branches as $name => $branch)
                                        <option value="{{$branch}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="input-field col s12 no-padding no-margin ">
                                <div id="users"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">assignment_ind</i>Usuarios Total</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Trafico Total">{{ number_format($total,0,'.',',') }}</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate "><a class="mdi mdi-chart-bar mdi-24px black-text"
                                                                     href="/"></a>Dispositivos Unicos</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Dispositivos Unicos"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>--
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate"><a class="mdi mdi-human-female mdi-24px black-text"
                                                                    href="/"></a>Mujeres</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Visitantes">{{ number_format($total_female,0,'.',',') }}</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><a class="mdi mdi-chart-bar mdi-24px black-text"
                                                                    href="/"></a>Tasa de crecimiento</span>
                                <h4 class="center-align h4-card {{$increments_women > 0 ? 'green-text' : 'red-text'}} tooltipped"
                                    data-position="bottom" data-delay="50"
                                    data-tooltip="Tasa de cresimiento">{{ number_format($increments_women,2,'.',',') }}%
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate"><a class="mdi mdi-human-male mdi-24px black-text"
                                                                    href="/"></a>Hombres</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Visitantes">{{ number_format($total_male,0,'.',',') }}</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><a class="mdi mdi-chart-bar mdi-24px black-text"
                                                                    href="/"></a>Tasa de crecimiento</span>
                                <h4 class="center-align h4-card {{$increments_men > 0 ? 'green-text' : 'red-text'}} tooltipped"
                                    data-position="bottom" data-delay="50"
                                    data-tooltip="Tasa de cresimiento">{{ number_format($increments_men,2,'.',',') }}%
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card white">
                    <div class="progress" style="display: none;" id="loaderInt">
                        <div class="indeterminate"></div>
                    </div>
                    <div class="card-content">
                        <p>Sección</p>
                        <div class="row no-margin">
                            <div class=" col s12 m4">
                                <div>
                                    <h5 class="center-align section-title">Visita de Dispositivos</h5>
                                </div>
                            </div>
                            <div class="input-field col s12 m4">
                            </div>
                            <div class="input-field col s12 m4">
                                <select id="interactionChart">
                                    <option value="0-200">Todos</option>
                                    <option value="0-17">0 - 17 Años</option>
                                    <option value="18-34">18 -35 Años</option>
                                    <option value="35-45">35 - 45 Años</option>
                                    <option value="46-60">46 - 60 Años</option>
                                    <option value="60-200"> 60+ Años</option>
                                </select>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="input-field col s12 no-padding no-margin ">
                                <div id="ages"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <h5>Mujeres</h5>
            </div>
            <div class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">phone_iphone</i>Promedio dispositivo</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Dispositivos Favoritos">--</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><a class="mdi mdi-av-timer mdi-24px black-text"
                                                                    href="/"></a>Hora Favorita</span>
                                <h4 class="center-align h4-card green-text tooltipped" data-position="bottom"
                                    data-delay="50"
                                    data-tooltip="Hora Favorita"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>--%
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card white">
                    <div class="card-content" style="min-height: 137px;">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate"><a class="mdi mdi-av-timer mdi-24px black-text"
                                                                    href="/"></a>Tiempo Promedio</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Tiempo Promedio">--</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><a class="mdi mdi-heart mdi-24px black-text"
                                                                    href="/"></a>Taza de Leatad</span>
                                <h4 class="center-align h4-card green-text tooltipped" data-position="bottom"
                                    data-delay="50"
                                    data-tooltip="Taza de Leatad"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>--%
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 m4">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s12">
                                <span class="f-size-12 truncate"><a class="mdi mdi-cake-variant mdi-24px black-text"
                                                                    href="/"></a>Edad promedio</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Edad promedio">{{ number_format($promedio_mujeres,0,'.',',') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <h5>Hombres</h5>
            </div>
            <div class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">phone_iphone</i>Promedio dispositivo</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Dispositivos Favoritos">--</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><a class="mdi mdi-av-timer mdi-24px black-text"
                                                                    href="/"></a>Hora Favorita</span>
                                <h4 class="center-align h4-card green-text tooltipped" data-position="bottom"
                                    data-delay="50"
                                    data-tooltip="Hora Favorita"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>--%
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card white">
                    <div class="card-content" style="min-height: 137px;">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate"><a class="mdi mdi-av-timer mdi-24px black-text"
                                                                    href="/"></a>Tiempo Promedio</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Tiempo Promedio">--</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><a class="mdi mdi-heart mdi-24px black-text"
                                                                    href="/"></a>Taza de Leatad</span>
                                <h4 class="center-align  h4-card green-text tooltipped" data-position="bottom"
                                    data-delay="50"
                                    data-tooltip="Taza de Leatad"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>--%
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 m4">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s12">
                                <span class="f-size-12 truncate"><a class="mdi mdi-cake-variant mdi-24px black-text"
                                                                    href="/"></a>Edad promedio</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Edad promedio">{{ number_format($promedio_hombres,0,'.',',') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop


@section('scripts')
    {!! HTML::script('bower_components/d3/d3.min.js') !!}
    {!! HTML::script('bower_components/c3js-chart/c3.min.js') !!}

    <script>
        $(document).ready(function () {
            $('select').material_select();



            var mujeres = JSON.parse('{!!  json_encode($female) !!}');
            var hombres = JSON.parse('{!!  json_encode($male) !!}');

            $( "#user_chart" ).change(function(e) {
                 var branch = $('#user_chart').val();
                $.ajax({
                    type: "POST",
                    async: true,
                    url: '{{ route('chart_user') }}',
                    dataType: "JSON",
                    data: {branch : branch, _token: "{!! session('_token') !!}"},
                    success: function (data) {
                        console.log(JSON.stringify(data));
                        user_char.load({
                            columns: [
                                data.female,
                                data.male
                            ]
                        });
                    },
                    error: function error(xhr, textStatus, errorThrown) {
                        console.log(xhr.status);
                        console.log(xhr.statusCode);
                        console.log(xhr.statusText);
                        Materialize.toast('Upssss Parece que algo salio mal. Intentalo más tarde ', 4000);
                    },
                    beforeSend: function(){
                        document.getElementById("loader").style.display = "block";
                    },
                    complete: function(){
                        document.getElementById("loader").style.display = "none";
                    }
                });
            });


            var user_char = c3.generate({
                bindto: '#users',
                data: {
                    x: 'x',
                    columns: [
                        ['x', '61+', '46-60', '35-45', '18-34', '0-17'],
                        mujeres,
                        hombres
                    ],
                    groups: [
                        ['Hombres', 'Mujeres']
                    ],
                    type: 'bar',
                    colors: {
                        Hombres: '#039be5',
                        Mujeres: '#ab47bc'
                    }
                },
                bar: {
                    width: {
                        ratio: 0.5 // this makes bar width 50% of length between ticks
                    }
                    // or
                    //width: 100 // this makes bar width 100px
                },
                axis: {
                    rotated: true,
                    y: {
                        center: 0,
                        tick: {
                            format: function (x) {
                                return Math.abs(x);
                            }
                        }
                    },
                    x: {
                        type: 'category' // this needed to load string x value
                    }
                },
                tooltip: {
                    format: {
                        value: function (value, ratio, id, index) {
                            return Math.abs(value);
                        }
                    }
                },
                grid: {
                    x: {
                        show: false
                    },
                    y: {
                        show: true
                    }
                }

            });


            var dates = JSON.parse('{!!  json_encode($date_interactions) !!}');
            var interaction_males = JSON.parse('{!!  json_encode($date_males_interactions) !!}');
            var interaction_females = JSON.parse('{!!  json_encode($date_females_interactions) !!}');


            $( "#interactionChart" ).change(function(e) {

                var age = $('#interactionChart').val();
                var res = age.split("-");
                $.ajax({
                    type: "POST",
                    async: true,
                    url: '{{ route('chart_interaction') }}',
                    dataType: "JSON",
                    data: {less : res[0], higher: res[1], _token: "{!! session('_token') !!}"},
                    success: function (data) {
                        console.log(JSON.stringify(data));
                        interactionChart.load({
                            columns: [
                                data.dates,
                                data.females,
                                data.males
                            ]
                        });
                    },
                    error: function error(xhr, textStatus, errorThrown) {
                        console.log(xhr.status);
                        console.log(xhr.statusCode);
                        console.log(xhr.statusText);
                        Materialize.toast('Upssss Parece que algo salio mal. Intentalo más tarde ', 4000);
                    },
                    beforeSend: function(){
                        document.getElementById("loaderInt").style.display = "block";
                    },
                    complete: function(){
                        document.getElementById("loaderInt").style.display = "none";
                    }
                });
            });

            var interactionChart = c3.generate({
                bindto: '#ages',
                data: {
                    x: 'x',
                    columns: [
                        dates,
                        interaction_males,
                        interaction_females
                    ],
                    type: 'spline',
                    colors: {
                        male: '#039be5',
                        female: '#ab47bc'
                    }
                },
                grid: {
                    x: {
                        show: false
                    },
                    y: {
                        show: true
                    }
                },
                axis: {
                    x: {
                        type: 'timeseries',
                        localtime: true,
                        tick: {
                            format: '%b-%d'
                        }
                    }
                }
            });


            $('.tooltipped').tooltip({delay: 50});
        });
    </script>

@stop

