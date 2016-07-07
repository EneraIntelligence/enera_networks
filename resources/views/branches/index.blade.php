@extends('layouts.mainmat')

@section('title', 'Nodos')

@section('head_scripts')
    {!! HTML::style('assets/css/nodes.css') !!}
    {!! HTML::style('css/jquery.dataTables.min.css') !!}
@stop

@section('content')

    <div class="container">
        <h2 style="color: #424242 !important">Nodos</h2>
    </div>

    <!-- desktop -->
    <div class="container hide-on-med-and-down">

        <table id="branchesTable" class="display card" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Dispositivos</th>
                <th>Usuarios</th>
                <th>Conexiones</th>
                <th>Antenas</th>
                <th>Interacciones (v/c)</th>
                <th>Detalles</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Dispositivos</th>
                <th>Usuarios</th>
                <th>Conexiones</th>
                <th>Antenas</th>
                <th>Interacciones (v/c)</th>
                <th>Detalles</th>
            </tr>
            </tfoot>
            <tbody>

            @foreach($branches as $branch)
                <tr>
                    <td><a class="waves-effect waves-îndigo btn-flat" href="{{route('branches::show', ['id' => $branch->id])}}">{{$branch->name}}</a></td>
                    <td>10,000</td>
                    <td>50,000</td>
                    <td>300,000</td>
                    <td>10</td>
                    <td>250,000/100,000</td>
                    <td><a class="btn" href="{{route('branches::show', ['id' => $branch->id])}}">ir</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <!-- ipad -->
    <div class="container hide-on-large-only hide-on-small-only">

        <table id="branchesTableMobile" class="display card" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nombre</th>
                <th><i class="material-icons">devices</i></th>
                <th><i class="material-icons">accessibility</i></th>
                <th><i class="material-icons">settings_input_composite</i></th>
                <th><i class="material-icons">wifi_tethering</i></th>
                <th>Detalles</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Nombre</th>
                <th><i class="material-icons">devices</i></th>
                <th><i class="material-icons">accessibility</i></th>
                <th><i class="material-icons">settings_input_composite</i></th>
                <th><i class="material-icons">wifi_tethering</i></th>
                <th>Detalles</th>
            </tr>
            </tfoot>
            <tbody>

            @foreach($branches as $branch)
                <tr>
                    <td><a href="{{route('branches::show', ['id' => $branch->id])}}">{{$branch->name}}</a></td>
                    <td>10,000</td>
                    <td>5,000</td>
                    <td>300,000</td>
                    <td>10</td>
                    <td><a class="btn" href="{{route('branches::show', ['id' => $branch->id])}}">ir</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


    <!-- mobile -->
    <div class="hide-on-med-and-up">

        <table id="branchesTableMobile" class="display card" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nombre</th>
                <th><i class="material-icons">devices</i></th>
                <th><i class="material-icons">accessibility</i></th>
                <th>Detalles</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Nombre</th>
                <th><i class="material-icons">devices</i></th>
                <th><i class="material-icons">accessibility</i></th>
                <th>Detalles</th>
            </tr>
            </tfoot>
            <tbody>

            @foreach($branches as $branch)
            <tr>
                <td><a href="{{route('branches::show', ['id' => $branch->id])}}">{{$branch->name}}</a></td>
                <td>10,000</td>
                <td>5,000</td>
                <td><a class="btn" href="{{route('branches::show', ['id' => $branch->id])}}">ir</a></td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <!-- end table -->
{{--

    <ul class="collapsible  hide-on-med-and-up menu grey darken-3 white-text" data-collapsible="accordion">

        <li>
            <div class="collapsible-header grey darken-3 white-text">
                <div class="row zero">
                    <div class="col s6" style="text-align: center;">
                        <span>Nombre</span>
                    </div>
                    <div class="col s6" style="text-align: right;">
                        <span>Nodos</span>
                    </div>
                </div>
            </div>
        </li>

        @foreach($branches as $branch)
            <li>
                <div class="collapsible-header grey darken-3 white-text">
                    <span class="icon-menu">
                        {{strtoupper(substr($branch->name, 0, 2)) }}
                    </span>
                    <span>
                        {{(strlen($branch->name > 28)) ? $branch->name : substr($branch->name, 0, 28)}}
                    </span>
                    <span class="data-menu" style="padding: 0 10px 0 0;">
                        {{ $branch->campaign_logs()->where('interaction.welcome_loaded','exists',true)->count() }}
                        / {{ count($branch->aps) }}
                    </span>
                </div>
                <div class="collapsible-body grey">
                    <div class="container">
                        <ul class="list grey white-text card_info">
                            <li data-icon="keyboard_arrow_right">Status: <span class="light-text">{{$branch->status}}</span></li>
                            <li data-icon="keyboard_arrow_right">
                                Globales: <span class="light-text">{{$branch->status}}</span></li>
                            <li data-icon="keyboard_arrow_right">Aps: <span class="light-text">
                                    {{count($branch->aps)}}
                                </span></li>
                        </ul>
                        <a href="{{route('branches::show', ['id' => $branch->id])}}"
                           class="waves-effect waves-light btn btn-mobil">Ver más detalles</a>
                    </div>
                </div>
            </li>
        @endforeach

    </ul>

    <div class="container">
        <div class="hide-on-small-only">
            <div class="row">
                @foreach($branches as $branch)
                    <div class="col m4 l3">
                        <div class="card grey darken-3 white-text">
                            <div class="card-content white-text">
                                <div class="card-image margin-image">
                                    <img src="{{"https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/". ($branch->portal['image'] )}}"
                                         class="responsive-img" height="258" width="258">
                                </div>
                                <ul class="list white-text">
                                    <li data-icon="keyboard_arrow_right">Nombre: <span class="light-text">{{$branch->name}}</span></li>
                                    <hr>
                                    <li data-icon="keyboard_arrow_right">Status: <span class="light-text">{{$branch->status}}</span></li>
                                    <hr>
                                    <li data-icon="keyboard_arrow_right">Ap´s: <span class="light-text">{{count($branch->aps)}}</span></li>
                                    <hr>
                                </ul>
                            </div>
                            <div class="card-action">
                                <a class="blue-text" href="{{route('branches::show', ['id' => $branch->id])}}">Ver más
                                    detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
--}}

@stop

@section('scripts')

    {!! HTML::script('js/jquery.dataTables.min.js') !!}

    <script>
        $(document).ready(function () {

            $('#branchesTable').DataTable({
                "language": {
                    "search": "<i class='material-icons'>search</i>",
                    "lengthMenu": "Mostrar _MENU_ por página",
                    "zeroRecords": "No hay Nodos",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay información",
                    "infoFiltered": "(filtrado de _MAX_ registros)",
                    "oPaginate": {
                        "sFirst":    	"<i class='material-icons'>fast_rewind</i>",
                        "sPrevious": 	"<i class='material-icons'>skip_previous</i>",
                        "sNext":     	"<i class='material-icons'>skip_next</i>",
                        "sLast":     	"<i class='material-icons'>fast_forward</i>"
                    }
                }
            });

            $('#branchesTableMobile').DataTable({
                "language": {
                    "search": "<i class='material-icons'>search</i>",
                    "lengthMenu": "Mostrar _MENU_ por página",
                    "zeroRecords": "No hay Nodos",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay información",
                    "infoFiltered": "(filtrado de _MAX_ registros)",
                    "oPaginate": {
                        "sFirst":    	"<i class='material-icons'>fast_rewind</i>",
                        "sPrevious": 	"<i class='material-icons'>skip_previous</i>",
                        "sNext":     	"<i class='material-icons'>skip_next</i>",
                        "sLast":     	"<i class='material-icons'>fast_forward</i>"
                    }
                }
            });

            $('.collapsible').collapsible({
                accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            });
        });
    </script>
@stop

