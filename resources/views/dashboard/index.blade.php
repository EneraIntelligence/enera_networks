@extends('layouts.mainmat')

@section('title', 'Inicio')


@section('head_scripts')
    {!! HTML::style('assets/css/dashboard.css') !!}
@stop


@section('content')

    <div class="col s12 m12 my-card hide-on-large-only">

        <div class="carousel dashboard-carousel">

            <div class="card-panel carousel-item my-card grey darken-3 white-text">
                <div class="card-content">
                    @include('dashboard/partials/devices')
                </div>
            </div>

            <div class="card-panel carousel-item my-card">
                <div class="row row-card">
                    <div class="col s12 m12">
                        <div class="card-content">
                            @include('dashboard/partials/users')
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-panel carousel-item my-card">
                <div class="row row-card">
                    <div class="col s12 m12">
                        <div class="card-content">
                            @include('dashboard/partials/access')
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-panel carousel-item my-card">
                <div class="row row-card">
                    <div class="col s12 m12">
                        <div class="card-content">
                            @include('dashboard/partials/branches')
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-panel carousel-item my-card">
                <div class="row row-card">
                    <div class="col s12 m12">
                        <div class="card-content">
                            @include('dashboard/partials/campaigns')
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- carousel -->

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

