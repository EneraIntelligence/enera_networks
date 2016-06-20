@extends('layouts.mainmat')

@section('title', 'Inicio')


@section('head_scripts')
    {!! HTML::style('bower_components/c3js-chart/c3.min.css') !!}
    {!! HTML::style('assets/css/dashboard.css') !!}

@stop


@section('content')
    <div class="col s12 m12 my-card hide-on-med-and-up">

        <div class="swipe-animation">

        </div>

        <div class="carousel carousel-mobile dashboard-carousel">

            <div id="mobile-card-1" class="card-panel carousel-item my-card grey darken-3 white-text">
                <div class="card-content">
                    @include('dashboard/partials/devices')
                </div>
            </div>

            <div id="mobile-card-2" class="card-panel carousel-item my-card grey darken-3 white-text">
                <div class="card-content">
                    @include('dashboard/partials/users')
                </div>
            </div>

            <div id="mobile-card-3" class="card-panel carousel-item my-card grey darken-3 white-text">
                <div class="card-content">
                    @include('dashboard/partials/access')
                </div>
            </div>

            <div id="mobile-card-4" class="card-panel carousel-item my-card grey darken-3 white-text">
                <div class="card-content">
                    @include('dashboard/partials/branches')
                </div>
            </div>

            <div id="mobile-card-5" class="card-panel carousel-item my-card grey darken-3 white-text">
                <div class="card-content">
                    @include('dashboard/partials/campaigns', ['campaigns'=> $campaigns])
                </div>
            </div>

        </div><!-- end carousel -->

    </div> <!-- end mobile content -->

    <div class="container desktop-container hide-on-small-only">

        <div class="slider-container">


            <div class="container slider-item">
                <div id="card-2" class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/users')
                    </div>
                </div>
            </div>

            <div class="container slider-item">
                <div id="card-3" class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/access')
                    </div>
                </div>
            </div>

            <div class="container slider-item">
                <div id="card-4" class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/branches')
                    </div>
                </div>
            </div>

            <div class="container slider-item">
                <div id="card-5" class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/campaigns')
                    </div>
                </div>
            </div>


            <div class="container slider-item">
                <div id="card-1" class="card-panel hoverable grey darken-3 white-text">
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


        });

        function setSameHeight(cards) {
            var minHeight = 0;
            var card, i;
            for (i = 0; i < cards.length; i++) {
                card = cards[i];
                card.css("height", "auto");

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

        $(document).ready(function () {

            var chartDesktop = $(".user-chart:eq(1)");
            chartDesktop.removeClass("user-chart");
            chartDesktop.addClass("desktop-chart");


            var chartOptions = {
                size: {
                    height: 70,
//                    width: 250
                },
                padding: {
//                    left:40
                },
                data: {
                    columns: [
                        ['Hombres', 30, 200, 300],
                        ['Mujeres', -130, -100, -100]
                    ],
                    type: 'bar',
                    groups: [
                        ['Hombres', 'Mujeres']
                    ],
                    colors: {
                        Hombres: "#9C27B0",
                        Mujeres: '#2196F3'
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


    </script>


@stop

