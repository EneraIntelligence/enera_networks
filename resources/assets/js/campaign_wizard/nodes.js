var wizard_nodes =
{
    initialize: function (interaction_id) {
        //initialize rules for the form depending on the interaction

        $('#all').change(function () {
            var checkboxes = $(this).closest('form').find(':checkbox');
            if ($(this).is(':checked')) {
                checkboxes.prop('checked', true);
            }
        });

        $('#all').click(function(event) {  //on click
            if(this.checked) { // check select status
                $('.checkbox').each(function() { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"
                });
            }
        });

        $('#sel').click(function(event) {  //on click
            if(this.checked) { // check select status
                $('.checkbox').each(function() { //loop through each checkbox
                    this.checked = false;  //select all checkboxes with class "checkbox1"
                });
            }
        });

        $(':checkbox').change(function () {
            $("#sel").prop("checked", true);
            $("#all").prop("checked", false);
        });

        $(".checkbox").change(function(){
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $("#sel").prop("checked", false);
                $("#all").prop("checked", true);
            }
        });
    },
    getContainer:function()
    {
        //return the DOM element that contains the form
        return $(".nodos");

    },
    getData:function()
    {
        //return the json form data

    },
    isValid: function () {
        //return true if form is valid and filled, false when theres an error

    }

};