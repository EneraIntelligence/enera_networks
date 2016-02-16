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
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                            <span class="uk-text-muted uk-text-small">Dispositivos únicos</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>{!! $devices !!}</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_sale peity_data">5,3,9,6,5,9,7,3,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Usuarios únicos</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>{!! $joined !!}</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data">5,3,9,6,5,9,7,3,5,2</span></div>
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


            <div class="word_cloud uk-container-center" style="width:800px; position: relative; margin-top: 20px;">

                <a href="#likes-table" data-uk-modal>
                    <div class="md-btn" style="position: absolute; bottom: 0; right:0;">
                        <i class="material-icons">&#xE3EC;</i>
                    </div>
                </a>

            </div>

            <div id="likes-table" class="uk-modal">
                <div class="uk-modal-dialog">

                    <a class="uk-modal-close uk-close"></a>


                    <h4 class="heading_a uk-margin-bottom">Likes frecuentes</h4>
                    <div class="md-card uk-margin-medium-bottom">
                        <div class="md-card-content">
                            <div class="uk-overflow-container">
                                <table class="uk-table uk-table-hover">
                                    <thead>
                                    <tr>
                                        <th>Nombre de la página</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @for($i=0;$i<count($words);$i++)

                                        <tr>
                                            <td>{!! $words[$i]['name'] !!}</td>
                                            <td>{!! $wordCount[$i]['count'] !!}</td>
                                        </tr>

                                    @endfor


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end table -->


                </div>
            </div><!-- end modal -->

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

        $(".peity_orders").peity("line", {
            height: 28,
            width: 64,
            fill: "#98DF8A",
            stroke: "#2DA02D"
        });
        var pityInteractions = $(".peity_orders");
        setInterval(function () {
            var random = Math.round(Math.random() * 10);
            var values = pityInteractions.text().split(",");
            values.shift();
            values.push(random);

            pityInteractions
                    .text(values.join(","))
                    .change();
        }, 1000);


        $(".peity_visitors").peity("bar", {
            height: 28,
            width: 48,
            fill: ["#d84315"],
            padding: 0.2
        });
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


        $(".peity_sale").peity("line", {
            height: 28,
            width: 64,
            fill: "#d1e4f6",
            stroke: "#0288d1"
        });
        var peityConnected = $(".peity_sale");
        setInterval(function () {
            var random = Math.round(Math.random() * 10);
            var values = peityConnected.text().split(",");
            values.shift();
            values.push(random);

            peityConnected
                    .text(values.join(","))
                    .change();


        }, 1000);


    </script>


    {!! HTML::script('bower_components/d3/d3.min.js') !!}
    {!! HTML::script('js/d3.layout.cloud.js') !!}
    <script>
        //word cloud
        var fill = d3.scale.category20();

        var canvasWidth = 800;
        var canvasHeight = 400;

        //var wordValues = {".NET":5, "Silverlight":10, "jQuery":300, "CSS3":20, "HTML5":400, "JavaScript":200, "SQL":15,"C#":20}
        var wordValues = {
            @for($i=0;$i<count($words);$i++)
                "{!! $words[$i]['name'] !!}":{!! $wordCount[$i]['count'] !!},
            @endfor
        };

        var words = [
            @for($i=0;$i<count($words);$i++)
                "{!! $words[$i]['name'] !!}",
            @endfor
        ];

        var sumWords = 0;
        for (var k in wordValues){
            sumWords += wordValues[k];
        }

        d3.layout.cloud().size([canvasWidth, canvasHeight])
                .words(words.map(function(d) {
                    return {text: d, size: Math.max(60*(Math.log( wordValues[d] )/Math.log(sumWords)),20) };
                }))
                .rotate(function() { return 0; })
                .font("Impact")
                .fontSize(function(d) { return d.size; })
                .on("end", draw)
                .start();

        function draw(words) {
            d3.select(".word_cloud").append("svg")
                    .attr("width", canvasWidth)
                    .attr("height", canvasHeight)
                    .append("g")
                    .attr("transform", "translate("+canvasWidth/2+","+canvasHeight/2+")")
                    .selectAll("text")
                    .data(words)
                    .enter().append("text")
                    .style("font-size", function(d) { return d.size + "px"; })
                    .style("font-family", "Impact")
                    .style("fill", function(d, i) { return fill(i); })
                    .attr("text-anchor", "middle")
                    .attr("transform", function(d) {
                        return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
                    })
                    .text(function(d) { return d.text; });
        }
    </script>

@stop

