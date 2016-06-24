@extends('layouts.mainmat')

@section('title', 'Nodos')

@section('head_scripts')
    {!! HTML::style('assets/css/nodes.css') !!}
    {!! HTML::style('assets/css/welcome.css') !!}
    {!! HTML::style('bower_components/c3js-chart/c3.min.css')!!}

    <style>
        .table-striped > tbody > tr:nth-child(odd) > td,
        .table-striped > tbody > tr:nth-child(odd) > th {
            background-color: #424242;
        }

        .table-striped > tbody > tr:nth-child(even) > td,
        .table-striped > tbody > tr:nth-child(even) > th {
            background-color: #ccc;
        }

        .table-striped > thead > tr > th {
            background-color: #ccc;
        }

        #info li {
            height: 31px;
            line-height: 30px;
        }

        #info li:nth-child(2n+1) {
            background-color: #757575
        }
    </style>
@stop

@section('content')

    <div class="col s12 m12 l12  container">
        <div class="row">

            <h2 class="left-align" style="color: #424242 !important">{{$branch->name}}</h2>

            <div class="col s12 m12 l8" style="overflow: hidden;">
                <div class="col s6 l6" style="padding:0 5px 0 0;">
                    <div class="card grey darken-3 white-text" style="min-height: 280px;max-height: 280px;">
                        <div class="card-content white-text">
                            <span class="card-title">Información</span>
                            <ul id="info" class="white-text" style="overflow:scroll; max-height:185px">
                                {{--<li data-icon="keyboard_arrow_right">
                                    Status:<span class="light-text">{{$branch->status}}</span>
                                </li>--}}
                                {{--<li data-icon="keyboard_arrow_right">
                                    Globales:
                                    <span class="light-text">{{($branch->filters['external_ads']) ? 'Activas' : 'Inactivas'}}</span>
                                </li>--}}
                                {{--<li data-icon="keyboard_arrow_right">
                                    Red:<span class="light-text">{{$branch->network->name}}</span>
                                </li>--}}
                                <li data-icon="keyboard_arrow_right">
                                    Tipo: <span class="light-text">{{$branch->network->type}}</span>
                                </li>
                                <li data-icon="keyboard_arrow_right">
                                    Conexiones: <span class="light-text">{{ number_format($wlogs,0,'.',',') }}</span>
                                </li>
                                <li data-icon="keyboard_arrow_right">
                                    Dispositivos: <span
                                            class="light-text">{{ number_format($devices,0,'.',',') }}</span>
                                </li>
                                <li data-icon="keyboard_arrow_right">Usuarios
                                    Recolectados: <span class="light-text">{{ number_format($users,0,'.',',') }}</span>
                                </li>
                                <li data-icon="keyboard_arrow_right">
                                    Antenas: <span class="light-text">{{ count($branch->aps) }}</span>
                                </li>
                                {{--<li data-icon="keyboard_arrow_right">Campañas:
                                    <ul class="white-text">
                                        @for($i = 0; $i < 5 ; $i++)
                                            @if(isset($aps[$i]))
                                                <li data-icon="remove" style="margin-left: 25px;"><span
                                                            class="light-text">{{$aps[$i]->name}}</span></li>
                                            @endif
                                        @endfor
                                        @if(count($aps) > 4 )
                                            <li style="text-align: center;"><a
                                                        class="waves-effect waves-light btn modal-trigger"
                                                        href="#aps">Modal</a>
                                            </li>
                                            <!-- Modal Structure -->
                                            <div id="aps" class="modal modal-fixed-footer">
                                                <div class="modal-content black-text">
                                                    <i class="material-icons right-corner">close</i>
                                                    <h4>Lista de campañas</h4>
                                                    <table class="striped">
                                                        <tbody>
                                                        @foreach($aps as $ap)
                                                            <tr>
                                                                <td>{{$ap->name}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                        @endif
                                    </ul>
                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col s6 l6" style="padding:0 0 0 5px;">
                    <div class="card grey darken-3 white-text" style="min-height: 280px;max-height: 280px;">
                        <div class="card-content white-text">
                            <span class="card-title">Información</span>

                        </div>
                    </div>
                </div>
                <div class="col s12 l12" style="padding:0;">
                    <div class="card grey darken-3 black-text" style="min-height: 280px;max-height: 280px;">
                        <div class="card-content" style="max-height: 280px;">
                            <span class="card-title white-text">Analiticos</span>
                            <div style="max-height: 280px!important; margin-top: -50px;height: 260px">
                                <div id="analitics" style="overflow:hidden"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="card grey darken-3 white-text" style="min-height: 583px;">
                    <div class="card-content white-text">
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
                                                <label style="font-size: 9px;" for="terms-checkbox">Acepto los <a
                                                            class=""
                                                            href="javascript:void(0)">Términos
                                                        y
                                                        condiciones</a></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col l4 hide-on-med-and-down">
                <div class="card grey darken-3" style="min-height: 495px;margin-left:13px">
                    <div class="card-content black-text" style="padding: 0px 0;">
                        <div class="uk-grid uk-grid-divider uk-grid-medium">
                            {{-- Google Maps --}}
                            {{--<span class="card-title white-text" style="margin: 20px;">Ubicación</span>--}}
                            <div class="image-card">
                                <div id="GoogleMap"
                                     style="margin: 0px auto; width: 100%; max-width: 850px; height: 495px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l8 ">
                <div class="card grey darken-3 white-text">
                    <div class="card-content white-text">
                        <div class="uk-grid uk-grid-divider uk-grid-medium">
                            {{-- Google Maps --}}
                            <span class="card-title">World Cloud</span>
                            <a class="waves-effect waves-light btn modal-trigger right" href="#cloud">
                                <i class="material-icons">border_all</i></a>
                            <div class="word_cloud" style="width:550px; position: relative;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 hide-on-med-only hide-on-small-only hide-on-large-only" style="height: 570px;">
                <div class="card grey darken-3 white-text">
                    <div class="card-content white-text">
                        <span class="card-title">Like Frecuentes</span>
                        <div id="table-wrapper">
                            <div id="table-scroll">
                                <table class="table-striped" style="overflow: auto;">
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
                <a href="javascript:void(0)"
                   class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
            </div>
        </div>


        @endsection

        @section('scripts')
            {!! HTML::script('bower_components/c3js-chart/c3.min.js') !!}
            {!! HTML::script('bower_components/d3/d3.min.js') !!}
            {!! HTML::script('http://maps.google.com/maps/api/js') !!}
            {!! HTML::script('js/d3.layout.cloud.js') !!}

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

                var canvasWidth = 550;
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

                $(document).ready(function () {
                    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                    $('.modal-trigger').leanModal();

                    $('.right-corner').click(function () {
                        $('.modal').closeModal();
                    })

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
                                    height: 250
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

                });
            </script>
@stop