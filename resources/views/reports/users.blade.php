@extends('layouts.mainmat')

@section('title', 'Reportes Usuarios')


@section('head_scripts')
    {!! HTML::style('bower_components/c3js-chart/c3.min.css') !!}
    {!! HTML::style('assets/css/report.css') !!}

    <style>
        .section-title {
            color: white;
            background-color: #b3e5fc;
            border-radius: 10px;
            padding: 10px;
        }

        .center {
            margin: auto;
            width: 50%;
            padding: 10px;
        }

        @media screen and (max-width: 480px) {
            .center {
                width: 100%;
                padding: 15px;
            }
        }



    </style>

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
                                            class="material-icons prefix prefix-position">assignment_ind</i>Trafico Total</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Trafico Total">2222</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate "><i class="material-icons prefix prefix-position">assessment</i>Dispositivos Unicos</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Dispositivos Unicos"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>24
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
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">phone_iphone</i>Visitantes</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Visitantes">2222</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Tasa de visitantes</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Tasa de visitantes"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>24%
                                </h4>
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
                                <select>
                                    <option value="">Rangos de edad</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="input-field col s12 no-padding no-margin ">
                                <div id="female"></div>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="input-field col s12 no-padding no-margin ">
                                <div id="male"></div>
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
                                            class="material-icons prefix prefix-position">phone_iphone</i>Mujeres Totales</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Mujeres Totales">2222</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Mujeres Nuevas</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Mujeres Nuevas"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>24%
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
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">phone_iphone</i>Hombres Totales</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Hombres Totales">2222</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>hombres Nuevos</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Hombres Nuevos"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>24%
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
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">phone_iphone</i>Dispositivos Favoritos</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Dispositivos Favoritos">2222</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Hora Favorita</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Hora Favorita"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>24%
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
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">phone_iphone</i>Tiempo Promedio</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Tiempo Promedio">2222</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Taza de Leatad</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Taza de Leatad"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>24%
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
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">phone_iphone</i>Edad promedio</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Edad promedio">2222</h4>
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
                                    <h5 class="center-align section-title">Top conexiones Únicas</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="input-field no-padding no-margin center">
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
                                <a class="waves-effect waves-light btn cyan lighten-5">Ver informe de nodos</a>
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
                bindto: '#users',
                data: {
                    x : 'x',
                    columns: [
                        ['x', '65+', '45-65', '35-44', '25-34', '19-24', '13-18'],
                        ['male', -30, -200, -100, -400,-200, -20],
                        ['female', 90, 100, 140, 200,300, 10]
                    ],
                    groups: [
                        ['male', 'female']
                    ],
                    type: 'bar'
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
                            format: function (x) { return Math.abs(x); }
                        }
                    },
                    x: {
                        type: 'category' // this needed to load string x value
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
                }

            });

            c3.generate({
                bindto: '#female',
                data: {
                    x : 'x',
                    columns: [
                        ['x', '2013-01-01', '2013-01-02', '2013-01-03', '2013-01-04', '2013-01-05', '2013-01-06'],
                        ['data1', 30, 200, 100, 400, 150, 250]
                    ]
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

            c3.generate({
                bindto: '#male',
                data: {
                    x: 'x',
                    columns: [
                        ['x', '2013-01-01', '2013-01-02', '2013-01-03', '2013-01-04', '2013-01-05', '2013-01-06'],
                        ['data1', 30, 200, 100, 400, 150, 250]
                    ]
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
                    labels: true
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

