@extends('layouts.mainmat')

@section('title', 'Nodos')

@section('head_scripts')
    {!! HTML::style('assets/css/nodes.css') !!}
    {!! HTML::style('css/jquery.dataTables.min.css') !!}
@stop

@section('content')

    <div class="container main-container">
        <h2 style="color: #424242 !important">Nodos</h2>
    </div>

    <!-- desktop -->
    <div class="container hide-on-med-and-down main-container">

        <table id="branchesTable" class="display card" cellspacing="0" width="100%">

            <thead>
            <tr>
                <th>Nombre</th>
                <th>Antenas</th>
                <th>Dispositivos</th>
                <th>Usuarios</th>
                <th>Conexiones</th>
                <th>Conversiones (%)</th>
                <th>Detalles</th>
            </tr>
            </thead>

            <tfoot style="display: none;">
            <tr>
                <th>Nombre</th>
                <th>Antenas</th>
                <th>Dispositivos</th>
                <th>Usuarios</th>
                <th>Conexiones</th>
                <th>Conversiones (%)</th>
                <th>Detalles</th>
            </tr>
            </tfoot>

            <tbody>

            @foreach($branches as $branch)
                <tr>
                    <td><a class="waves-effect waves-îndigo btn-flat" href="{{route('branches::show', ['id' => $branch->id])}}">{{$branch->name}}</a></td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--%</td>
                    <td><a class="btn" href="{{route('branches::show', ['id' => $branch->id])}}">ir</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <!-- ipad -->
    <div class="container hide-on-large-only hide-on-small-only main-container">

        <table id="branchesTableTablet" class="display card" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nombre</th>
                <th><i class="material-icons">wifi_tethering</i></th>
                <th><i class="material-icons">devices</i></th>
                <th><i class="material-icons">accessibility</i></th>
                <th><i class="material-icons">settings_input_composite</i></th>
                <th>Detalles</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Nombre</th>
                <th><i class="material-icons">wifi_tethering</i></th>
                <th><i class="material-icons">devices</i></th>
                <th><i class="material-icons">accessibility</i></th>
                <th><i class="material-icons">settings_input_composite</i></th>
                <th>Detalles</th>
            </tr>
            </tfoot>


            <tbody>

            @foreach($branches as $branch)
                <tr>
                    <td><a href="{{route('branches::show', ['id' => $branch->id])}}">{{$branch->name}}</a></td>
                    <td>10</td>
                    <td>5,000</td>
                    <td>300,000</td>
                    <td>10,000</td>
                    <td><a class="btn" href="{{route('branches::show', ['id' => $branch->id])}}">ir</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


    <!-- mobile -->
    <div class="hide-on-med-and-up ">

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

@stop

@section('scripts')

    {!! HTML::script('js/jquery.dataTables.min.js') !!}

    <script>
        $(document).ready(function () {

            let languajeObj = {
                "search": "<i class='material-icons'>search</i>",
                "lengthMenu": "Mostrar _MENU_ por página",
                "zeroRecords": "No hay Nodos",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay información",
                "infoFiltered": "(filtrado de _MAX_ registros)",
                "oPaginate": {
                    "sFirst":    	"<i class='material-icons table-icon'>fast_rewind</i>",
                    "sPrevious": 	"<i class='material-icons table-icon'>skip_previous</i>",
                    "sNext":     	"<i class='material-icons table-icon'>skip_next</i>",
                    "sLast":     	"<i class='material-icons table-icon'>fast_forward</i>"
                }
            };

            //init desktop table
            $('#branchesTable').DataTable({
                "language": languajeObj
            });

            //init tablet table
            $('#branchesTableTablet').DataTable({
                "language": languajeObj
            });

            //init mobile table
            $('#branchesTableMobile').DataTable({
                "language": languajeObj
            });


            $('.collapsible').collapsible({
                accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            });
        });


        //scrolling table header
        $(document).scroll(function() {
            //desktop
            let table = $("#branchesTable");
            let tableTitle = table.find("thead");
            let tableFooter = table.find("tfoot");

            scrollTableHeader(table, tableTitle, tableFooter);

            //tablet
            table = $("#branchesTableTablet");
            tableTitle = table.find("thead");
            tableFooter = table.find("tfoot");

            scrollTableHeader(table, tableTitle, tableFooter);

            //mobile
            table = $("#branchesTableMobile");
            tableTitle = table.find("thead");
            tableFooter = table.find("tfoot");

            scrollTableHeader(table, tableTitle, tableFooter);
        });

        function scrollTableHeader(table, tableTitle, tableFooter)
        {
            if($(document).scrollTop() > table.offset().top)
            {
                //bellow table title

                tableTitle.css("position", "fixed");
                tableTitle.css("background-color","white");
                tableTitle.css("top","0");
                tableTitle.css("z-index","2");

                tableFooter.css("display","table-header-group");

            }
            else
            {
                //above table title
                tableTitle.css("position", "relative");
                tableTitle.css("top", "0");

                tableFooter.css("visibility", "hidden");
                tableFooter.css("display", "none");
            }

        }
    </script>
@stop

