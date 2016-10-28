@extends('layouts.mainmat')

@section('title', 'Reportes Nodos')


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
                            <h5 class="header header-border">Fecha de inicio: {{$date->toDateTime()->format('d-m-Y')}}</h5>
                            <h5 class="header header-border">Nombre de la red: {{$name->name}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card white">
                    <div class="card-content">
                        <p>Sección</p>
                        <div class="row no-margin">
                            <div class=" col s12 m4">
                                <div>
                                    <h5 class="center-align section-title">Visita de Dispositivos</h5>
                                </div>
                            </div>
                            <div class="input-field col s12 m4">
                                <select>
                                    <option value="All">Todos los nodos</option>
                                    @foreach($branches as $key => $branch)
                                        <option value="1">Option 1</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-field col s12 m4">
                                <select>
                                    <option value="">Todos los nodos</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="input-field col s12 no-padding no-margin ">
                                <div id="device"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">phone_iphone</i>Visitantes Totales</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Visitantes Totales">{{ number_format($users,0,'.',',') }}</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Crecimiento</span>
                                <h4 class="center-align  h4-card {{$user_increase > 0 ? 'green-text' : 'red-text'}} tooltipped"
                                    data-position="bottom" data-delay="50"
                                    data-tooltip="Crecimiento"><i class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>{{ number_format($user_increase,0,'.',',') }}
                                    %
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Taza de Lealtad</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Taza de Lealtad">{{ number_format($loyalty,0,'.',',') }}</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Crecimiento</span>
                                <h4 class="center-align h4-card {{$loyalty_inc > 0 ? 'green-text' : 'red-text'}} tooltipped"
                                    data-position="bottom" data-delay="50"
                                    data-tooltip="Crecimiento"><i class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>{{ number_format($loyalty_inc,2,'.',',') }}
                                    %
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 m3">
                <div class="card white">
                    <div class="card-content inf-cont">
                        <div class="row no-margin">
                            <div class="col s12">
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Conexiones Totales</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Conexiones Totales">{{ number_format($access,0,'.',',') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 m3">
                <div class="card white">
                    <div class="card-content inf-cont">
                        <div class="row no-margin">
                            <div class="col s12">
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Dispositivos Unicos</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Dispositivos Unicos">{{ number_format($devices,0,'.',',') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 m3">
                <div class="card white">
                    <div class="card-content inf-cont">
                        <div class="row no-margin">
                            <div class="col s12">
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Día más concurrido</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Día más concurrido">{{ucfirst(trans('days.'. $recurrent_day))}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 m3">
                <div class="card white">
                    <div class="card-content inf-cont">
                        <div class="row no-margin">
                            <div class="col s12">
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Edad Promedio</span>
                                <h5 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Edad Promedi">{{ number_format($edad_promedio,0,'.',',') }} Años</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 m3">
                <div class="card white">
                    <div class="card-content inf-cont">
                        <div class="row no-margin">
                            <div class="col s12">
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Tiempo de estancia</span>
                                <h5 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Tiempo de estancia">--:--:--</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 m3">
                <div class="card white">
                    <div class="card-content inf-cont">
                        <div class="row no-margin">
                            <div class="col s12">
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Genero Dominante</span>
                                <h5 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Genero Dominante">{{$genero}}</h5>
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

            var dates = JSON.parse('{!!  json_encode($dates_devices) !!}');
            var devices = JSON.parse('{!!  json_encode($unique_devices) !!}');

            c3.generate({
                bindto: '#device',
                data: {
                    x: 'x',
                    columns: [
                        dates,
                        devices
                    ],
                    colors: {
                        data1: '#039be5',
                        data2: '#ab47bc'
                    },
                    names: {
                        data1: 'Visitas'
                    }
                },
                grid: {
                    x: {
                        show: true
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

            c3.generate({
                bindto: '#time',
                data: {
                    columns: [
                        ['data1', 30, 200, 100, 400, 150, 250, 200]
                    ],
                    type: 'bar',
                    colors: {
                        data1: '#78909c'
                    }
                },
                bar: {
                    width: {
                        ratio: .85
                    }
                },
                grid: {
                    x: {
                        show: true
                    },
                    y: {
                        show: true
                    }
                }
            });

            c3.generate({
                bindto: '#op',
                data: {
                    columns: [
                        ['data1', 30],
                        ['data2', 120],
                        ['data3', 120]
                    ],
                    type: 'donut'
                },
                color: {
                    pattern: ['red', '#aec7e8', '#ff7f0e', '#ffbb78']
                },
                donut: {}
            });

            $('.tooltipped').tooltip({delay: 50});
        });
    </script>

@stop

