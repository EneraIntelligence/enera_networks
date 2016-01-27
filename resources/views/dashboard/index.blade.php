@extends('layouts.main')

@section('title', 'Campañas')

@section('head_scripts')
@stop

@section('content')


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
@stop

@section('scripts')

    {!! HTML::script('bower_components/d3/d3.min.js') !!}
    {!! HTML::script('js/d3.layout.cloud.js') !!}

    <script>
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

