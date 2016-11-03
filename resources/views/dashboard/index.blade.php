@extends('layouts.mainmat')

@section('title', 'Inicio')


@section('head_scripts')
    {!! HTML::style('bower_components/c3js-chart/c3.min.css') !!}
    {!! HTML::style('assets/css/dashboard.css') !!}

@stop


@section('content')

    <!-- loader that hides content until ads loaded -->
    <div id="loader" class="loader-full">
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>


    <div class="col s12 m12 my-card hide-on-med-and-up">

        <div class="swipe-animation">

        </div>

        <div class="carousel carousel-mobile dashboard-carousel">

            <div id="mobile-card-1" class="card-panel carousel-item my-card white">
                <div class="card-content">
                    @include('dashboard/partials/devices')
                </div>
            </div>

            <div id="mobile-card-2" class="card-panel carousel-item my-card white">
                <div class="card-content">
                    @include('dashboard/partials/users')
                </div>
            </div>

            <div id="mobile-card-3" class="card-panel carousel-item my-card white">
                <div class="card-content">
                    @include('dashboard/partials/access')
                </div>
            </div>

            <div id="mobile-card-4" class="card-panel carousel-item my-card white">
                <div class="card-content">
                    @include('dashboard/partials/branches')
                </div>
            </div>

            <div id="mobile-card-5" class="card-panel carousel-item my-card white">
                <div class="card-content">
                    @include('dashboard/partials/campaigns', ['campaigns'=> $campaigns])
                </div>
            </div>

        </div><!-- end carousel -->

    </div> <!-- end mobile content -->

    <div class="container desktop-container hide-on-small-only">

        <div class="slider-container">


            <div class="container slider-item">
                <div id="card-2" class="card-panel hoverable white">
                    <div class="card-content">
                        @include('dashboard/partials/users')
                    </div>
                </div>
            </div>

            <div class="container slider-item">
                <div id="card-3" class="card-panel hoverable white">
                    <div class="card-content">
                        @include('dashboard/partials/access')
                    </div>
                </div>
            </div>

            <div class="container slider-item">
                <div id="card-4" class="card-panel hoverable white">
                    <div class="card-content">
                        @include('dashboard/partials/branches')
                    </div>
                </div>
            </div>

            <div class="container slider-item">
                <div id="card-5" class="card-panel hoverable white">
                    <div class="card-content">
                        @include('dashboard/partials/campaigns')
                    </div>
                </div>
            </div>


            <div class="container slider-item">
                <div id="card-1" class="card-panel hoverable white">
                    <div class="card-content">
                        @include('dashboard/partials/devices')
                    </div>
                </div>
            </div>

        </div>


    </div><!-- end medium and large content -->


@stop


@section('scripts')

    {!! HTML::script('bower_components/d3/d3.min.js') !!}
    {!! HTML::script('bower_components/c3js-chart/c3.min.js') !!}
    {!! HTML::script("bower_components/peity/jquery.peity.min.js") !!}

    {!! HTML::script('js/carousel-enera.js') !!}
    {!! HTML::script('js/card-slider-enera.js') !!}
    {!! HTML::script('js/swipe-animation.js') !!}
    {!! HTML::script('js/js-cookie.js') !!}



    <script>
        var swipeAnim = null;
        var cardCarousel = null;

        $(window).load(function () {
            var cards = [];
            cards.push($("#card-1"));
            cards.push($("#card-2"));
            cards.push($("#card-3"));
            cards.push($("#card-4"));
            cards.push($("#card-5"));

            var mCards = [];
            mCards.push($("#mobile-card-1"));
            mCards.push($("#mobile-card-2"));
            mCards.push($("#mobile-card-3"));
            mCards.push($("#mobile-card-4"));
            mCards.push($("#mobile-card-5"));

            setSameHeight(cards);
            setSameHeight(mCards);

            $(window).resize(function () {
                setSameHeight(cards);
                setSameHeight(mCards);
            });

            //make desktop slider
            $('.slider-container').cardSliderEnera();

            //mobile card slider
            cardCarousel = $('.carousel-mobile').carouselEnera();

            //finger swipe animation
            swipeAnim = $('.swipe-animation').swipeAnimation();

            if (Cookies.get('swipeAnimationDone') == "true") {
                //if the cookie has been set before stop the animation
                swipeAnim.stop();
            }
            else {
                //remove finger swipe animation on first drag
                cardCarousel.onCardDrag(function () {
                    //set cookie so the animation shows only the first time
                    Cookies.set('swipeAnimationDone', 'true', {expires: 20});
                    swipeAnim.stop();
                    cardCarousel.removeCardDragCallbacks();
                });
            }

            removeLoader();
        });

        function removeLoader()
        {
            TweenLite.to("#loader", .3, {
                "opacity": 0, delay:1, onComplete: function () {
                    $("#loader").css("display", "none");
                }
            });
        }

        function setSameHeight(cards) {
            var minHeight = 0;
            var card, i;
            for (i = 0; i < cards.length; i++) {
                card = cards[i];
                card.css("height", "auto");
                card.css("display", "block");

                if (card.height() > minHeight)
                    minHeight = card.height();
            }

            for (i = 0; i < cards.length; i++) {
                card = cards[i];

                card.height(minHeight);
            }
        }

    </script>


    <!-- user chart -->
    <script>
        var userChart;

        $(window).load(function () {

            var chartDesktop = $(".user-chart:eq(1)");
            chartDesktop.removeClass("user-chart");
            chartDesktop.addClass("desktop-chart");

            var mujeres = JSON.parse('{!!  json_encode($users_female) !!}');
            var hombres = JSON.parse('{!!  json_encode($users_male) !!}');

            var chartOptions = {
                size: {
                    height: 140,
//                    width: 80%
                },
                padding: {
                    bottom:40,
                    left: 15
                },
                data: {
                    columns: [
                        mujeres,
                        hombres
                    ],
                    type: 'bar',
                    groups: [
                        ['Hombres', 'Mujeres']
                    ],
                    colors: {
                        Mujeres: "#9C27B0",
                        Hombres: '#2196F3'
                    }
                },
                grid: {
                    y: {
                        lines: [{value: 0}]
                    }
                },
                axis: {
                    rotated: true,
                    x: {
                        show: false
                    },
                    y: {
                        show: false,
                        min: -300,
                        max: 300
                    }
                },
                legend: {
                    show: false
                },
                tooltip: {
                    format: {
                        title: function (x) {
                            if (x == 0) {
                                return "13-18 años";
                            }
                            else if (x == 1) {
                                return "19-24 años";
                            }

                            return "25-34 años";
                        },
                        value: function (value, ratio, id, index) {
                            return Math.abs(value);
                        }
                    }
                }

            };


            chartOptions.bindto = ".user-chart";
//            chartOptions.size.width = 225;
//            chartOptions.padding.left = 38;
            var userChart = c3.generate(chartOptions);

            chartOptions.bindto = ".desktop-chart";
//            chartOptions.size.width = 250;
//            chartOptions.padding.left = 40;
            var chart = c3.generate(chartOptions);


            //console.log( userChart );


        });


        $(".peity_accessed").peity("bar", {
            height: 15,
            width: 128,
            padding: 0.1,
            fill: ["#98DF8A"]
        });


    </script>


@stop

