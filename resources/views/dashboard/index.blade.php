@extends('layouts.main')

@section('title', 'Campañas')

@section('head_scripts')
@stop

@section('content')


@stop

@section('scripts')

    {!! HTML::script('bower_components/d3/d3.min.js') !!}
    {!! HTML::script('js/d3.layout.cloud.js') !!}

    <script>
        var fill = d3.scale.category20();

        var canvasWidth = 600;
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
                    return {text: d, size: 50*(Math.log( wordValues[d] )/Math.log(sumWords)) };
                }))
                .rotate(function() { return Math.random()*180-90; })
                .font("Impact")
                .fontSize(function(d) { return d.size; })
                .on("end", draw)
                .start();

        function draw(words) {
            d3.select("body").append("svg")
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

