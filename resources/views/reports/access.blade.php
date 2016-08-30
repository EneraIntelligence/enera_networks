@extends('layouts.mainmat')

@section('title', 'Reportes Accesos')


@section('head_scripts')
    {!! HTML::style('bower_components/c3js-chart/c3.min.css') !!}
    {!! HTML::style('assets/css/report.css') !!}

    <style>
        option{
            color: red;
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

        .section-title {
            color: white;
            background-color: #b3e5fc;
            border-radius: 10px;
            padding: 10px;
        }

        .inf-cont{
            height: 140px;
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
                        <div class="row no-margin">
                            <div class=" col s12 m4">
                                <div>
                                    <h5 class="center-align section-title">Sistema Operativo</h5>
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

            $('.tooltipped').tooltip({delay: 50});
        });
    </script>

@stop

