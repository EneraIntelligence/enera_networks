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
                            <div class=" col s12 m4">
                                <div>
                                    <h5 class="center-align section-title">Conexiones de Usuarios</h5>
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
            <div class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">assignment_ind</i>Trafico Total</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Trafico Total">{{ number_format($total,0,'.',',') }}</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate "><i class="material-icons prefix prefix-position">assessment</i>Dispositivos Unicos</span>
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
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">phone_iphone</i>Visitantes</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Visitantes">--</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Tasa de visitantes</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Tasa de visitantes"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>--%
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
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Taza de Lealtad</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Taza de Lealtad">--</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Crecimiento</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Crecimiento"><i class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>--%
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
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Visitantes Totales</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Visitantes Totales">{{ number_format($visits,0,'.',',') }}</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Crecimiento</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Crecimiento"><i class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>--%
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
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Dispositivos Nuevos</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Dispositivos Nuevos">--</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Crecimiento</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Crecimiento"><i class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>--%
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
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Visitantes Totales</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Visitantes Totales">--%</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Tasa de lealtad</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Tasa de lealtad"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>--%
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
                                    <h5 class="center-align section-title">Tiempo de permanencia </h5>
                                </div>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="input-field col s12 no-padding no-margin ">
                                <div id="time"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s12">
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Tiempo Promedia</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Tiempo Promedia">1:23:20</h4>
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
                            <div class="input-field col s12 m6 no-padding no-margin ">
                                <div id="os"></div>
                            </div>
                            <div class="input-field col s12 m6 no-padding no-margin ">
                                <div class="col s12">
                                    <div class="col s6 right-align">
                                        <i class="large material-icons">phone_iphone</i>
                                    </div>
                                    <div class="col s6">
                                        <h5>81.8%</h5>
                                        <h5>Mobile</h5>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="col s6 right-align">
                                        <i class="large material-icons">tablet_android</i>
                                    </div>
                                    <div class="col s6">
                                        <h5>81.8%</h5>
                                        <h5>Mobile</h5>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="col s6 right-align">
                                        <i class="large material-icons">laptop</i>
                                    </div>
                                    <div class="col s6">
                                        <h5>81.8%</h5>
                                        <h5>Mobile</h5>
                                    </div>
                                </div>
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


            var dates = JSON.parse('{!!  json_encode($date_for_devices) !!}');
            var devices = JSON.parse('{!!  json_encode($group_of_devices) !!}');

            c3.generate({
                bindto: '#device',
                data: {
                    x:'x',
                    columns: [
                        dates,
                        devices
                    ],
                    types: {
                        data1: 'area-spline'
                    },
                    colors: {
                        data1: '#b3e5fc'
                    },
                    names: {
                        data1 : 'Dispositivos'
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
                bindto: '#os',
                data: {
                    columns: [
                        ['data1', 30],
                        ['data2', 120],
                        ['data3', 120]
                    ],
                    type: 'donut',
                    colors: {
                        data1: '#fb8c00',
                        data2: '#ab47bc',
                        data3: '#8bc34a'
                    }
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

