var wizard_summary =
{
    data:null,
    dictInteractions:{
        "banner_link":"Banner + Link",
        "like":"Like",
        "mailing_list":"Mailing list",
        "captcha":"Captcha",
        "survey":"Encuesta",
        "video":"Video"
    },
    initialize: function (interaction_id) {
        //initialize rules for the form depending on the interaction
        setTimeout(function () {
            //activate send btn
            var ev = EventDispatcher.getInstance();
            ev.trigger(WizardEvents.validForm);
        }, 400);

    },
    setSummaryData: function(data)
    {
        // $("#summary_container").html( JSON.stringify(data) );
        wizard_summary.data = data;
        var campaignData = wizard_summary.getCampaignDataHTML(data);
        var filtersData = wizard_summary.getFiltersDataHTML(data);

        $("#summary_container").html(
            "<div>" +
                "<h4>Resumen</h4> " +
                "<div class='divider'></div>" +
                "<h5>Interacción</h5><span>"+wizard_summary.dictInteractions[data.interaction]+"</span>" +
                "<div class='row'>" +
                    "<div class='col s12 m6'>" +
                        "<h5>Contenido</h5>" +
                        campaignData +
                        "<br>" +
                    "</div> " +
                    "<div class='col s12 m6'>" +

                        "<h5>Segmentacion</h5>" +
                        filtersData+
                    "</div>" +
                "</div>" +

            "</div>"
        );
    },
    getCampaignDataHTML:function(data)
    {
        /*
        "banner_link": {"link":true, "image_small":true, "image_large":true},
        "like": {"like":true, "image_small":true, "image_large":true},
        "mailing_list": {"mail_name":true, "mail_address":true, "mail_subject":true, "mailing_content":true},
        "captcha": {"captcha":true, "image_small":true, "image_large":true},
        "survey": {"image_survey":true},
        "video": {"video":true, "image_video":true}*/
        var content = "";
        if( data.link )
        {
            content+="<span><strong>Enlace:</strong> <a target='_blank' href='"+data.link+"'>"+data.link+"</a></span><br>";
        }

        if( data.like )
        {
            content+="<span><strong>Página de fb:</strong> <a target='_blank' href='"+data.like+"'>"+data.like+"</a></span><br>";
        }

        if( data.captcha )
        {
            content+="<span><strong>Captcha:</strong> "+data.captcha+"</span><br>";
        }

        if( data.mail_name )
        {
            content+="<span><strong>Remitente:</strong> "+data.mail_name+"</span><br>";
            content+="<span><strong>Email:</strong> "+data.mail_address+"</span><br>";
            content+="<span><strong>Asunto:</strong> "+data.mail_subject+"</span><br>";
            content+="<span> <a href='#!' onclick='wizard_summary.openMailModal()'> <strong>Correo </strong><i class='material-icons v-middle'>link</i> </a>  </span> <br>";
        }


        if( data.image_small )
        {
            content+="<span> <a href='#!' onclick='wizard_summary.openImgSmallModal()'> <strong>Banner </strong>(600x602) <i class='material-icons v-middle'>link</i> </a>  </span> <br>";
        }

        if( data.image_large )
        {
            content+="<span> <a href='#!' onclick='wizard_summary.openImgLargeModal()'>  <strong>Banner </strong>(684x864) <i class='material-icons v-middle'>link</i> </a> </span> <br>";
        }

        if( data.image_survey )
        {
            content+="<span> <a href='#!' onclick='wizard_summary.openImgSurveyModal()'>  <strong>Imagen de encuesta </strong><i class='material-icons v-middle'>link</i> </a> </span> <br>";
        }

        if( data.video )
        {
            content+="<span> <a href='#!' onclick='wizard_summary.openVideoModal()'>  <strong>Video </strong><i class='material-icons v-middle'>link</i> </a> </span> <br>";
        }
        if( data.image_video )
        {
            content+="<span> <a href='#!' onclick='wizard_summary.openImgVideoModal()'>  <strong>Imagen de video</strong> <i class='material-icons v-middle'>link</i> </a> </span> <br>";
        }


        if( data.question_1 )
        {
            content+="<span> <a href='#!' onclick='wizard_summary.openSurveyModal()'> <strong>Encuesta </strong><i class='material-icons v-middle'>link</i> </a> </span> <br>";
        }

        return content;
    },
    getFiltersDataHTML:function(data)
    {
        /*
        "<span>Mujeres y hombres de 13 a 80 años</span><br>" +
        "<span>del 14 de Junio al 28 de Junio</span> <br>" +
        "<span>Nodos <i class='material-icons'>link</i></span><br><br>" +
        */
        content = "";
        if(data.sex=="damas")
        {
            content+="<span>Mujeres </span>";
        }
        else if(data.sex=="caballeros")
        {
            content+="<span>Hombres </span>";
        }
        else
        {
            content+="<span>Mujeres y hombres </span>";
        }

        content+="<span>de "+data.menor+" a "+data.mayor+" años</span><br>";

        var startDate = data.start.replace("."," de ");
        startDate = startDate.replace("."," de ");
        var endDate = data.end.replace("."," de ");
        endDate = endDate.replace("."," de ");

        content+="<span>del "+startDate+" al "+endDate+".</span><br>";

        content+=" <a href='#!' onclick='wizard_summary.openNodesModal()'> <span>Nodos ("+data.nodos.length+") <i class='material-icons v-middle'>link</i></span>  </a> <br><br>";

        //console.log(data);
        return content;
    },
    openNodesModal:function()
    {
        var nodes="";

        nodes += "<ul class='collection'>";
        for(var i=0;i<wizard_summary.data.nodos.length;i++)
        {
            nodes+="<li class='collection-item'>"+wizard_summary.data.nodos[i].name+"</li>";
        }
        nodes += "</ul>";


        $("#modal-summary-content").html(
            nodes
        );

        $("#modal-summary").openModal();
    },
    openMailModal:function()
    {

        $("#modal-summary-content").html(
            wizard_summary.data.mailing_content
        );

        $("#modal-summary").openModal();
    },
    openImgSmallModal:function()
    {

        $("#modal-summary-content").html(
            "<img class='responsive-img img-modal' src='https://s3-us-west-1.amazonaws.com/enera-publishers/items/"+wizard_summary.data.image_small.filename+"' >"
        );

        $("#modal-summary").openModal();
    },
    openImgLargeModal:function()
    {

        $("#modal-summary-content").html(
            "<img class='responsive-img img-modal' src='https://s3-us-west-1.amazonaws.com/enera-publishers/items/"+wizard_summary.data.image_large.filename+"' >"
        );

        $("#modal-summary").openModal();
    },
    openImgSurveyModal:function()
    {

        $("#modal-summary-content").html(
            "<img class='responsive-img img-modal' src='https://s3-us-west-1.amazonaws.com/enera-publishers/items/"+wizard_summary.data.image_survey.filename+"' >"
        );

        $("#modal-summary").openModal();
    },
    openImgVideoModal:function()
    {

        $("#modal-summary-content").html(
            "<img class='responsive-img img-modal' src='https://s3-us-west-1.amazonaws.com/enera-publishers/items/"+wizard_summary.data.image_video.filename+"' >"
        );

        $("#modal-summary").openModal();
    },
    openVideoModal:function()
    {

        $("#modal-summary-content").html(
            "<video class='responsive-video' id='myvideo' controls style='display:block; margin:0 auto;'>" +
                "<source src='https://s3-us-west-1.amazonaws.com/enera-publishers/items/"+wizard_summary.data.video.filename+"' type='video/mp4'>"+
                "Tu navegador no soporta reproduccion de video."+
            "</video>"
        );

        $("#modal-summary").openModal();
    },
    openSurveyModal:function()
    {
        var survey="";
        for(var q=1;q<=5;q++)
        {
            if( wizard_summary.data["question_"+q] )
            {
                survey += "<ul class='collection with-header'>";

                survey+="<li class='collection-header'><h4>"+wizard_summary.data["question_"+q]+"</h4></li>";


                for(var ans=1;ans<=4;ans++) {
                    if (wizard_summary.data["answer_" + q+"_"+ans]) {
                        survey+="<li class='collection-item'>"+wizard_summary.data["answer_"+q+"_"+ans]+"</li>";
                    }
                }

                survey += "</ul>";

            }
        }

        $("#modal-summary-content").html(
            survey
        );

        $("#modal-summary").openModal();
    },
    getContainer:function()
    {
        //return the DOM element that contains the form
        return $("#summary_container");

    },
    getData:function()
    {
        //return the json form data

        /*'title' => 'required',
         'start_date' => 'required',
         'end_date' => 'required',
         'time' => 'required',
         'days' => 'required',
         'gender' => 'required',
         'age' => 'required',
         'images' => 'required',
         'ubication' => 'required',
         'interactionId' => 'required',
         'budget' => 'required',
         /* condicionales *
        'banner_link' => 'required_if:interactionId,like',
        'from' => 'required_if:interactionId,mailing_list',
        'from_mail' => 'required_if:interactionId,mailing_list',
        'subject' => 'required_if:interactionId,mailing_list',
        'mailing_content' => 'required_if:interactionId,mailing_list',
        'survey' => 'required_if:interactionId,survey',
        'captcha' => 'required_if:interactionId,captcha',
        'video' => 'required_if:interactionId,video',
        'branches' => 'required_if:ubication,select',
        */

        var data = wizard_summary.data;

        //console.log(data);

        var gender="both";
        if(data.sex=="caballeros")
        {
            gender="male";
        }
        else if(data.sex=="damas")
        {
            gender="female";
        }

        var branches=[];
        for(var i=0;i<data.nodos.length;i++)
        {
            branches.push(data.nodos[i].id);
        }

        var survey=[];
        for(var q=1;q<=5;q++)
        {
            if(data["question_"+q])
            {
                var obj = {};
                obj.question=data["question_"+q];
                obj.answers=[];
                for(var ans=1;ans<=4;ans++)
                {
                    if(data["answer_"+q+"_"+ans])
                    {
                        obj.answers.push(data["answer_"+q+"_"+ans]);
                    }
                }

                survey.push(obj);

            }
        }


        var images = {};
        if(data.image_small)
            images.small=data.image_small.item_id;
        if(data.image_large)
            images.large=data.image_large.item_id;
        if(data.image_survey)
            images.survey=data.image_survey.item_id;
        if(data.image_video)
            images.video=data.image_video.item_id;

        var video = null;
        if(data.video)
            video = data.video.item_id;

        var campaignData = {
            "title":getUrlParameter("name"),
            'start_date': data.start,
            'end_date': data.end,
            'time': '0;23',
            'days': ["1","2","3","4","5","6","7"],
            'gender': gender,
            'age': data.menor+";"+data.mayor,
            'images': images,
            'ubication': 'select',
            'interactionId': data.interaction,
            'budget': '$ 0.00',

            'banner_link': data.link,
            'from': data.mail_name,
            'from_mail': data.mail_address,
            'subject': data.mail_subject,
            'mailing_content': data.mailing_content,
            'survey': survey,
            'captcha': data.captcha,
            'video': video,
            'branches': branches
        };

        return campaignData;
        // return wizard_summary.data;

    },
    isValid: function () {
        //return true if form is valid and filled, false when theres an error

    }

};


var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};