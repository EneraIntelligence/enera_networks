@extends('layouts.mainmat')

@section('title', 'Inicio')


@section('head_scripts')
    {!! HTML::style('assets/css/dashboard.css') !!}
@stop


@section('content')

    <div class="col s12 m12 my-card hide-on-med-and-up">

        <div class="carousel dashboard-carousel">

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
                    @include('dashboard/partials/campaigns')
                </div>
            </div>

        </div><!-- end carousel -->

    </div> <!-- end mobile content -->

    <div class="container desktop-container hide-on-small-only">
        <div class="row">

            <div class="container col m6 l4">
                <div id="card-1" class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/devices')
                    </div>
                </div>
            </div>

            <div class="container col m6 l4">
                <div id="card-2" class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/users')
                    </div>
                </div>
            </div>

            <div class="container col m6 l4">
                <div id="card-3" class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/access')
                    </div>
                </div>
            </div>


            <div class="container col m6 l4 offset-l2">
                <div id="card-4" class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/branches')
                    </div>
                </div>
            </div>


            <div class="container col m6 l4">
                <div id="card-5" class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/campaigns')
                    </div>
                </div>
            </div>

        </div>


    </div><!-- end medium and large content -->


@stop


@section('scripts')

    {!! HTML::script('js/carousel-enera.js') !!}


    <script>

        $(document).ready(function () {
            $('.carousel').carouselEnera();
        });

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

            $( window ).resize(function()
            {
                setSameHeight(cards);
                setSameHeight(mCards);
            });



        });

        function setSameHeight(cards)
        {
            var minHeight = 0;
            var card,i;
            for (i = 0; i < cards.length; i++) {
                card = cards[i];
                card.css("height","auto");

                if (card.height() > minHeight)
                    minHeight = card.height();
            }

            for (i = 0; i < cards.length; i++) {
                card = cards[i];

                card.height(minHeight);
                console.log(minHeight)
            }
        }

    </script>

@stop

