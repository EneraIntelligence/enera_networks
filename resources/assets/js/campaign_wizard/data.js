var wizard_data =
{
    video:null,//data that will hold the uploaded video item
    images:{},//data that will hold the uploaded image items
    cropData:null,//object used to store the crop tool data
    form:null,//temporary form object to send via ajax
    firstTime:true,
    validator:null,
    initialize: function (interaction_id) {
        //initialize rules for the form depending on the interaction
        
        if(wizard_data.firstTime)
        {
            wizard_data.firstTime=false;

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
            
            //video upload
            $("#video-input").change(function () {
                wizard_data.uploadVideo();
            });

            $("#crop-btn").click(function () {
                //crop button pressed
                wizard_data.cropUploadImage();
            });
        }

        setTimeout(function()
        {
            $( "#link-input" ).focus();

            var ev = EventDispatcher.getInstance();
            ev.trigger(WizardEvents.validForm);
        },400);


        //TODO hide unnecesary items and set validation rules


        wizard_data.form = $("#data-form");
        wizard_data.validator = wizard_data.form.validate({
            onsubmit:false,
            onfocusout:labelFix,
            //onkeyup:labelFix,
            rules:
            {
                link:
                {
                    required:true,
                    url:true
                },
                captcha:
                {
                    required:true
                }
            }
        });

        // $("#data-form").change(function(){
        //     var serialized = $(this).serializeArray(),
        //         jsonCam = {};
        //     // build key-values
        //     $.each(serialized, function(){
        //         jsonCam [this.name] = this.value;
        //     });
        //     // and the json string
        //     var jsonCam = JSON.stringify(jsonCam);
        //
        //     console.log(jsonCam);
        //
        // });

        function labelFix(element, event)
        {
            wizard_data.validator.element(element);
            Materialize.updateTextFields();
        }

    },
    getContainer:function()
    {
        //return the DOM element that contains the form
        return $("#data_cont");
    },
    getData:function()
    {
        //return the json form data
        var serialized = $("#data-form").serializeArray(),
                jsonCam = {};
        
            // build key-values
            $.each(serialized, function(){
                jsonCam [this.name] = this.value;
            });

        
        
        return jsonCam;
        
    },
    isValid: function () {
        //return true if form is valid and filled, false when there's an error
        if(!wizard_data.form.valid())
        {
            wizard_data.validator.focusInvalid();
            Materialize.updateTextFields();
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
                    complete: function()
                    {
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
        $(wizard_data.cropData.previewId+"-cropped").attr('src', pic);

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
    }

};
