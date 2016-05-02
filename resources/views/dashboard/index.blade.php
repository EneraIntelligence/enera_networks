@extends('layouts.mainmat')

@section('title', 'Campañas')


@section('head_scripts')
    {!! HTML::style('assets/css/dashboard.css') !!}
@stop


@section('content')

    <div class="col s12 m12 my-card">
        <div class="carousel height">
            <div class="card-panel carousel-item my-card">
                <div class="row row-card">
                    <div class="col s12 m12">
                        <div class="card-content">
                            <span>Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information.
                                I am convenient because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-panel carousel-item my-card">
                <div class="row row-card">
                    <div class="col s12 m12">
                        <div class="card-content">
                            <span>Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information.
                                I am convenient because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-panel carousel-item my-card">
                <div class="row row-card">
                    <div class="col s12 m12">
                        <div class="card-content">
                            <span>Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information.
                                I am convenient because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-panel carousel-item my-card">
                <div class="row row-card">
                    <div class="col s12 m12">
                        <div class="card-content">
                            <span>Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information.
                                I am convenient because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-panel carousel-item my-card">
                <div class="row row-card">
                    <div class="col s12 m12">
                        <div class="card-content">
                            <span>Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information.
                                I am convenient because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop


@section('scripts')

    <script>
        $(document).ready(function () {
            $('.carousel').carousel({
                dist: -150,
                time_constant: 200,
            });
        });

        $('.height').css('height', screen.height - (screen.height * .30))

    </script>

@stop

