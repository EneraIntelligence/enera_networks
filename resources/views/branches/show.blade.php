@extends('layouts.main')

@section('title', 'Nodos')

@section('head_scripts')
    {!! HTML::style('assets/css/campaign.css') !!}
    {!! HTML::style('bower_components/c3js-chart/c3.min.css') !!}
    <style>
        .margi-title {
            margin: 5px 0 5px 25px;
        }

        .border {
            border: solid red 1px;
        }
    </style>
@stop

@section('content')
    <div id="page_heading">
        <h1>{{ $branch->name }}</h1>
        <span class="uk-text-muted uk-text-upper uk-text-small">
            {{  $network->name }}
        </span>
    </div>

    <div id="page_content_inner">
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            <div class="uk-width-xLarge-2-10 uk-width-large-3-10 uk-row-first">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Portal
                        </h3>
                    </div>
                    <div class="md-card-content">
                        {{-- Similador --}}
                        <div class="preview-container" style="height: 469px; margin: 25px 0px 15px;">

                            <img class="uk-align-center uk-responsive-width phone"
                                 src="http://networks.enera-intelligence.mx/images/android_placeholder.png" alt=""
                                 style="margin-bottom: 0px;">

                            <!-- like preview -->
                            <div class="interaction uk-align-center uk-position-relative"
                                 style="height: 320px; margin-top: -394px; width: 202px;
                                         background-image: url('https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/{!! $branch->portal['background'] !!}'); background-repeat: no-repeat; background-position: top center; background-attachment: fixed; background-size: cover;">

                                <img class="interaction-image"
                                     src="https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/{!! $branch->portal['image'] !!}"
                                     style="margin-bottom: 10px;">

                                <img class="interaction-image"
                                     src="http://networks.enera-intelligence.mx/images/terminos.png"
                                     style="margin: 10px 0; width: 300px;">

                                <img class="uk-align-left" width="60" height="50"
                                     src="https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/logo_pie_enera.png"
                                     alt="">

                                <div class="uk-clearfix"></div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Detalles
                        </h3>
                    </div>
                    <div class="md-card-content">
                        <ul class="md-list">
                            <li>
                                <div class="md-list-content">
                                    <span class="uk-text-small uk-text-muted uk-display-block">Antenas</span>
                                    <span class="md-list-heading uk-text-large uk-text-success">
                                        {{ count($branch->aps) }}
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="md-list-content">
                                    <span class="uk-text-small uk-text-muted uk-display-block">Conexiones</span>
                                    <span class="md-list-heading uk-text-large">
                                        {{ number_format($branch->campaign_logs()->count(),0,'.',',') }}
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="md-list-content">
                                    <span class="uk-text-small uk-text-muted uk-display-block">Dispositivos detectados</span>
                                    <span class="md-list-heading uk-text-large">
                                        {{ number_format($devices,0,'.',',') }}
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="md-list-content">
                                    <span class="uk-text-small uk-text-muted uk-display-block">Usuarios recolectados</span>
                                    <span class="md-list-heading uk-text-large">
                                        {{ number_format($users,0,'.',',') }}
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-xLarge-8-10  uk-width-large-7-10">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Ubicacion
                        </h3>
                    </div>
                    <div class="md-card-content large-padding" style="padding: 5px 35px;">
                        <div class="uk-grid uk-grid-divider uk-grid-medium">
                            {{-- Google Maps --}}
                            <div id="GoogleMap"
                                 style="margin: 0px auto;width: 91%; max-width: 850px; height: 380px;"></div>
                        </div>
                    </div>
                </div>
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Analiticas
                        </h3>
                    </div>
                    <div class="md-card-content large-padding">
                        <div class="uk-grid uk-grid-divider uk-grid-medium ">
                            <div id="analitics" class="c3" style="width: 85%; position: relative;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection

    @section('scripts')
    {!! HTML::script('js/preview_helper.js') !!}
    {!! HTML::script('http://maps.google.com/maps/api/js') !!}
            <!-- d3 -->
    {{--<script src="bower_components/d3/d3.min.js"></script>--}}
    {!! HTML::script('bower_components/d3/d3.min.js') !!}
            <!-- metrics graphics (charts) -->
    {{--<script src="bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>--}}
            <!-- c3.js (charts) -->
    {!! HTML::script('bower_components/c3js-chart/c3.min.js') !!}
    <script>
        function MarkerMap(lat, lng, zoom, DOMElement) {
            this.center = new google.maps.LatLng(lat, lng);
            this.zoom = zoom;
            //
            var properties = {
                center: this.center,
                zoom: this.zoom,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(DOMElement, properties);

            var marker = new google.maps.Marker({
                title: '{!! $branch->name !!}',
                position: new google.maps.LatLng(lat, lng),
                animation: google.maps.Animation.DROP,
//                icon: imgOff,
            });

            var infowindow = new google.maps.InfoWindow({
                content: '<b>{!! $branch->name !!}</b><br>{!! $network->name !!}',
            });

            marker.setMap(map);
            infowindow.open(map, marker);
        }
        $(document).ready(function () {
            MarkerMap({!! $branch->location[0] !!}, {!! $branch->location[1] !!}, 16, document.getElementById('GoogleMap'));
        });

        var datos = [
            ['x'],
            ['Welcome'],
            ['Joined'],
            ['Requested'],
            ['Loaded'],
            ['Completed'],
        ];
        @foreach($int_days as $k => $day)
        datos[0].push('{!! $k !!}');
        datos[1].push({!! $day['welcome'] !!});
        datos[2].push({!! $day['joined'] !!});
        datos[3].push({!! $day['requested'] !!});
        datos[4].push({!! $day['loaded'] !!});
        datos[5].push({!! $day['completed'] !!});
        @endforeach

        var chart = c3.generate({
            bindto: '#analitics',
            data: {
                x: 'x',
                columns: datos,
                type: 'bar',
                groups: [
                    ['Welcome', 'Joined', 'Requested', 'Loaded', 'Completed']
                ],
                onclick: function () {
                    window.open("http://www.w3schools.com");
                }
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