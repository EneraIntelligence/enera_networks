@extends('layouts.mainmat')

@section('title', 'Nueva campaña')


@section('head_scripts')

    {!! HTML::style('assets/css/campaign_wizard.css') !!}
    {!! HTML::style('css/nouislider.css') !!}
    {!! HTML::style('css/cropper.min.css') !!}
    {!! HTML::style('assets/css/welcome.css') !!}
    {!! HTML::style('assets/css/campaign.css') !!}

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
                        <div id="step_4" class="step">@include('campaign/wizard/nodes', ['branches' => $branches])</div>
                        <div id="step_5" class="step">@include('campaign/wizard/summary')</div>
                    </div>

                    <!-- next / prev buttons -->
                    <div class="wizard-nav card-image">
                        <a id="prev-btn" class="waves-effect waves-light btn nav-btn">
                            <i class="material-icons">navigate_before</i></a><a id="next-btn"
                                                                                class="waves-effect waves-light btn nav-btn">
                            <i class="material-icons">navigate_next</i>
                        </a>
                    </div>

                </div>

            </div>

            <!-- preview container -->
            <div class="container col m4 hide-on-small-only">
                <div class="card-panel">
                    <span class="card-title">Preview</span>
                    <div style="position: relative; width: 250px; margin: 0 auto;">
                        <div class="preview" style="text-align: center;">
                            <img src="{{asset('images/android_placeholder.png')}}" alt="">
                        </div>
                        <div class="preview data-field" id="mydiv" style="overflow: scroll;">

                        </div>
                        <div class="preview data-field banner_link" id="mydiv" style="overflow: scroll; display:none">
                            @if(view()->exists('campaign.partials.preview_banner_link'))
                                @include('campaign.partials.preview_banner_link')
                            @endif
                        </div>
                        <div class="preview data-field like" id="mydiv" style="overflow: scroll; display:none">
                            @if(view()->exists('campaign.partials.preview_like'))
                                @include('campaign.partials.preview_like')
                            @endif
                        </div>
                        <div class="preview data-field mailing_list" id="mydiv" style="overflow: scroll; display:none">
                            @if(view()->exists('campaign.partials.preview_mailing_list'))
                                @include('campaign.partials.preview_mailing_list')
                            @endif
                        </div>
                        <div class="preview data-field captcha" id="mydiv" style="overflow: scroll; display:none">
                            @if(view()->exists('campaign.partials.preview_captcha'))
                                @include('campaign.partials.preview_captcha')
                            @endif
                        </div>
                        <div class="preview data-field survey" id="mydiv" style="overflow: scroll; display:none">
                            @if(view()->exists('campaign.partials.preview_captcha'))
                                @include('campaign.partials.preview_survey')
                            @endif
                        </div>
                        <div class="preview data-field video" id="mydiv" style="overflow: scroll; display:none">
                            @if(view()->exists('campaign.partials.preview_video'))
                                @include('campaign.partials.preview_video')
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    @stop


    @section('scripts')

    {!! HTML::script('js/greensock/plugins/ScrollToPlugin.min.js') !!}
    {!! HTML::script('js/events/EventDispatcher.js') !!}
    {!! HTML::script('js/events/WizardEvents.js') !!}
    {!! HTML::script('assets/js/campaign_wizard/wizard.js') !!}
    {!! HTML::script('js/nouislider.js') !!}
    {!! HTML::script('js/cropper.min.js') !!}
    {!! HTML::script('js/jquery-validation/dist/jquery.validate.min.js') !!}
    {!! HTML::script('js/jquery-validation/dist/localization/messages_es.min.js') !!}

            <!-- wysiwyg -->
    {!! HTML::script('js/tinymce/tinymce.min.js') !!}


    <script>
        var steps = [wizard_interactions, wizard_data, wizard_filters, wizard_nodes, wizard_summary];
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

            //initialize wysiwyg
            tinymce.init({
                selector: '#mailing_content',
                language: 'es_MX',
                plugins: 'code',
                toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code'
            });

            TweenLite.set("#prev-btn", {css: {width: "30%", display: "none"}});
            TweenLite.set("#next-btn", {css: {width: "70%", display: "none"}});

            //setup initial height
            var currentStepContainer = steps[currentStep].getContainer();
            changeContainerSize(0, currentStepContainer.outerHeight());
        });

        $(window).load(function () {
            //setup initial height
            var currentStepContainer = steps[currentStep].getContainer();
            changeContainerSize(0, currentStepContainer.outerHeight());
        });

        function setup() {
            for (var i = 0; i < steps.length; i++) {
                var step = steps[i];
                var container = step.getContainer();

                TweenLite.set(container, {css: {display: 'none'}});
            }

        }

        function initializeCurrentStep(direction) {
            direction = direction || 0;

            var step = steps[currentStep];
            step.initialize(interactionId);
            var container = step.getContainer();
            TweenLite.set(container, {css: {display: "block"}});

            TweenLite.set(container, {y: 0});

            if (direction == 1) {
                var targetY = $("#wizard-content").offset().top - container.offset().top + 20;
                TweenLite.set(container, {y: targetY});
            }


            TweenLite.fromTo(container, .35,
                    {
                        x: container.outerWidth() * direction,
                        alpha: 0
                    },
                    {
                        x: 0,
                        alpha: 1
                    });
        }

        function removeCurrentStep(direction) {
            var step = steps[currentStep];
            var container = step.getContainer();


            if (direction == -1) {
                setTimeout(function () {
//                    console.log(direction);
                    var targetY = $("#wizard-content").offset().top - container.offset().top + 20;
                    TweenLite.set(container, {y: targetY});
                }, 10);

            }
            else {
                TweenLite.set(container, {y: 0});
            }

            TweenLite.to(container, .30, {
                x: -(container.outerWidth() + 100) * direction,
                alpha: 1,
                onComplete: function () {
                    TweenLite.set(container, {y: 0, css: {display: "none"}});

                    var newStep = steps[currentStep];
                    var newContainer = newStep.getContainer();
                    TweenLite.set(newContainer, {y: 0});
                }
            });
        }

        function changeInteraction(event, id) {
            //console.log("interaction changed to "+id);
            interactionId = id;
        }

        function enableNext(event) {
            setEnabled("#next-btn", true);
        }
        function disableNext(event) {
            setEnabled("#next-btn", false);
        }


        function goNext() {
            if ($(this).hasClass("disabled"))
                return;

            if (currentStep < steps.length - 1) {
                var step = steps[currentStep];

                if (step.isValid()) {
                    var prevHeight = step.getContainer().outerHeight();
                    removeCurrentStep(1);

                    currentStep++;

                    if (currentStep > 0)
                        showPrevButton();

                    initializeCurrentStep(1);

                    step = steps[currentStep];
                    var currentHeight = step.getContainer().outerHeight();

                    changeContainerSize(prevHeight, currentHeight);
                    disableNext();

                    var topWizard = $("#wizard-content").offset().top;
                    TweenLite.to(window, .5, {scrollTo: {y: topWizard}, ease: Power2.easeOut});
                }

            }
            else {

                //TODO submit form
                var dataCamp = {};
                for (var i = 0; i < steps.length - 1; i++) {
                    $.extend(true, dataCamp, steps[i].getData());
                }
                console.log(dataCamp);
            }
        }

        function changeContainerSize(currentHeight, nextHeight) {
            //added some padding below
            nextHeight += 25;

            if (currentHeight < nextHeight) {
                TweenLite.to("#wizard-content", .2, {css: {height: nextHeight}});
            }
            else {
                TweenLite.to("#wizard-content", .2, {delay: .35, css: {height: nextHeight}});

            }
        }

        function goPrev() {
            if (currentStep > 0) {
                var step = steps[currentStep];
                var prevHeight = step.getContainer().outerHeight();

                removeCurrentStep(-1);

                currentStep--;

                if (currentStep == 0)
                    hidePrevButton();

                initializeCurrentStep(-1);

                step = steps[currentStep];
                var currentHeight = step.getContainer().outerHeight();

                changeContainerSize(prevHeight, currentHeight);

                var topWizard = $("#wizard-content").offset().top;
                TweenLite.to(window, .5, {scrollTo: {y: topWizard}, ease: Power2.easeOut});

            }
        }


        function showPrevButton() {
            TweenLite.set("#prev-btn", {css: {height: "auto", display: "inline-block"}});
            TweenLite.set("#next-btn", {css: {height: "auto", display: "inline-block"}});
        }

        function hidePrevButton() {
            TweenLite.set("#prev-btn", {css: {height: "0", display: "none"}});
            TweenLite.set("#next-btn", {css: {height: "0", display: "none"}});
        }

        function setEnabled(btnId, enable) {
            if (enable)
                $(btnId).removeClass("disabled");
            else
                $(btnId).addClass("disabled");
        }


    </script>

@stop

