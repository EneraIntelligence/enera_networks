@extends('layouts.mainmat')

@section('title', 'Inicio')


@section('head_scripts')
    {!! HTML::style('assets/css/dashboard.css') !!}
@stop


@section('content')

    <div class="col s12 m12 my-card hide-on-med-and-up">

        <div class="carousel dashboard-carousel">

            <div class="card-panel carousel-item my-card grey darken-3 white-text">
                <div class="card-content">
                    @include('dashboard/partials/devices')
                </div>
            </div>

            <div class="card-panel carousel-item my-card">
                <div class="card-content">
                    @include('dashboard/partials/users')
                </div>
            </div>

            <div class="card-panel carousel-item my-card">
                <div class="card-content">
                    @include('dashboard/partials/access')
                </div>
            </div>

            <div class="card-panel carousel-item my-card">
                <div class="card-content">
                    @include('dashboard/partials/branches')
                </div>
            </div>

            <div class="card-panel carousel-item my-card">
                <div class="card-content">
                    @include('dashboard/partials/campaigns')
                </div>
            </div>

        </div><!-- carousel -->

    </div> <!-- mobile content -->

    <div class="container desktop-container hide-on-small-only">
        <div class="row">

            <div class="container col m6 l4">
                <div class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/devices')
                    </div>
                </div>
            </div>

            <div class="container col m6 l4">
                <div class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/users')
                    </div>
                </div>
            </div>

            <div class="container col m6 l4">
                <div class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/access')
                    </div>
                </div>
            </div>

        </div>


        <!--
        <div class="row">

            <div class="container col m6 l4">
                <div class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/branches')
                    </div>
                </div>
            </div>


            <div class="container col m6 l4">
                <div class="card-panel hoverable grey darken-3 white-text">
                    <div class="card-content">
                        @include('dashboard/partials/campaigns')
                    </div>
                </div>
            </div>

        </div>
        -->

    </div>


@stop


@section('scripts')

    {!! HTML::script('js/carousel-enera.js') !!}


    <script>

        $(document).ready(function () {
            $('.carousel').carouselEnera();
        });

        /*
         $(document).ready(function () {
         $('.carousel').carouselEnera({
         dist: -30,
         time_constant: 200,
         padding: -400
         });
         });*/

        //$('.height').css('height', screen.height - (screen.height * .30))

    </script>

@stop

