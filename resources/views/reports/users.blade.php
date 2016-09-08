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
                                    data-tooltip="Trafico Total">{{ number_format($total,0,'.',',') }}</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate "><a class="mdi mdi-chart-bar mdi-24px black-text" href="/"></a>Dispositivos Unicos</span>
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
                                <span class="f-size-12 truncate"><a class="mdi mdi-chart-bar mdi-24px black-text" href="/"></a>Tasa de visitantes</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Tasa de visitantes"><i
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
                                <span class="f-size-12 truncate"><a class="mdi mdi-human-female mdi-24px black-text" href="/"></a>Mujeres Totales</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Mujeres Totales">{{ number_format($total_female,0,'.',',') }}</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Mujeres Nuevas</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Mujeres Nuevas"><i
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
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">phone_iphone</i>Dispositivos Favoritos</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Dispositivos Favoritos">--</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><a class="mdi mdi-av-timer mdi-24px black-text" href="/"></a>Hora Favorita</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
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
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate"><a class="mdi mdi-av-timer mdi-24px black-text" href="/"></a>Tiempo Promedio</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Tiempo Promedio">--</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><a class="mdi mdi-heart mdi-24px black-text" href="/"></a>Taza de Leatad</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
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
                                <span class="f-size-12 truncate"><a class="mdi mdi-cake-variant mdi-24px black-text" href="/"></a>Edad promedio</span>
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
                                <span class="f-size-12 truncate"><a class="mdi mdi-human-male mdi-24px black-text" href="/"></a>Hombres Totales</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Hombres Totales">{{ number_format($total_male,0,'.',',') }}</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>hombres Nuevos</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Hombres Nuevos"><i
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
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">phone_iphone</i>Dispositivos Favoritos</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Dispositivos Favoritos">--</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><a class="mdi mdi-av-timer mdi-24px black-text" href="/"></a>Hora Favorita</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
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
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate"><a class="mdi mdi-av-timer mdi-24px black-text" href="/"></a>Tiempo Promedio</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Tiempo Promedio">--</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><a class="mdi mdi-heart mdi-24px black-text" href="/"></a>Taza de Leatad</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
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
                                <span class="f-size-12 truncate"><a class="mdi mdi-cake-variant mdi-24px black-text" href="/"></a>Edad promedio</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Edad promedio">{{ number_format($promedio_hombres,0,'.',',') }}</h4>
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

            var mujeres = JSON.parse('{!!  json_encode($female) !!}');
            var hombres = JSON.parse('{!!  json_encode($male) !!}');

            c3.generate({
                bindto: '#users',
                data: {
                    x : 'x',
                    columns: [
                        ['x', '0-17', '18-34', '35-45', '46-60', '61+'],
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
                bindto: '#ages',
                data: {
                    x : 'x',
                    columns: [
                        ['x', '2013-01-01', '2013-01-02', '2013-01-03', '2013-01-04', '2013-01-05', '2013-01-06'],
                        ['female', 30, 200, 100, 400, 150, 250],
                        ['male', 70, 20, 50, 200, 450, 350]
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

