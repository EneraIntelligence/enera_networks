var wizard_interactions =
{
    firstTime: true,
    validForm: false,
    initialize: function (interaction_id) {
        //initialize rules for the form depending on the interaction
        TweenLite.to(window, .5, {scrollTo:{y:70}, ease:Power2.easeOut});

        var ev = EventDispatcher.getInstance();

        //only the first time
        if (this.firstTime) {
            this.firstTime = false;
            ev.on(WizardEvents.interactionSelected,this.deselectInteractions);

            var container = this.getContainer();

            //setup clicks on interactions
            container.find(".collection-item").each(function (index) {

                $(this).click(function()
                {
                    var ev = EventDispatcher.getInstance();
                    ev.trigger(WizardEvents.interactionSelected, $(this).data("interaction") );

                    $(this).addClass("indigo active");

                    $(this).find("img").removeClass("indigo");
                    $(this).find("img").addClass("white");

                    wizard_interactions.validForm = true;
                    ev.trigger(WizardEvents.validForm);
                    ev.trigger(WizardEvents.goNext);

                });
            });


        }
        else
        {
            //clear the form
            this.deselectInteractions();
        }

    },
    getContainer: function () {
        //return the DOM element that contains the form
        return $("#interactions_container");

    },
    getData: function () {
        //return the json form data

    },
    isValid: function () {
        //return true if form is valid and filled, false when theres an error
        return wizard_interactions.validForm;
    },

    //private functions
    deselectInteractions:function()
    {
        //remove the visual effects on selected interaction
        var container = wizard_interactions.getContainer();
        container.find("li").each(function (index) {
            $(this).removeClass("indigo active");

            $(this).find("img").removeClass("white");
            $(this).find("img").addClass("indigo");

        });
    }
};