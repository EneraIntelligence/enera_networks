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
            border-radius: 0;
            padding: 10px 5px;
        }

        .table-striped > tbody > tr:nth-child(even) > td,
        .table-striped > tbody > tr:nth-child(even) > th {
            background-color: #ccc;
            border-radius: 0;
            padding: 10px 5px;
        }

        .table-striped > thead > tr > th {
            background-color: #ccc;
            border-radius: 0;
            padding: 10px 5px;
        }

        #info li {
            height: 31px;
            line-height: 30px;
            padding-left: 20px;
            font-weight: 300;
        }

        #info li:nth-child(2n+1) {
            background-color: #757575
        }

        .info-icon{
            position: relative;
            top:  5px;
            font-size: 20px;
        }
    </style>
@stop

@section('content')

    <div class="col s12 m12 l12  container main-branch-container">
        <div class="row">


            <div class="col s12">
                <h2 class="left-align" style="color: #424242 !important">{{$branch->name}}</h2>
            </div>

            <div class="col s12 l8" style="overflow: hidden;">

                <div class="col s12 m6 l6 infoCard left">

                    <div class="card grey darken-3 white-text" style="min-height: 280px;max-height: 280px;">
                        <div class="card-content white-text">
                            <span class="card-title">Información</span>
                            <ul id="info" class="white-text"
                                style="overflow:hidden; max-height:185px; margin: 0px -20px; ">
                                <li>
                                    Tipo: <span class="light-text">{{$branch->network->type}}</span>
                                </li>
                                <li>
                                    Conexiones: <span class="light-text">{{ isset($summary_branch) ? number_format($summary_branch->accumulated['connections'],0,'.',',') : 0 }}</span>
                                </li>
                                <li>
                                    Dispositivos: <span
                                            class="light-text">{{ isset($devices) ? number_format($devices,0,'.',',') : 0 }}</span>
                                </li>
                                <li>Usuarios
                                    Recolectados: <span class="light-text">{{ isset($users) ? number_format($users,0,'.',',') : 0 }}</span>
                                </li>
                                <li>
                                    Antenas: <span class="light-text">{{ count($branch->aps) }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l6 infoCard right">
                    <div class="card grey darken-3 white-text" style="min-height: 280px;max-height: 280px;">
                        <div class="card-content white-text">
                            <span class="card-title">Información</span>
                            <ul id="info" class="white-text"
                                style="overflow:hidden; max-height:185px; margin: 0px -20px; ">
                                <li>
                                    Visitantes Totales: <span class="light-text">---</span>
                                </li>
                                <li>
                                    Tasa de lealtad: <span class="light-text">--%</span>
                                </li>
                                <li>
                                    Día más concurrido: <span
                                            class="light-text">---</span>
                                </li>
                                <li>Genero Dominante: <span class="light-text">{{$genero}}</span>
                                </li>
                                <li>
                                    Edad promedio: <span class="light-text">{{ number_format($edad_promedio,0,'.',',') }} años</span>
                                </li>
                                <li>
                                    Tiempo de estancia: <span
                                            class="light-text">--:--:--</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col s12 l12" style="padding:0;">
                    <div class="card grey darken-3 black-text" style="min-height: 280px;max-height: 280px;">
                        <div class="card-content" style="max-height: 280px;">
                            <span class="card-title white-text">Analíticos</span>
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
                            <div class="preview">
                                <img src="{{asset('images/iphone_placeholder.png')}}" alt="">
                            </div>
                            <div class="preview-content grey lighten-3" id="mydiv">
                                <div class="card">
                                    <div class="card-image" id="container">
                                        <div class="welcome card small z-depth-2">
                                            <img class="responsive-img" style="margin-bottom: -6px;"
                                                 src="https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/{!! $branch->portal['image'] !!}"/>
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
                <div class="card grey darken-3" style="min-height: 487px;">
                    <div class="card-content black-text" style="padding: 0 0;">
                        <div class="uk-grid uk-grid-divider uk-grid-medium">
                            {{-- Google Maps --}}
                            {{--<span class="card-title white-text" style="margin: 20px;">Ubicación</span>--}}
                            <div class="image-card">
                                <div id="GoogleMap"
                                     style="margin: 0px auto; width: 100%; max-width: 850px; height: 487px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l8 hide-on-small-only">
                <div class="card grey darken-3 white-text">
                    <div class="card-content white-text">
                        <div class="uk-grid uk-grid-divider uk-grid-medium">
                            {{-- Google Maps --}}
                            <span class="card-title">World Cloud</span>
                            <a class="waves-effect waves-light btn modal-trigger right" href="#cloud">
                                <i class="material-icons">border_all</i></a>
                            <div class="word_cloud" style="width:100%; position: relative;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 hide-on-med-and-up" style="height: 570px;">
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

                                    @foreach($wordcloud as $id=>$word)


                                        <tr>
                                            <td><a target="_blank" href="http://facebook.com/{!! $id !!}">{!! $word['name'] !!}</a></td>
                                            <td>{!! $word['count'] !!}</td>
                                        </tr>

                                    @endforeach


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

                    @foreach($wordcloud as $id=>$word)

                        <tr>
                            <td><a target="_blank" href="http://facebook.com/{!! $id !!}">{!! $word['name'] !!}</a></td>
                            <td>{!! $word['count'] !!}</td>
                        </tr>

                    @endforeach


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

                    @foreach($wordcloud as $word)
                            "{!! $word['name'] !!}":{!! $word['count'] !!},
                    @endforeach

                };

                var words = [
                    @foreach($wordcloud as $word)
                            "{!! $word['name'] !!}",
                    @endforeach
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
                        .font("Roboto")
                        .fontSize(function (d) {
                            return d.size;
                        })
                        .on("end", draw)
                        .start();


                $(window).resize(function () {

                    resizeWordCloud();

                });


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
                            .style("font-family", "Roboto")
                            .style("font-weight", "400")
                            .style("fill", function (d, i) {
                                return fill(i);
                            })
                            .attr("font-weight", "400")
                            .attr("text-anchor", "middle")
                            .attr("transform", function (d) {
                                return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
                            })
                            .text(function (d) {
                                return d.text;
                            });
                }

                function resizeWordCloud() {

                    var cont = $(".word_cloud");
                    var cloud = cont.find("svg");

                    var w = cont.innerWidth();
                    var h = cont.innerHeight();

                    console.log(w);

                    var targetScaleX = w / 550;
                    var targetScaleY = h / 400;

                    var targetScale = Math.min(targetScaleX, targetScaleY);

                    TweenLite.set(cloud, {scaleX: targetScale, scaleY: targetScale});
                    cloud.css("margin", "0 auto");
                    cloud.css("display", "block");

                }

                $(document).ready(function () {

                    resizeWordCloud();
                    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                    $('.modal-trigger').leanModal();

                    $('.right-corner').click(function () {
                        $('.modal').closeModal();
                    })

                    var datos = [
                        ['x'],
                        ['Portal'],
                        ['Portal cargado'],
                        ['Aceptó terminos'],
                        ['Interacción'],
                        ['Interacción cargada'],
                        ['Completo'],
                        ['Conectado']
                    ];

                    @foreach($interactions_by_day as $day)
                        datos[0].push('{!! date('Y-m-d', $day['report_date']->sec-(24*60*60) )  !!}');
                        datos[1].push({!! $day['welcome'] !!});
                        datos[2].push({!! $day['welcome_loaded'] !!});
                        datos[3].push({!! $day['joined'] !!});
                        datos[4].push({!! $day['requested'] !!});
                        datos[5].push({!! $day['loaded'] !!});
                        datos[6].push({!! $day['completed'] !!});
                        datos[7].push({!! $day['accessed'] !!});
                        console.log("{!! date('Y-m-d', $day['report_date']->sec-(24*60*60) ) !!}");
                    @endforeach

                    var chart = c3.generate({
                                bindto: '#analitics',
                                data: {
                                    x: 'x',
                                    columns: datos,
                                    type: 'bar',
                                    groups: [
                                        [
                                            'Portal',
                                            'Portal cargado',
                                            'Aceptó terminos',
                                            'Interacción',
                                            'Interacción cargada',
                                            'Completo',
                                            'Conectado'
                                        ]
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
                                            format: '%m-%d (%a)'
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