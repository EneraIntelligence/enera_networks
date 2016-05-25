var wizard_data =
{
    initialize: function (interaction_id) {
        //initialize rules for the form depending on the interaction
        // console.log("wizard data blade initialized with interaction: "+interaction_id);
        $( "#link-input" ).focus();
        TweenLite.to(window, .5, {scrollTo:{y:70}, ease:Power2.easeOut});

    },
    getContainer:function()
    {
        //return the DOM element that contains the form
        return $("#data_cont");
    },
    getData:function()
    {
        //return the json form data
        
    },
    isValid: function () {
        //return true if form is valid and filled, false when there's an error
        
    }

};
