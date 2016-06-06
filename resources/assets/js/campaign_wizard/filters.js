var wizard_filters =
{
    validForm: false,
    menor: 13,
    mayor: 100,
    firstTime: true,
    initialize: function (interaction_id) {
        //initialize rules for the form depending on the interaction
        if (this.firstTime) {
            this.firstTime = false;
            var slider = document.getElementById('slider');
            noUiSlider.create(slider, {
                start: [13, 100],
                connect: true,
                step: 1,
                margin: 1,
                range: {
                    'min': 0,
                    'max': 100
                },
                format: wNumb({
                    decimals: 0
                })
            });

            slider.noUiSlider.on('slide', function () {
                //console.log(slider.noUiSlider.get());
                if (slider.noUiSlider.get()[0] < 13)
                    slider.noUiSlider.set([13]);
                wizard_filters.menor = slider.noUiSlider.get()[0];
                wizard_filters.mayor = slider.noUiSlider.get()[1];
                $("#age_text").text("Personas de  " + slider.noUiSlider.get()[0] + " a " + slider.noUiSlider.get()[1] + " años.")
            });

            $('#all').change(function () {
                var checkboxes = $(this).closest('form').find(':checkbox');
                if ($(this).is(':checked')) {
                    checkboxes.prop('checked', true);
                } else {
                    checkboxes.prop('checked', false);
                }
            });

            $('#sel').change(function () {
                var checkboxes = $(this).closest('form').find(':checkbox');
                if ($(this).is(':checked')) {
                    checkboxes.prop('checked', false);
                } else {
                    checkboxes.prop('checked', true);
                }
            });

            $(':checkbox').change(function () {
                $("#sel").prop("checked", true);
                $("#all").prop("checked", false);
            });

            var d = new Date();

            month = d.getMonth();
            day = d.getDate() - 1;
            year = d.getYear();


            var $input_date = $('#start').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year
                container: "body",
                monthsFull: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
                monthsShort: ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
                weekdaysFull: ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'],
                weekdaysShort: ['dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb'],
                today: 'hoy',
                clear: 'borrar',
                close: 'cerrar',
                onSet: function (arg) {

                    $("#end").prop('disabled', false);
                    if ('select' in arg) { //prevent closing on selecting month/year
                        this.close();
                    }
                    endDay = parseInt(picker_ini.get('select', 'dd'));
                    endMonth = parseInt(picker_ini.get('select', 'mm'));
                    endYear = parseInt(picker_ini.get('select', 'yyyy'));

                    var ev = EventDispatcher.getInstance();
                    ev.trigger(WizardEvents.invalidForm);
                    wizard_filters.validForm = false;
                    picker_end.clear();
                    picker_end.set("min", [endYear, endMonth - 1, endDay + 1]);

                },
                disable: [
                    true,
                    {from: ['year', 'month', 'day'], to: [2300, 11, 31]}
                ]
            });

            var picker_ini = $input_date.pickadate('picker');


            var $input_end = $('#end').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year
                container: "body",
                monthsFull: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
                monthsShort: ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
                weekdaysFull: ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'],
                weekdaysShort: ['dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb'],
                today: 'hoy',
                clear: 'borrar',
                close: 'cerrar',
                onSet: function (arg) {
                    if ('select' in arg) { //prevent closing on selecting month/year
                        var ev = EventDispatcher.getInstance();
                        ev.trigger(WizardEvents.validForm);
                        wizard_filters.validForm = true;

                        this.close();
                    }
                },
                onOpen: function () {
                    this.render(true)

                }

            });

            var picker_end = $input_end.pickadate('picker');
        }

        // $("#data-filters").change(function(){
        //     var serialized = $(this).serializeArray(),
        //         jsonCam = {};
        //
        //     // build key-values
        //     $.each(serialized, function(){
        //         jsonCam [this.name] = this.value;
        //     });
        //
        //     // and the json string
        //     var jsonCam = JSON.stringify(jsonCam);
        //
        //     console.log(jsonCam);
        //     wizard_data.getData(jsonCam)
        //
        // });


    },
    getContainer: function () {
        //return the DOM element that contains the form
        return $("#filter_cont");

    },
    getData: function () {
        //return the json form data
        var serialized = $("#data-filters").serializeArray(),
            jsonCam = {'menor': wizard_filters.menor, 'mayor': wizard_filters.mayor};

        // build key-values
        $.each(serialized, function () {
            jsonCam [this.name] = this.value;
        });
        return jsonCam;


    },
    isValid: function () {
        //return true if form is valid and filled, false when theres an error
        return this.validForm;
    }

};
