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
                                    data-tooltip="Conexiones Totales">5,000</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Crecimiento</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Crecimiento"><i class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>24%
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
                                    data-tooltip="Reconexiones Totales">2222</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Crecimiento</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Crecimiento"><i class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>24%
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
                                    data-tooltip="Usuarios con Re-conexión">5,000</h5>
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
                                <h5 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Tiempo de estancia">50%</h5>
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
                                    data-tooltip="Re-conexiones promedio">3</h5>
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
                                    data-tooltip="Campañas Existentes">45</h5>
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
                                    <h5 class="center-align section-title">Top visitas de Campañas</h5>
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
                                    <option value="">Periodo de tiempo</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
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
                    <div class="card-content">
                        <p>Sección</p>
                        <div class="row no-margin">
                            <div class=" col s12 m4">
                                <div>
                                    <h5 class="center-align section-title">Horario de Conexiones</h5>
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
                                    <option value="">Periodo de tiempo</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
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
                                        <th data-field="id">Name</th>
                                        <th data-field="name">Item Name</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>Alvin</td>
                                        <td>Eclair</td>
                                    </tr>
                                    <tr>
                                        <td>Alan</td>
                                        <td>Jellybean</td>
                                    </tr>
                                    <tr>
                                        <td>Jonathan</td>
                                        <td>Lollipop</td>
                                    </tr>
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

            c3.generate({
                bindto: '#weekconections',
                data: {
                    x : 'x',
                    columns: [
                        ['x', '2013-01-01', '2013-01-02', '2013-01-03', '2013-01-04', '2013-01-05', '2013-01-06'],
                        ['data1', 30, 200, 100, 400, 150, 250,50, 140]
                    ],
                    type: 'bar',
                    colors: {
                        data1: '#039be5'
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
                    y:{
                        show: true
                    }
                },
                axis:{
                    x:{
                        type: 'timeseries',
                        tick: {
                            format: '%a'
                        }
                    }
                }
            });

            c3.generate({
                bindto: '#hoursconections',
                data: {
                    x : 'x',
                    columns: [
                        ['x', '1am', '2am', '3am', '4am', '5am', '6am','7am', '8am', '9am', '10am', '11am', '12pm',
                            '1pm', '2pm', '3pm', '4pm', '5pm', '6pm','7pm', '8pm', '9pm', '10pm', '11pm', '12am'],
                        ['data1', 30, 200, 100, 400, 150, 250,50, 140,30, 200, 100, 400, 150, 250,50, 140,
                            30, 200, 100, 400, 150, 250,50, 140]
                    ],
                    type: 'bar',
                    colors: {
                        data1: '#039be5'
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
                    y:{
                        show: true
                    }
                },
                axis:{
                    x:{
                        type: 'category',
                        tick: {
                            format: '%a'
                        }
                    }
                }
            });


            var chart = c3.generate({
                bindto: '#access',
                data: {
                    columns: [
                        ['data1', 30],
                        ['data2', 130],
                        ['data3', 200],
                        ['data4', 150]
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
                    order: 'null'
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
                        value: function (value, ratio, id, index) { return Math.abs(value); }
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

