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
                <div class="card wizard-card">

                    <!-- wizard content -->
                    <div class="card-content">
                        <div id="step_1" class="step">@include('campaign/wizard/interactions')</div>
                        <div id="step_2" class="step">@include('campaign/wizard/data')</div>
                        <div id="step_3" class="step">@include('campaign/wizard/filters')</div>
                        <div id="step_4" class="step">@include('campaign/wizard/dates')</div>
                        <div id="step_5" class="step">@include('campaign/wizard/summary')</div>
                    </div>

                    <!-- next / prev buttons -->
                    <div class="wizard-nav card-image">
                        <a id="prev-btn" class="waves-effect waves-light btn nav-btn">
                            <i class="material-icons">navigate_before</i></a><a id="next-btn" class="waves-effect waves-light btn nav-btn">
                            <i class="material-icons">navigate_next</i>
                        </a>
                    </div>

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


@stop


@section('scripts')

    {!! HTML::script('js/events/EventDispatcher.js') !!}
    {!! HTML::script('js/events/WizardEvents.js') !!}
    {!! HTML::script('assets/js/campaign_wizard/wizard.js') !!}


    <script>
        var steps = [wizard_interactions, wizard_data, wizard_filters, wizard_dates, wizard_summary];
        var currentStep = 0;
        var interactionId = "";

        //setup events
        var ev = EventDispatcher.getInstance();
        ev.on(WizardEvents.interactionSelected, changeInteraction);
        ev.on(WizardEvents.validForm, enableNext);
        ev.on(WizardEvents.invalidForm, disableNext);


        disableNext();
        $("#next-btn").click(goNext);
        $("#prev-btn").click(goPrev);

        setup();
        initializeCurrentStep();

        $(document).ready(function () {
            TweenLite.set("#prev-btn", {css: {width: "0%"}});
            TweenLite.set("#next-btn", {css: {width: "100%"}});
        });

        function setup()
        {
            for(var i=0;i<steps.length;i++)
            {
                var step = steps[i];
                var container = step.getContainer();
                TweenLite.set( container,{ css:{ display:"none" } });
            }

        }

        function initializeCurrentStep()
        {
            var step = steps[currentStep];
            step.initialize(interactionId);
            var container = step.getContainer();
            TweenLite.set( container,{ css:{ display:"block" } });
            TweenLite.fromTo( container, .25, { alpha:0 }, {alpha:1});
        }

        function changeInteraction(event,id)
        {
            interactionId = id;
        }

        function enableNext(event)
        {
            setEnabled("#next-btn",true);
        }
        function disableNext(event)
        {
            setEnabled("#next-btn",false);
        }

        function removeCurrentStep()
        {
            var step = steps[currentStep];
            var container = step.getContainer();
            TweenLite.set( container,{ css:{ display:"none" } });
        }

        function goNext()
        {
            if($(this).hasClass("disabled"))
                    return;

            if(currentStep<steps.length-1)
            {
                var step = steps[currentStep];

                if(step.isValid())
                {
                    removeCurrentStep();

                    currentStep++;

                    if (currentStep > 0)
                        showPrevButton();

                    initializeCurrentStep();
                    disableNext();
                }

            }
            else
            {
                //TODO submit form

            }
        }

        function goPrev()
        {
            if(currentStep>0)
            {
                removeCurrentStep();

                currentStep--;

                if(currentStep==0)
                    hidePrevButton();

                initializeCurrentStep();
            }
        }


        function showPrevButton() {
            TweenLite.to("#prev-btn", .3001, {css: {width: "30%"}});
            TweenLite.to("#next-btn", .3, {css: {width: "70%"}});
        }

        function hidePrevButton() {
            TweenLite.to("#prev-btn", .29, {css: {width: "0%"}});
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

