@extends('layouts.mainmat')

@section('title', 'Reportes Campañas')


@section('head_scripts')
    {!! HTML::style('bower_components/c3js-chart/c3.min.css') !!}
    {!! HTML::style('assets/css/report.css') !!}

    <style>
        option {
            color: red;
        }

        option {
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
            background-color: #039be5;
            border-radius: 10px;
            padding: 10px;
        }

        .inf-cont {
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

        .c3-target-colora {
            stroke: red;
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
                                <div id="topaccess"></div>
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
                                            class="material-icons prefix prefix-position">assignment_ind</i>Accesos Totales</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Accesos Totales">2222</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate "><i class="material-icons prefix prefix-position">assessment</i>Crecimiento</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Crecimiento"><i class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>24%
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
                                            class="material-icons prefix prefix-position">phone_iphone</i>Accesos Nuevos</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Accesos Nuevos">2222</h4>
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
            <div class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate "><i
                                            class="material-icons prefix prefix-position">group</i>Completados</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Completados">2222</h4>
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
            <div class="col s12">
                <div class="card white">
                    <div class="card-content">
                        <p>Sección</p>
                        <div class="row no-margin">
                            <div class=" col s12 m4">
                                <div>
                                    <h5 class="center-align section-title">Top interactions de Campañas</h5>
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
                                <div id="topinteractions"></div>
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
                                <div id="statistics"></div>
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
                bindto: '#topaccess',
                data: {
                    x: 'x',
                    columns: [
                        ['x', 'nombre1', 'nombre2', 'nombre3', 'nombre4', 'nombre5'],
                        ['access', 300, 350, 300, 100, 150, 300]
                    ],
                    types: {
                        access: 'area-spline'
                    },
                    colors: {
                        access: '#b3e5fc'
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
                        type: 'category' // this needed to load string x value
                    }
                }
            });

            c3.generate({
                bindto: '#topinteractions',
                data: {
                    x: 'x',
                    columns: [
                        ['x', 'nombre1', 'nombre2', 'nombre3', 'nombre4', 'nombre5'],
                        ['welcome', 30, 200, 100, 400, 150],
                        ['loaded', 30, 200, 100, 400, 150],
                        ['completed', 30, 200, 100, 400, 150]
                    ],
                    type: 'bar',
                    colors: {
                        welcome: '#ab47bc',
                        loaded: '#039be5',
                        completed: '#8bc34a'
                    },
                    groups: [
                        ['welcome','loaded', 'completed']
                    ]
                },
                bar: {
                    width: {
                        ratio: .50
                    }
                },
                axis: {
                    x: {
                        type: 'category' // this needed to load string x value
                    }
                },
                grid: {
                    y: {
                        show :true
                    }
                }
            });


            c3.generate({
                bindto: '#statistics',
                data: {
                    columns: [
                        ['data1', 10, 10, 10, 10, 10, 10],
                        ['data2', 20, 20, 20, 20, 20, 20],
                        ['data3', 30, 30, 30, 30, 30, 30],
                        ['data4', 40, 40, 40, 40, 40, 40],
                        ['data5', 60, 60, 60, 60, 60, 60],
                        ['data6', 70, 70, 70, 70, 70, 70]
                    ],
                    types: {
                        data1: 'area',
                        data2: 'area',
                        data3: 'area',
                        data4: 'area',
                        data5: 'area',
                        data6: 'area'
                        // 'line', 'spline', 'step', 'area', 'area-step' are also available to stack
                    },
                    groups: [['data1', 'data2','data3','data4','data5','data6']],
                    colors: {
                        data1: '#ffebee',
                        data2: '#b71c1c',
                        data3: '#ede7f6',
                        data4: '#311b92',
                        data5: '#e8f5e9',
                        data6: '#1b5e20'
                    }
                },
                grid: {
                    x: {
                        show :true
                    }
                }
            });

            $('.tooltipped').tooltip({delay: 50});
        });
    </script>

@stop

