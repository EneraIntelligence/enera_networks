@extends('layouts.mainmat')

@section('title', 'Nueva campaña')


@section('head_scripts')

    {!! HTML::style('assets/css/campaign_wizard.css') !!}

@stop


@section('content')

    <div class="main-container">

        <div class="row">

            <!-- wizard container -->
            <div class="container col s12 m8">
                <div class="card-panel wizard-card">
                    wizard
                </div>
            </div>

            <!-- preview container -->
            <div class="container col m4 hide-on-small-only">
                <div class="card-panel">
                    preview
                </div>
            </div>

        </div>

    </div>

    <div class="wizard-nav">
        <a id="prev-btn" class="waves-effect waves-light btn nav-btn">
            <i class="material-icons">navigate_before</i></a><a id="next-btn" class="waves-effect waves-light btn nav-btn">
            <i class="material-icons">navigate_next</i>
        </a>
    </div>


@stop


@section('scripts')


    <script>
        $(document).ready(function () {
            TweenLite.set("#prev-btn", {css: {width: "0%"}});
            TweenLite.set("#next-btn", {css: {width: "100%"}});

            setTimeout(showPrevButton,2000);
            setTimeout(hidePrevButton,5000);
            setTimeout(function()
            {
                setEnabled("#next-btn",false);
            },7000);
        });

        function showPrevButton() {
            TweenLite.to("#prev-btn", .3, {css: {width: "30%"}});
            TweenLite.to("#next-btn", .3, {css: {width: "70%"}});
        }

        function hidePrevButton() {
            TweenLite.to("#prev-btn", .3, {css: {width: "0"}});
            TweenLite.to("#next-btn", .3, {css: {width: "100%"}});
        }

        function setEnabled(btnId, enable) {
            if (enable)
                $(btnId).removeClass("disabled");
            else
                $(btnId).addClass("disabled");

        }
    </script>

@stop

