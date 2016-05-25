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
                    <div id="wizard-content" class="card-content overflow-hidden">
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
        ev.on(WizardEvents.goNext, goNext);


        disableNext();
        $("#next-btn").click(goNext);
        $("#prev-btn").click(goPrev);

        setup();
        initializeCurrentStep();


        $(document).ready(function () {
            TweenLite.set("#prev-btn", {css: {width: "30%", display:"none"}});
            TweenLite.set("#next-btn", {css: {width: "70%", display:"none"}});
        });

        $(window).load(function()
        {
            //setup initial height
            var currentStepContainer = steps[currentStep].getContainer();
            changeContainerSize(0, currentStepContainer.outerHeight() );


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

        function initializeCurrentStep(direction)
        {
            direction = direction || 0;

            var step = steps[currentStep];
            step.initialize(interactionId);
            var container = step.getContainer();
            TweenLite.set( container,{ css:{
                display:"inline-block",
                width:"100%"
//                position:"absolute"
            } });
            TweenLite.fromTo( container, .35,
                    {
                        css:{marginLeft: (container.outerWidth()+100) *direction},
                        alpha:0
                    },
                    {
                        css:{marginLeft:0},
                        alpha:1,
                        onComplete:function()
                        {
                            TweenLite.set( container,{ css:{ display:"inline-block", position:"relative" } });

                        }
                    });
        }

        function removeCurrentStep(direction)
        {
            var step = steps[currentStep];
            var container = step.getContainer();

//            container.css("position","absolute");
            container.css("display","inline-block");
            container.css("width","100%");

            TweenLite.to( container,.35,{
                css:{marginLeft:-container.outerWidth()*direction},
                alpha:0,
                onComplete: function(){
//                    container.css("position","relative");
                    container.css("display","none");
                }
            });
            //TweenLite.set( container,{ css:{ display:"none" } });
        }

        function changeInteraction(event,id)
        {
            //console.log("interaction changed to "+id);
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



        function goNext()
        {
            if($(this).hasClass("disabled"))
                    return;

            if(currentStep<steps.length-1)
            {
                var step = steps[currentStep];

                if(step.isValid())
                {
                    var prevHeight = step.getContainer().outerHeight();
                    removeCurrentStep(1);

                    currentStep++;

                    if (currentStep > 0)
                        showPrevButton();

                    step = steps[currentStep];
                    var currentHeight = step.getContainer().outerHeight();

                    changeContainerSize(prevHeight, currentHeight);

                    initializeCurrentStep(1);
                    disableNext();
                }

            }
            else
            {
                //TODO submit form

            }
        }

        function changeContainerSize(currentHeight, nextHeight)
        {
            if(currentHeight<nextHeight)
            {
                TweenLite.to("#wizard-content", .2, { css:{height:nextHeight} });
            }
            else
            {
                TweenLite.to("#wizard-content", .2, { delay:.35, css:{height:nextHeight} });

            }
        }

        function goPrev()
        {
            if(currentStep>0)
            {
                var step = steps[currentStep];
                var prevHeight = step.getContainer().outerHeight();

                removeCurrentStep(-1);

                currentStep--;

                if(currentStep==0)
                    hidePrevButton();

                step = steps[currentStep];
                var currentHeight = step.getContainer().outerHeight();

                changeContainerSize(prevHeight, currentHeight);

                initializeCurrentStep(-1);
            }
        }


        function showPrevButton() {
            TweenLite.set("#prev-btn", {css: {height: "auto", display:"inline-block"}});
            TweenLite.set("#next-btn", {css: {height: "auto", display:"inline-block"}});
        }

        function hidePrevButton() {
            TweenLite.set("#prev-btn", {css: {height: "0", display:"none"}});
            TweenLite.set("#next-btn", {css: {height: "0", display:"none"}});
        }

        function setEnabled(btnId, enable) {
            if (enable)
                $(btnId).removeClass("disabled");
            else
                $(btnId).addClass("disabled");
        }
    </script>

@stop

