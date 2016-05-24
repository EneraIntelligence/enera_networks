var wizard_interactions =
{
    initialize: function (interaction_id) {
        //initialize rules for the form depending on the interaction
        var ev = EventDispatcher.getInstance();
        ev.trigger(WizardEvents.interactionSelected, 'like');
        ev.trigger(WizardEvents.validForm);
    },
    getContainer: function () {
        //return the DOM element that contains the form
        return $("#interactions_cont");

    },
    getData: function () {
        //return the json form data

    },
    isValid: function () {
        //return true if form is valid and filled, false when theres an error
        return true;
    }

};