@extends('layouts.main_new')

@section('title', 'Campañas')

@section('head_scripts')
@stop

@section('content')

     <!--<div id="page_content">
        <div id="page_content_inner">


            <!-- network stats
            <div class="uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-3 uk-grid-medium hierarchical_show" data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <a href="#devices-graph" data-uk-modal>

                                <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">
                                        <?php $first = true;?>
                                        @foreach($devices_list as $device)
                                            @if($first)
                                                <?php $first = false;?>
                                                {{$device['num']}}
                                            @else
                                                {{','.$device['num']}}
                                            @endif
                                        @endforeach
                                    </span></div>

                            </a>
                            <span class="uk-text-muted uk-text-small">Dispositivos detectados</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>{!! $devices !!}</noscript></span></h2>
                        </div>
                    </div>
                </div>




                <div>
                    <div class="md-card">
                        <div class="md-card-content">

                            <a href="#users-graph" data-uk-modal>

                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_users peity_data">
                                    <?php $first = true;?>
                                    @foreach($users_list as $user)
                                        @if($first)
                                            <?php $first = false;?>
                                            {{$user['num']}}
                                        @else
                                            {{','.$user['num']}}
                                        @endif
                                    @endforeach
                                </span></div>

                            </a>

                            <span class="uk-text-muted uk-text-small">Usuarios recolectados</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>{!! $joined !!}</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">

                            <a href="#access-graph" data-uk-modal>

                                <div class="uk-float-right uk-margin-top uk-margin-small-right">
                                    <span class="peity_accessed peity_data">
                                        <?php $first = true;?>
                                        @foreach($accessed_list as $acc)
                                            @if($first)
                                                <?php $first = false;?>
                                                {{$acc['num']}}
                                            @else
                                                {{','.$acc['num']}}
                                            @endif
                                        @endforeach
                                    </span>
                                </div>
                            </a>

                            <span class="uk-text-muted uk-text-small">Accesos</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>{!! $completed !!}</noscript></span></h2>

                        </div>
                    </div>
                </div>

            </div>

            <!-- nodes map
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="md-card" style="height:450px;">
                        <div id="n_map" style="height:450px;">

                        </div>
                    </div>
                </div>
            </div>

            <!-- modals
            <div id="devices-graph" class="uk-modal">
                <div style="width:760px;" class="uk-modal-dialog uk-modal-dialog-large">

                    <a class="uk-modal-close uk-close"></a>


                    <h4 class="heading_a uk-margin-bottom">Disp. únicos por día</h4>

                    <div id="devices-graph-cont">

                    </div>


                </div>
            </div>

            <div id="users-graph" class="uk-modal">
                <div style="width:760px;" class="uk-modal-dialog uk-modal-dialog-large">

                    <a class="uk-modal-close uk-close"></a>


                    <h4 class="heading_a uk-margin-bottom">Usuarios por día</h4>
                    <div id="users-graph-cont">

                    </div>

                </div>
            </div>

            <div id="access-graph" class="uk-modal">
                <div style="width:760px;" class="uk-modal-dialog uk-modal-dialog-large">

                    <a class="uk-modal-close uk-close"></a>


                    <h4 class="heading_a uk-margin-bottom">Accesos diarios</h4>
                    <div id="access-graph-cont">

                    </div>

                </div>
            </div>
            <!-- end modals

        </div>
    </div> -->


@stop

@section('scripts')

    {!! HTML::script('http://maps.google.com/maps/api/js') !!}
    {!! HTML::script('js/marker_map.js') !!}
    {!! HTML::script('js/signals.min.js') !!}

        <!-- peity (small charts) -->
    {!! HTML::script("bower_components/peity/jquery.peity.min.js") !!}
            <!-- countUp -->
    {!! HTML::script('bower_components/countUp.js/countUp.min.js') !!}

    {!! HTML::script('bower_components/d3/d3.min.js') !!}
    {!! HTML::script('bower_components/c3js-chart/c3.min.js') !!}


    <script>
        //network map
        var mapDiv = document.getElementById("n_map");
        var map = new MarkerMap(23.8575691, -101.2433993, 5, mapDiv);

        var lat, lng;
        var name, marker, id;
        @foreach($branches as $b)

        var bra = "{{$b}}";

            lat = {{$b->location[0]}};
            lng = {{$b->location[1]}};
            name = "{{$b->name}}";
            id = "{!! $b->_id !!}";

            marker = new BooleanMarker(lat, lng, "", "");

            var contentString = '<div id="content">'+

                    '<strong><a style="font-size:20px; color:black;" href="{!! route('branches::show',$b->_id) !!}">'+
                    name+'</a></strong>'+
                '<div id="bodyContent">'+
                '{{ \Networks\Network::find(session('network_id'))->name }}'+
                '</div>'+
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            map.addMarker(marker, infowindow);
        @endforeach

        //network stats

        // animated numerical values
        $('.countUpMe').each(function () {
            var target = this,
                    countTo = $(target).text();
            theAnimation = new CountUp(target, 0, parseFloat(countTo), 0, 2);
            theAnimation.start();
        });

        $(".peity_accessed").peity("bar", {
            height: 28,
            width: 64,
            padding:0.1,
            fill: ["#98DF8A"]
        });

        $(".peity_visitors").peity("bar", {
            height: 28,
            width: 48,
            padding:0.1,
            fill: ["#df988a"],
        });

        $(".peity_users").peity("bar", {
            height: 28,
            width: 64,
            padding:0.1,
            fill: ["#d1e4f6"],
        });


        var deviceData=[['x'],['nuevos dispositivos']];
        @foreach($devices_list as $k=>$device)
                deviceData[0].push( "{{$k}}" );
        deviceData[1].push( {{$device['num']}} );
        @endforeach

        var chart = c3.generate({
            bindto: '#devices-graph-cont',
            data: {
                x: 'x',
                columns: deviceData,
                type: 'bar',
                onclick: function () {
                    window.open("http://www.w3schools.com");
                }
            },
            size: {
                width: 700
            },
            axis: {
                x: {
                    type: 'timeseries',
                    tick: {
                        format: '%Y-%m-%d'
                    }
                }
            },
            bar: {
                width: {
                    ratio: 0.7 // this makes bar width 50% of length between ticks
                }
            }
        });

        var usersData=[['x'],['nuevos usuarios'], ['usuarios recurrentes']];
        @foreach($users_list as $k=>$users)
            usersData[0].push( "{{$k}}" );
            usersData[1].push( {{$users['num']}} );
            @if( isset($users['rec']) )
            usersData[2].push( {{$users['rec']}} );
            @endif
        @endforeach

        var chart = c3.generate({
                    bindto: '#users-graph-cont',
                    data: {
                        x: 'x',
                        columns: usersData,
                        type: 'bar',
                        groups: [
                            ['nuevos usuarios', 'usuarios recurrentes']
                        ],
                        onclick: function () {
                            window.open("http://www.w3schools.com");
                        }
                    },
                    size: {
                        width: 700
                    },
                    axis: {
                        x: {
                            type: 'timeseries',
                            tick: {
                                format: '%Y-%m-%d'
                            }
                        }
                    },
                    bar: {
                        width: {
                            ratio: 0.7 // this makes bar width 50% of length between ticks
                        }
                    }
                });

        var accessData=[['x'],['nuevos usuarios'],['usuarios recurrentes']];
        @foreach($accessed_list as $k=>$access)
            accessData[0].push( "{{$k}}" );
            accessData[1].push( {{$access['new']}} );
            accessData[2].push( {{$access['rec']}} );
        @endforeach

        var chart2 = c3.generate({
                    bindto: '#access-graph-cont',
                    data: {
                        x: 'x',
                        columns: accessData,
                        type: 'bar',
                        groups: [
                            ['nuevos usuarios', 'usuarios recurrentes']
                        ],
                        onclick: function () {
                            window.open("http://www.w3schools.com");
                        }
                    },
                    size: {
                        width: 700
                    },
                    axis: {
                        x: {
                            type: 'timeseries',
                            tick: {
                                format: '%Y-%m-%d'
                            }
                        }
                    },
                    bar: {
                        width: {
                            ratio: 0.7 // this makes bar width 50% of length between ticks
                        }
                    }
                });

    </script>


@stop

