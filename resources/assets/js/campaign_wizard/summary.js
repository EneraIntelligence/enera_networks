var wizard_summary =
{
    initialize: function (interaction_id) {
        //initialize rules for the form depending on the interaction
    },
    setSummaryData: function(data)
    {
        // $("#summary_container").html( JSON.stringify(data) );
        $("#summary_container").html(
            "<div>" +
                "<h4>Resumen</h4> " +
                "<div class='divider'></div>" +
                "<h5>Interacción</h5><span>Banner + Link</span>" +
                "<h5>Contenido</h5>" +
                "<span><strong>Enlace:</strong> http://ederdiaz.com</span><br>" +
                "<span>Imágen (xxx x xxx) <i class='material-icons'>link</i></span> <br>" +
                "<span>Imágen (xxx x xxx) <i class='material-icons'>link</i></span> <br>" +
                "<h5>Segmentacion</h5>" +
                "<span>Mujeres y hombre de 13 a 80 años</span><br>" +
                "<span>del 14 de Junio al 28 de Junio</span> <br>" +
                "<span>Nodos <i class='material-icons'>link</i></span><br><br><br>" +
            "</div>"
        );
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