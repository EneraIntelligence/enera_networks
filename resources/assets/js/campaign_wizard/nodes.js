var wizard_nodes =
{
    selectedNodes:0,
    initialize: function (interaction_id) {
        //initialize rules for the form depending on the interaction

        $('#all').change(function () {
            var checkboxes = $(this).closest('form').find(':checkbox');
            if ($(this).is(':checked')) {
                checkboxes.prop('checked', true);
                updateSelectedNodes();
            }
        });

        $('#all').click(function () {  //on click
            if (this.checked) { // check select status
                $('.checkbox').each(function () { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"
                    updateSelectedNodes();
                });
            }
        });

        $('#sel').click(function () {  //on click
            if (this.checked) { // check select status
                $('.checkbox').each(function () { //loop through each checkbox
                    this.checked = false;  //select all checkboxes with class "checkbox1"
                    updateSelectedNodes();
                });
            }
        });

        $(':checkbox').change(function () {
            $("#sel").prop("checked", true);
            $("#all").prop("checked", false);
            updateSelectedNodes();
        });

        $(".checkbox").change(function () {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $("#sel").prop("checked", false);
                $("#all").prop("checked", true);
                updateSelectedNodes();
            }
        });

        setTimeout(function () {
            $("#link-input").focus();

            updateSelectedNodes();
        }, 400);

        function updateSelectedNodes()
        {
            wizard_nodes.selectedNodes=$('.checkbox:checked').length;

            var ev = EventDispatcher.getInstance();


            if(wizard_nodes.selectedNodes>0)
            {
                ev.trigger(WizardEvents.validForm);
            }
            else
            {
                ev.trigger(WizardEvents.invalidForm);
            }
        }


    },
    getContainer: function () {
        //return the DOM element that contains the form
        return $(".nodos");

    },
    getData: function () {
        //return the json form data

        tagOutput = $(':checkbox[name=node]').map(function () {
            if(this.checked) {
                var op = {
                    "id":this.id,
                    "name":$(this).val()
                };
                var objCamp = [];
                objCamp.push(op);
            }
            return objCamp;
        }).get();
        
        //tagOutput = JSON.stringify(tagOutput);

        return {'nodos': tagOutput};

    },
    isValid: function () {
        //return true if form is valid and filled, false when theres an error
        return wizard_nodes.selectedNodes>0
    }

};