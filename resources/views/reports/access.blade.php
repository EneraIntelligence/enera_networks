@extends('layouts.mainmat')

@section('title', 'Reportes Accesos')


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
                    <div class="progress" style="display: none;" id="viewDevices">
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
                                <select>
                                    <option value="">Todos los nodos</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
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
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Conexiones Totales</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Conexiones Totales">{{ number_format($access,0,'.',',') }}</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Crecimiento</span>
                                <h4 class="center-align {{$access_increase > 0 ? 'green-text' : 'red-text'}} tooltipped"
                                    data-position="bottom" data-delay="50"
                                    data-tooltip="Crecimiento"><i
                                            class="material-icons prefix hide-on-med-and-down">{{$access_increase > 0 ? 'arrow_drop_up' : 'arrow_drop_down'}}</i>{{ number_format($access_increase,2,'.',',') }}
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
                                            class="material-icons prefix prefix-position">group</i>Reconexiones Totales</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Reconexiones Totales">{{ number_format($num_reconnection,0,'.',',') }}</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Crecimiento</span>
                                <h4 class="center-align h4-card {{$inc_recurrent > 0 ? 'green-text' : 'red-text'}} tooltipped"
                                    data-position="bottom" data-delay="50"
                                    data-tooltip="Crecimiento"><i
                                            class="material-icons prefix hide-on-med-and-down">{{$inc_recurrent > 0 ? 'arrow_drop_up' : 'arrow_drop_down'}}</i>{{ number_format($inc_recurrent,2,'.',',') }}
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
                                            class="material-icons prefix prefix-position">group</i>Usuarios con Re-conexión</span>
                                <h5 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Usuarios con Re-conexión">{{ number_format($users_with_reconnection,0,'.',',') }}</h5>
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
                                            class="material-icons prefix prefix-position">group</i>Porcentaje Reconexion</span>
                                <h5 class="center-align h4-card tooltipped" data-position="bottom" data-delay="--"
                                    data-tooltip="Tiempo de estancia">{{ number_format($poc_reconnection,2,'.',',') }}
                                    %</h5>
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
                                            class="material-icons prefix prefix-position">group</i>Re-conexiones promedio</span>
                                <h5 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Re-conexiones promedio">{{ number_format($average_reconnection,0,'.',',') }}</h5>
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
                                            class="material-icons prefix prefix-position">group</i>Campañas Existentes</span>
                                <h5 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Campañas Existentes">{{ number_format($campaigns,0,'.',',') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card white">
                    <div class="progress" style="display: none;" id="viewCampaigns">
                        <div class="indeterminate"></div>
                    </div>
                    <div class="card-content">
                        <p>Sección</p>
                        <div class="row no-margin">
                            <div class=" col s12 m4">
                                <div>
                                    <h5 class="center-align section-title">Top visitas de Campañas</h5>
                                </div>
                            </div>
                            <div class="input-field col s12 m4">
                                <select id="weekChartBranch">
                                    <option value="All">Todos los nodos</option>
                                    @foreach($branches as $name => $branch)
                                        <option value="{{$branch}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-field col s12 m4">
                                <select id="weekChartTime">
                                    <option value="All">Toda la campaña</option>
                                    <option value="7">7 Días</option>
                                    <option value="15">15 Días</option>
                                    <option value="30">30 Días</option>
                                </select>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="input-field col s12 no-padding no-margin ">
                                <div id="weekconections"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card white">
                    <div class="progress" style="display: none;" id="hourCampaigns">
                        <div class="indeterminate"></div>
                    </div>
                    <div class="card-content">
                        <p>Sección</p>
                        <div class="row no-margin">
                            <div class=" col s12 m4">
                                <div>
                                    <h5 class="center-align section-title">Horario de Conexiones</h5>
                                </div>
                            </div>
                            <div class="input-field col s12 m4">
                                <select id="hourChartBranch">
                                    <option value="All">Todos los nodos</option>
                                    @foreach($branches as $name => $branch)
                                        <option value="{{$branch}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-field col s12 m4">
                                <select id="hourChartTime">
                                    <option value="All">Periodo de tiempo</option>
                                    <option value="7">7 Días</option>
                                    <option value="15">15 Días</option>
                                    <option value="30">30 Días</option>
                                </select>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="input-field col s12 no-padding no-margin ">
                                <div id="hoursconections"></div>
                            </div>
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

                            </div>
                            <div class="input-field col s12 m4">

                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="input-field col s12 no-padding no-margin ">
                                <div id="access"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class=" col s12 m4">
                                <div>
                                    <h5 class="center-align section-title">Sistema Operativo</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="input-field no-padding no-margin centro">
                                <table class="bordered">
                                    <thead>
                                    <tr>
                                        <th data-field="id">Sistema Operativo</th>
                                        <th data-field="name">Cantidad</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($for_os['result'] as $os)
                                        <tr>
                                            <td>{{$os['_id']}}</td>
                                            <td>{{$os['count']}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m4 right" style="margin: 20px 0 0 0;">
                                <a class="waves-effect waves-light btn light-blue darken-1">Ver informe de nodos</a>
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

            c3.generate({
                bindto: '#device',
                data: {
                    columns: [
                        ['data1', 300, 350, 300, 100, 150, 300]
                    ],
                    types: {
                        data1: 'area-spline'
                    },
                    colors: {
                        data1: '#b3e5fc'
                    },
                    names: {
                        data1: 'Conexiones'
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

            var week = JSON.parse('{!!  json_encode($chart_weekday) !!}');

            $("#weekChartBranch").change(function (e) {
                weekChartFunction();
            });

            $("#weekChartTime").change(function (e) {
                weekChartFunction();
            });

            function weekChartFunction() {
                var branch = $('#weekChartBranch').val();
                var time = $('#weekChartTime').val();
                $.ajax({
                    type: "POST",
                    async: true,
                    url: '{{ route('visits_chart_per_day') }}',
                    dataType: "JSON",
                    data: {branch: branch, time: time, _token: "{!! session('_token') !!}"},
                    success: function (data) {
                        console.log(JSON.stringify(data));
                        chartWeek.load({
                            columns: [
                                data.chart_weekday
                            ]
                        });
                    },
                    error: function error(xhr, textStatus, errorThrown) {
                        console.log(xhr.status);
                        console.log(xhr.statusCode);
                        console.log(xhr.statusText);
                        Materialize.toast('Upssss Parece que algo salio mal. Intentalo más tarde ', 4000);
                    },
                    beforeSend: function () {
                        document.getElementById("viewCampaigns").style.display = "block";
                    },
                    complete: function () {
                        document.getElementById("viewCampaigns").style.display = "none";
                    }
                });
            }

            var chartWeek = c3.generate({
                bindto: '#weekconections',
                data: {
                    x: 'x',
                    columns: [
                        ['x', 'Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado'],
                        week
                    ],
                    type: 'bar',
                    colors: {
                        data1: '#039be5'
                    },
                    names: {
                        data1: 'Conexiones'
                    }
                },
                bar: {
                    width: {
                        ratio: 0.5 // this makes bar width 50% of length between ticks
                    }
                    // or
                    //width: 100 // this makes bar width 100px
                },
                grid: {
                    y: {
                        show: true
                    }
                },
                axis: {
                    x: {
                        type: 'category',
                        tick: {
                            format: '%a'
                        }
                    }
                }
            });

            var hour = JSON.parse('{!!  json_encode($chart_hour) !!}');

            $("#hourChartBranch").change(function (e) {
                hourChartFunction();
            });

            $("#hourChartTime").change(function (e) {
                hourChartFunction();
            });

            function hourChartFunction() {
                var branch = $('#hourChartBranch').val();
                var time = $('#hourChartTime').val();
                $.ajax({
                    type: "POST",
                    async: true,
                    url: '{{ route('visits_chart_per_hour') }}',
                    dataType: "JSON",
                    data: {branch: branch, time: time, _token: "{!! session('_token') !!}"},
                    success: function (data) {
                        console.log(JSON.stringify(data));
                        hourChart.load({
                            columns: [
                                data.chart_hours
                            ]
                        });
                    },
                    error: function error(xhr, textStatus, errorThrown) {
                        console.log(xhr.status);
                        console.log(xhr.statusCode);
                        console.log(xhr.statusText);
                        Materialize.toast('Upssss Parece que algo salio mal. Intentalo más tarde ', 4000);
                    },
                    beforeSend: function () {
                        document.getElementById("hourCampaigns").style.display = "block";
                    },
                    complete: function () {
                        document.getElementById("hourCampaigns").style.display = "none";
                    }
                });
            }


            var hourChart = c3.generate({
                bindto: '#hoursconections',
                data: {
                    x: 'x',
                    columns: [
                        ['x', '12am', '1am', '2am', '3am', '4am', '5am', '6am', '7am', '8am', '9am', '10am', '11am', '12pm',
                            '1pm', '2pm', '3pm', '4pm', '5pm', '6pm', '7pm', '8pm', '9pm', '10pm', '11pm'],
                        hour
                    ],
                    type: 'bar',
                    colors: {
                        data1: '#039be5'
                    },
                    names: {
                        data1: 'Conexines '
                    }
                },
                bar: {
                    width: {
                        ratio: 0.5 // this makes bar width 50% of length between ticks
                    }
                    // or
                    //width: 100 // this makes bar width 100px
                },
                grid: {
                    y: {
                        show: true
                    }
                },
                axis: {
                    x: {
                        type: 'category',
                        tick: {
                            format: '%a'
                        }
                    }
                }
            });

            var recurrentes = JSON.parse('{!!  json_encode($recurrentes) !!}');

            var chart = c3.generate({
                bindto: '#access',
                data: {
                    columns: [
                        ['data1', recurrentes[0]],
                        ['data2', recurrentes[1]],
                        ['data3', recurrentes[2]],
                        ['data4', recurrentes[3]]
                    ],
                    type: 'bar',
                    groups: [
                        ['data1', 'data2', 'data3', 'data4']
                    ],
                    labels: true,
                    colors: {
                        data1: '#fb8c00',
                        data2: '#ab47bc',
                        data3: '#8bc34a',
                        data4: '#039be5'
                    },
                    names: {
                        data1: '1 vez',
                        data2: '2-4 veces',
                        data3: '5-8 veces',
                        data4: '9- más veces'
                    },
                    order: 'asc'
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
                        center: 0
                    },
                    x: {
                        show: false
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
                },
                padding: {
                    top: 0,
                    right: 50,
                    bottom: 0,
                    left: 50
                }
            });

            $('.tooltipped').tooltip({delay: 50});
        });
    </script>

@stop

