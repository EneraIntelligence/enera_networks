@extends('layouts.mainmat')

@section('title', 'Perfil')


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
                        <span class="card-title">Periodo</span>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">event</i>
                                <select>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                        <img src="https://s3-us-west-1.amazonaws.com/enera-publishers/avatars/{!! isset($user->image) ? $user->image : 'usern.png'!!}"
                             alt="Enera" class="" style="position: absolute; top: 10px; right: 10px; width: 75px;">
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card white">
                    <div class="card-content">
                        <p>Sección</p>
                        <div class="row no-margin">
                            <div class="input-field col s6">
                                <select>
                                    <option value="">Vista de dispositivos</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                            <div class="input-field col s6">
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
                                            class="material-icons prefix prefix-position">assignment_ind</i>Visitantes Totales</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="isitantes Totales">2222</h4>
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
                                            class="material-icons prefix prefix-position">phone_iphone</i>Disp. Nuevos</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Disp. Nuevos">2222</h4>
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
                                            class="material-icons prefix prefix-position">group</i>Taza de Lealtad</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Taza de Lealtad">2222</h4>
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
        </div>
        <div class="col s12">
            <div class="card white">
                <div class="card-content">
                    <p>Sección</p>
                    <div class="row no-margin">
                        <div class="input-field col s12 no-padding no-margin ">
                            <div id="time"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">group</i>Trafico total</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Trafico total">2222</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate tooltipped"><i
                                            class="material-icons prefix prefix-position">event</i>Dispositivos Unicos</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Dispositivos Unicos">12%
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
                                            class="material-icons prefix prefix-position">phone_iphone</i>Passer By</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Passer By">2222</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12"><i class="material-icons prefix prefix-position">group</i>Visitantes</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Visitantes"><i class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>55%
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
                                            class="material-icons prefix prefix-position">event</i>Taza de visita</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Taza de visita">2222</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">assessment</i>Visitanrtes Unicos</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Visitanrtes Unicos"><i
                                            class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>24%
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="card white">
                <div class="card-content">
                    <h5>Sistemas Operativos</h5>
                    <div class="row no-margin">
                        <div class="input-field col s12 no-padding no-margin ">
                            <div id="op"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div class="card white">
                    <div class="card-content">
                        <div class="row no-margin">
                            <div class="col s6">
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">group</i>Trafico total</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Trafico total">2222</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i class="material-icons prefix prefix-position">phone_iphone</i>Dispositivos Unicos</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Dispositivos Unicos">24%
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
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">event</i>Passer By</span>
                                <h4 class="center-align tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Passer By">2222</h4>
                            </div>
                            <div class="col s6 left-border">
                                <span class="f-size-12 truncate"><i
                                            class="material-icons prefix prefix-position">group</i>Visitantes</span>
                                <h4 class="center-align green-text tooltipped" data-position="bottom" data-delay="50"
                                    data-tooltip="Visitantes"><i class="material-icons prefix hide-on-med-and-down">arrow_drop_up</i>24%
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="card white">
                <div class="card-content">
                    <h5>Sistemas Operativos</h5>
                    <div class="input-field col s6">
                        <select>
                            <option value="">Vista de dispositivos</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    <div class="row top-margin">
                        <div class="col s12">
                            <table class="striped highlight">
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
                        data1: '#b0bec5'
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

