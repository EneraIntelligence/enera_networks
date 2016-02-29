@extends('layouts.main')

@section('title', 'Campañas')

@section('head_scripts')
@stop

@section('content')

    <div id="page_content">
        <div id="page_content_inner">


            <!-- network stats -->
            <div class="uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-3 uk-grid-medium hierarchical_show" data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
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
                            <span class="uk-text-muted uk-text-small">Dispositivos únicos</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>{!! $devices !!}</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
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
                            <span class="uk-text-muted uk-text-small">Usuarios únicos</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>{!! $joined !!}</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
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
                            <span class="uk-text-muted uk-text-small">Accesos</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>{!! $completed !!}</noscript></span></h2>

                        </div>
                    </div>
                </div>

            </div>

            <!-- nodes map -->
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="md-card" style="height:450px;">
                        <div id="n_map" style="height:450px;">

                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>


@stop

@section('scripts')

    {!! HTML::script('http://maps.google.com/maps/api/js') !!}
    {!! HTML::script('js/marker_map.js') !!}
    {!! HTML::script('js/signals.min.js') !!}

        <!-- peity (small charts) -->
    {!! HTML::script("bower_components/peity/jquery.peity.min.js") !!}
            <!-- countUp -->
    {!! HTML::script('bower_components/countUp.js/countUp.min.js') !!}



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
        /*
        var peityInteractions = $(".peity_accessed");
        setInterval(function () {
            var random = Math.round(Math.random() * 10);
            var values = peityInteractions.text().split(",");
            values.shift();
            values.push(random);

            pityInteractions
                    .text(values.join(","))
                    .change();
        }, 1000);
        */

        $(".peity_visitors").peity("bar", {
            height: 28,
            width: 48,
            padding:0.1,
            fill: ["#df988a"],
        });
        /*
        var peityDevices = $(".peity_visitors");
        setInterval(function () {
            var random = Math.round(Math.random() * 10);
            var values = peityDevices.text().split(",");
            values.shift();
            values.push(random);

            peityDevices
                    .text(values.join(","))
                    .change();


        }, 1000);
*/

        $(".peity_users").peity("bar", {
            height: 28,
            width: 64,
            padding:0.1,
            fill: ["#d1e4f6"],
        });
        /*
        var peityConnected = $(".peity_users");
        setInterval(function () {
            var random = Math.round(Math.random() * 10);
            var values = peityConnected.text().split(",");
            values.shift();
            values.push(random);

            peityConnected
                    .text(values.join(","))
                    .change();


        }, 1000);
*/

    </script>


@stop

