var wizard_summary =
{
    initialize: function (interaction_id) {
        //initialize rules for the form depending on the interaction
    },
    setSummaryData: function(data)
    {
        $("#summary_container").html( JSON.stringify(data) );
    },
    getContainer:function()
    {
        //return the DOM element that contains the form
        return $("#summary_container");

    },
    getData:function()
    {
        //return the json form data
        return '';

    },
    isValid: function () {
        //return true if form is valid and filled, false when theres an error

    }

};