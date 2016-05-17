@extends('layouts.mainmat')

@section('title', 'Nodos')

@section('head_scripts')
    {!! HTML::style('assets/css/nodes.css') !!}
    {!! HTML::style('assets/css/welcome.css') !!}
    {!! HTML::style('bower_components/c3js-chart/c3.min.css')!!}
@stop

@section('content')
    <div class="col s12 hide-on-med-and-up">
        <div class="card blue-grey white zero">
            <div class="card-content black-text show">
                <span class="card-title">{{ $branch->name }}</span>
                <p class="">{{ $branch->network->name }}</p>
            </div>
        </div>

        <div class="card blue-grey white">
            <div class="card-content black-text show">
                <ul class="black-text">
                    <span class="card-title">Información</span>
                    <li data-icon="keyboard_arrow_right">Status: {{$branch->status}}</li>
                    <hr>
                    <li data-icon="keyboard_arrow_right">
                        Globales: {{($branch->filters['external_ads']) ? 'Activas' : 'Inactivas'}}</li>
                    <hr>
                    <li data-icon="keyboard_arrow_right">Red: {{$branch->network->name}}</li>
                    <hr>
                    <li data-icon="keyboard_arrow_right">Tipo: {{$branch->network->type}}</li>
                    <hr>
                    <li data-icon="keyboard_arrow_right">Conexiones: {{ number_format($wlogs,0,'.',',') }}</li>
                    <hr>
                    <li data-icon="keyboard_arrow_right">Dispositivos: {{ number_format($devices,0,'.',',') }}</li>
                    <hr>
                    <li data-icon="keyboard_arrow_right">Usuarios
                        Recolectados: {{ number_format($users,0,'.',',') }}</li>
                    <hr>
                    <li data-icon="keyboard_arrow_right">Antenas: {{ count($branch->aps) }}</li>
                    <hr>
                    <li data-icon="keyboard_arrow_right">Campañas:
                        <ul class="black-text">
                            @foreach($aps as $ap)
                                <li data-icon="remove" style="margin-left: 25px;">{{$ap->name}}</li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-image" id="container">
                <div class="welcome card small z-depth-2">
                    <img class="responsive-img" style="margin-bottom: -6px;"
                         src="https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/{!! $branch->portal['image'] !!}">
                </div>
                <!-- Main card -->

                <!-- checkbox terminos y condiciones -->
                <div class="terms card small" id="terms-card">
                    <p class="center-align">

                        <input type="checkbox" id="terms-checkbox"/>
                        <label for="terms-checkbox">Acepto los <a class="modal-trigger" href="javascript:void(0)">Términos
                                y
                                condiciones</a></label>
                    </p>
                </div>
                <!-- checkbox terminos y condiciones -->

                <!-- login buttons -->
                <div class="login card small center-align" id="login-card">
                    <p>
                        {{--            {{ $message['text'] }}--}}
                        Para navegar
                    </p>
                    <a class="waves-effect waves-light btn fb-btn indigo darken-1 login-btn"
                       onclick="showLoader('fb-loader')" href="#!" data-progress="fb-loader"
                       id="fb-btn">
                        <img class="btn-logo" src="{!! asset('img/FB.png') !!}" alt="">
                        Conectar con Facebook

                        <div class="progress" id="fb-loader">
                            <div class="indeterminate"></div>
                        </div>
                    </a>


                </div>
            </div>
        </div>
    </div>

    <div class="col m12  hide-on-small-only">
        <div class="card blue-grey white zero">
            <div class="card-content black-text show">
                <span class="card-title">{{ $branch->name }}</span>
                <p class="">{{ $branch->network->name }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col s6 l4">
                <div class="card blue-grey white" style="min-height: 570px;">
                    <div class="card-content black-text">
                        <span class="card-title">Vista Previa</span>
                        <div style="position: relative; width: 250px; margin: 0 auto;">
                            <div class="preview" style="text-align: center;">
                                <img src="{{asset('images/android_placeholder.png')}}" alt="">
                            </div>
                            <div class="preview" id="mydiv">
                                <div class="card">
                                    <div class="card-image" id="container">
                                        <div class="welcome card small z-depth-2">
                                            <img class="responsive-img" style="margin-bottom: -6px;"
                                                 src="https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/{!! $branch->portal['image'] !!}">
                                        </div>
                                        <!-- Main card -->

                                        <!-- checkbox terminos y condiciones -->
                                        <div class="terms card small" id="terms-card">
                                            <p class="center-align">

                                                <input type="checkbox" id="terms-checkbox"/>
                                                <label for="terms-checkbox">Acepto los <a class=""
                                                                                          href="javascript:void(0)">Términos
                                                        y
                                                        condiciones</a></label>
                                            </p>
                                        </div>
                                        <!-- checkbox terminos y condiciones -->

                                        <!-- login buttons -->
                                        <div class="login card small center-align" id="login-card">
                                            <p>
                                                {{--            {{ $message['text'] }}--}}
                                                Para navegar
                                            </p>
                                            <a class="waves-effect waves-light btn fb-btn indigo darken-1 login-btn"
                                               onclick="showLoader('fb-loader')" href="#!" data-progress="fb-loader"
                                               id="fb-btn">
                                                <img class="btn-logo" src="{!! asset('img/FB.png') !!}" alt="">
                                                Conectar con Facebook

                                                <div class="progress" id="fb-loader">
                                                    <div class="indeterminate"></div>
                                                </div>
                                            </a>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 l4">
                <div class="card blue-grey white">
                    <div class="card-content black-text" style="min-height: 570px;">
                        <span class="card-title">Analiticos</span>
                        <div id="analitics"></div>
                    </div>
                </div>
            </div>
            <div class="col s6 l4">
                <div class="card blue-grey white" style="min-height: 570px;">
                    <div class="card-content black-text">
                        <span class="card-title">Información</span>
                        <ul class="black-text">
                            <li data-icon="keyboard_arrow_right">Status: {{$branch->status}}</li>
                            <hr>
                            <li data-icon="keyboard_arrow_right">
                                Globales: {{($branch->filters['external_ads']) ? 'Activas' : 'Inactivas'}}</li>
                            <hr>
                            <li data-icon="keyboard_arrow_right">Red: {{$branch->network->name}}</li>
                            <hr>
                            <li data-icon="keyboard_arrow_right">Tipo: {{$branch->network->type}}</li>
                            <hr>
                            <li data-icon="keyboard_arrow_right">Conexiones: {{ number_format($wlogs,0,'.',',') }}</li>
                            <hr>
                            <li data-icon="keyboard_arrow_right">
                                Dispositivos: {{ number_format($devices,0,'.',',') }}</li>
                            <hr>
                            <li data-icon="keyboard_arrow_right">Usuarios
                                Recolectados: {{ number_format($users,0,'.',',') }}</li>
                            <hr>
                            <li data-icon="keyboard_arrow_right">Antenas: {{ count($branch->aps) }}</li>
                            <hr>
                            <li data-icon="keyboard_arrow_right">Campañas:
                                <ul class="black-text">
                                    @foreach($aps as $ap)
                                        <li data-icon="remove" style="margin-left: 25px;">{{$ap->name}}</li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col s6 hide-on-small-only hide-on-large-only" style="height: 570px;">
                <div class="card blue-grey white">
                    <div class="card-content black-text">
                        <span class="card-title">Like Frecuentes</span>
                        <div id="table-wrapper">
                            <div id="table-scroll">
                                <table class="striped" style="overflow: auto;">
                                    <thead>
                                    <tr>
                                        <th>Nombre de la página</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <tbody style="overflow: auto;">

                                    @for($i=0;$i<count($wordCount);$i++)

                                        <?php
                                        $w_count = 0;
                                        for ($j = 0; $j < count($words); $j++) {
                                            if ($words[$j]['_id'] == $wordCount[$i]['_id']) {
                                                $w_count = $wordCount[$i]['count'];
                                                $w_index = $j;
                                            }
                                        }

                                        ?>

                                        <tr>
                                            <td>{!! $words[$w_index]['name'] !!}</td>
                                            <td>{!! $w_count !!}</td>
                                        </tr>

                                    @endfor


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l4 hide-on-med-and-down">
                <div class="card blue-grey white" style="min-height: 494px;">
                    <div class="card-content black-text">
                        <div class="uk-grid uk-grid-divider uk-grid-medium">
                            {{-- Google Maps --}}
                            <span class="card-title">Ubicación</span>
                            <div id="GoogleMap"
                                 style="margin: 0px auto; width: 91%; max-width: 850px; height: 380px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l8 hide-on-med-and-down">
                <div class="card blue-grey white">
                    <div class="card-content black-text">
                        <div class="uk-grid uk-grid-divider uk-grid-medium">
                            {{-- Google Maps --}}
                            <span class="card-title">World Cloud</span>
                            <a class="waves-effect waves-light btn modal-trigger right" href="#cloud">
                                <i class="material-icons">border_all</i></a>
                            <div class="word_cloud" style="width:800px; position: relative;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--modal--}}
    <div id="cloud" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4 class="heading_a uk-margin-bottom">Likes frecuentes</h4>
            <table class="striped">
                <thead>
                <tr>
                    <th>Nombre de la página</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>

                @for($i=0;$i<count($wordCount);$i++)

                    <?php
                    $w_count = 0;
                    for ($j = 0; $j < count($words); $j++) {
                        if ($words[$j]['_id'] == $wordCount[$i]['_id']) {
                            $w_count = $wordCount[$i]['count'];
                            $w_index = $j;
                        }
                    }

                    ?>

                    <tr>
                        <td>{!! $words[$w_index]['name'] !!}</td>
                        <td>{!! $w_count !!}</td>
                    </tr>

                @endfor


                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
        </div>
    </div>


@endsection

@section('scripts')
    {!! HTML::script('bower_components/c3js-chart/c3.min.js') !!}
    {!! HTML::script('bower_components/d3/d3.min.js') !!}
    {!! HTML::script('http://maps.google.com/maps/api/js') !!}
    {!! HTML::script('js/d3.layout.cloud.js') !!}

    <script>
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
                        /*onclick: function () {
                         window.open("http://www.w3schools.com");
                         }*/
                    },
                    padding: {
                        top: 50,
                        bottom: 40
                    },
                    size: {
                        height: 450
                    },
                    axis: {
                        x: {
                            type: 'timeseries',
                            tick: {
                                format: '%m-%d'
                            }
                        }
                    },
                    bar: {
                        width: {
                            ratio: 0.7 // this makes bar width 50% of length between ticks
                        }
                    }
                });

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

            marker.addListener('click', function () {
                infowindow.open(map, marker);
            });

            marker.setMap(map);
            infowindow.open(map, marker);
        }

        $(document).ready(function () {
            MarkerMap({!! $branch->location[0] !!}, {!! $branch->location[1] !!}, 16, document.getElementById('GoogleMap'));
        });

        //word cloud
        var fill = d3.scale.category20();

        var canvasWidth = 800;
        var canvasHeight = 400;

        //var wordValues = {".NET":5, "Silverlight":10, "jQuery":300, "CSS3":20, "HTML5":400, "JavaScript":200, "SQL":15,"C#":20}
        var wordValues = {
            @for($i=0;$i<count($wordCount);$i++)
            <?php
                    $w_count = 0;
                    $w_index = 0;

                    for ($j = 0; $j < count($words); $j++) {
                        if ($words[$j]['_id'] == $wordCount[$i]['_id']) {
                            $w_count = $wordCount[$i]['count'];
                            $w_index = $j;
                        }
                    }

                    ?>
            "{!! $words[$w_index]['name'] !!}":{!! $w_count !!},

            @endfor
        };

        var words = [
            @for($i=0;$i<count($words);$i++)
                    "{!! $words[$i]['name'] !!}",
            @endfor
        ];

        var sumWords = 0;
        for (var k in wordValues) {
            sumWords += wordValues[k];
        }

        d3.layout.cloud().size([canvasWidth, canvasHeight])
                .words(words.map(function (d) {
                    return {text: d, size: Math.max(60 * (Math.log(wordValues[d]) / Math.log(sumWords)), 20)};
                }))
                .rotate(function () {
                    return 0;
                })
                .font("Impact")
                .fontSize(function (d) {
                    return d.size;
                })
                .on("end", draw)
                .start();

        function draw(words) {
            d3.select(".word_cloud").append("svg")
                    .attr("width", canvasWidth)
                    .attr("height", canvasHeight)
                    .append("g")
                    .attr("transform", "translate(" + canvasWidth / 2 + "," + canvasHeight / 2 + ")")
                    .selectAll("text")
                    .data(words)
                    .enter().append("text")
                    .style("font-size", function (d) {
                        return d.size + "px";
                    })
                    .style("font-family", "Impact")
                    .style("fill", function (d, i) {
                        return fill(i);
                    })
                    .attr("text-anchor", "middle")
                    .attr("transform", function (d) {
                        return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
                    })
                    .text(function (d) {
                        return d.text;
                    });
        }

        $('.modal-trigger').leanModal();
    </script>
@stop