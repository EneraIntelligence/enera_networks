var wizard_data =
{
    video: null,//data that will hold the uploaded video item
    images: {},//data that will hold the uploaded image items
    cropData: null,//object used to store the crop tool data
    form: null,//temporary form object to send via ajax
    interactionId: "",
    firstTime: true,
    validator: null,

    data_mask:null,//selected interaction data mask
    //mask to send only the data that is needed by an interaction
    dataMasks: {
        "banner_link": {"link":true, "image_small":true, "image_large":true},
        "like": {"like":true, "image_small":true, "image_large":true},
        "mailing_list": {"mail_name":true, "mail_address":true, "mail_subject":true, "mailing_content":true},
        "captcha": {"captcha":true, "image_small":true, "image_large":true},
        "survey": {"image_survey":true},
        "video": {"video":true, "image_video":true}
    },


    initialize: function (interaction_id) {

        //initialize mask with all the question fields
        for(var q=1;q<=5;q++)
        {
            var surveyMask = wizard_data.dataMasks['survey'];
            surveyMask["question_"+q]=true;
            for(var ans=1;ans<=4;ans++)
            {
                surveyMask["answer_"+q+"_"+ans]=true;
            }
        }

        //initialize rules for the form depending on the interaction
        wizard_data.interactionId = interaction_id;
        wizard_data.data_mask = wizard_data.dataMasks[interaction_id];

        if (wizard_data.firstTime) {
            wizard_data.firstTime = false;

            //initialize image changes
            $("#image-small").change(function () {
                wizard_data.showPreview(event, "#image-small", 600, 602)
            });
            $("#image-large").change(function () {
                wizard_data.showPreview(event, "#image-large", 684, 864)
            });
            $("#image-survey").change(function () {
                wizard_data.showPreview(event, "#image-survey", 684, 400)
            });
            $("#image-video").change(function () {
                wizard_data.showPreview(event, "#image-video", 640, 360)
            });

            //video upload
            $("#video-input").change(function () {
                wizard_data.uploadVideo();
            });

            $("#crop-btn").click(function () {
                //crop button pressed
                wizard_data.cropUploadImage();
            });
        }

        setTimeout(function () {
            $("#link-input").focus();

            var ev = EventDispatcher.getInstance();
            ev.trigger(WizardEvents.validForm);
        }, 400);


        //hide unnecesary fields and set validation rules
        wizard_data.hideAllExcept(interaction_id);

        wizard_data.form = $("#data-form");
        wizard_data.validator = wizard_validators.getValidator(interaction_id);


    },
    getContainer: function () {
        //return the DOM element that contains the form
        return $("#data_cont");
    },
    getData: function () {
        //return the json form data
        var serialized = $("#data-form").serializeArray();
        var jsonCam = {};

        var mask = wizard_data.data_mask;
        // build key-values
        $.each(serialized, function () {
            if(mask[this.name] && this.value!="")
                jsonCam [this.name] = this.value;
        });


        //inject images to data
        if(mask["image_small"] && wizard_data.images['small'])
            jsonCam["image_small"] = wizard_data.images['small'];
        if(mask["image_large"] && wizard_data.images['large'])
            jsonCam["image_large"] = wizard_data.images['large'];
        if(mask["image_survey"] && wizard_data.images['survey'])
            jsonCam["image_survey"] = wizard_data.images['survey'];
        if(mask["image_video"] && wizard_data.images['video'])
            jsonCam["image_video"] = wizard_data.images['video'];

        if(mask["video"] && wizard_data.video)
            jsonCam["video"] = wizard_data.video;

        //console.log(wizard_data.images);

        return jsonCam;

    },
    isValid: function () {
        //return true if form is valid and filled, false when there's an error

        if (!wizard_data.form.valid()) {
            //fields not valid
            wizard_data.validator.focusInvalid();
            Materialize.updateTextFields();
            // return true; // descomentar esta liena para saltar la validación en data_step 
        }
        else if( wizard_data.interactionId == "mailing_list" && tinymce.activeEditor.getContent()=="")
        {
            //text area not valid
            Materialize.toast('¡Debes llenar el contenido del correo!', 4000)
            tinymce.execCommand('mceFocus',false,'#mailing_content');
            return false;
        }

        return wizard_data.form.valid();
    },

    showPreview: function (event, previewId, width, height) {


        //initialize and clear image cropper
        var imageContainer = $("#image-cropper");
        imageContainer.empty();
        imageContainer.append('<img class="responsive-img" src="" alt="">');
        var output = imageContainer.find("img");
        output.attr("src", "");

        var _URL = window.URL || window.webkitURL;
        var input = event.target;

        var image = new Image();
        image.onload = function () {
            //load image on input field
            var reader = new FileReader();
            reader.onload = function () {
                var dataURL = reader.result;

                //change modal image to crop
                output.attr("src", dataURL);

                $('#modal-image').openModal({
                    dismissible: false, // Modal can't be dismissed by clicking outside of the modal
                    complete: function () {
                        //close on cancel
                        var input = event.target;
                        input.value = "";
                    }
                });


                output.cropper({
                    aspectRatio: width / height,
                    viewMode: 1,
                    resizable: true,
                    zoomable: false,
                    rotatable: false,
                    multiple: true,
                    crop: function (e) {

                        // save the crop data to have it available when user clicks save
                        wizard_data.cropData = e;
                        wizard_data.cropData.previewId = previewId;
                        wizard_data.cropData.imageWidth = width;
                        wizard_data.cropData.imageHeight = height;
                        wizard_data.cropData.image = image;
                        wizard_data.cropData.previewId = previewId;
                        wizard_data.cropData.input = input;

                    }
                });


            };
            reader.readAsDataURL(input.files[0]);

        };
        image.src = _URL.createObjectURL(input.files[0]);


    },


    cropUploadImage: function () {

        //show loader
        $('#modal-loader').openModal({
            dismissible: false // Modal can't be dismissed by clicking outside of the modal
        });


        //get the crop data
        var img = wizard_data.cropData.image;
        var x = Math.round(wizard_data.cropData.x);
        var y = Math.round(wizard_data.cropData.y);
        var width = Math.round(wizard_data.cropData.width);
        var height = Math.round(wizard_data.cropData.height);
        var expWidth = Math.round(wizard_data.cropData.imageWidth);
        var expHeight = Math.round(wizard_data.cropData.imageHeight);
        var previewId = wizard_data.cropData.previewId;
        var input = wizard_data.cropData.input;

        if (x < 0)
            x = 0;
        if (y < 0)
            y = 0;

        if (y + height > img.naturalHeight) {
            height = img.naturalHeight - y;
        }

        if (x + width > img.naturalWidth) {
            width = img.naturalWidth - x;
        }

        //create canvas
        var resize_canvas = document.createElement('canvas');
        resize_canvas.width = expWidth;
        resize_canvas.height = expHeight;

        //paint canvas with croped portion of image
        resize_canvas.getContext('2d').drawImage(img, x, y, width, height, 0, 0, expWidth, expHeight);
        var pic = resize_canvas.toDataURL("image/png");
        $(wizard_data.cropData.previewId + "-cropped").attr('src', pic);

        //fill data to send to ajax
        input.value = "";


        var form_data = new FormData($('#data-form')[0]);
        form_data.append("imgType", previewId);
        form_data.append("imgToSave", pic);


        //div to receive any possible error
        /*
         var errorDiv = $(previewId + "-errors");
         errorDiv.html('');
         */

        var inputId = "#" + previewId.substring(1, previewId.length);
        //console.log("inputId: " + inputId);
        var inputField = $(inputId);


        //upload item via ajax
        $.ajax({
            url: '/campaigns/save-image',
            type: 'POST',
            dataType: 'JSON',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (data) {

            wizard_data.images[data.imageType] = data.item_id;

            inputField.rules("remove");


            $('#modal-loader').closeModal();
            $('#modal-image').closeModal();

        }).fail(function (jqXHR, textStatus, errorThrown) {

            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);


            /*
             inputField.required = true;

             errorDiv.html('<span class="parsley-required uk-text-center md-input-danger">' +
             'Hubo un problema al subir tu imagen. Por favor intenta de nuevo.' +
             '</span>');*/
            alert("Hubo un problema al subir la imagen. Revisa tu conexión a internet e intenta de nuevo.")

            setTimeout(function () {
                $('#modal-loader').closeModal();
            }, 200);

        });


    },

    uploadVideo: function () {

        //show loader
        $('#modal-loader').openModal({
            dismissible: false // Modal can't be dismissed by clicking outside of the modal
        });

        var form_data = new FormData($('#data-form')[0]);

        /*
         //div to receive any possible error
         var errorDiv = $(".video-errors");
         errorDiv.html('');*/

        var inputId = "#video-input";
        var inputField = $(inputId);


        //upload item via ajax
        $.ajax({
            url: '/campaigns/save-video',
            type: 'POST',
            dataType: 'JSON',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (data) {
            /*
             inputField.removeAttr("required");

             console.log(inputField);
             console.log("success");
             console.log(data);
             */

            wizard_data.video = data.item_id;
            //console.log(create_campaign_helper);
            $('#modal-loader').closeModal();
            inputField.rules("remove");

            //inputField.value = "";

        }).fail(function (jqXHR, textStatus, errorThrown) {
            /*
             console.log(jqXHR);
             console.log(textStatus);
             console.log(errorThrown);

             inputField.required = true;

             errorDiv.html('<span class="parsley-required uk-text-center md-input-danger">' +
             'Hubo un problema al subir tu video. Verifica que el peso del archivo sea menor a 10mb.' +
             '</span>');*/

            alert("Hubo un problema al subir la imagen. Verifica que el peso del archivo sea menor a 10mb.")


            setTimeout(function () {
                $('#modal-loader').closeModal();
            }, 200);

            //inputField.value = "";

        });
    },

    hideAllExcept: function (interaction) {
        $(".data-field").css("display", "none");
        $(".data-" + interaction).css("display", "block");
    },
    labelFix: function (element, event) {
        wizard_data.validator.element(element);
        Materialize.updateTextFields();

    }
};


var wizard_validators =
{
    validator:null,
    rules: {
        onsubmit: false,
        onfocusout: wizard_data.labelFix,
        //onkeyup:labelFix,
        rules: {
            link: {
                required: true,
                url: true
            },
            like: {
                required: true,
                url: true
            },
            captcha: {
                required: true
            },
            mail_name: {
                required: true
            },
            mail_subject: {
                required: true
            },
            mailing_content: {
                required: true
            },
            mail_address:{
                required:true,
                email:true
            },
            question_1:
            {
                required:true
            },
            answer_1_1:
            {
                required:true
            },
            answer_1_2:
            {
                required:true
            },
            image_small:
            {
                required:true
            },
            image_large:
            {
                required:true

            },
            image_survey:
            {
                required:true
            },
            video:
            {
                required:true
            }
        }

    },
    getValidator: function (interactionId) {

        if(wizard_validators.validator)
            return wizard_validators.validator;

        // var validatorObject = wizard_validators.validators[interactionId];
        var validatorObject = wizard_validators.rules;

        if (validatorObject) {
            wizard_validators.validator=wizard_data.form.validate(validatorObject);
            return wizard_validators.validator;
        }
        else {
            console.log("Error:  wizard_validators.validator for --> " + interactionId + " not created");
            return null;
        }

    }
};