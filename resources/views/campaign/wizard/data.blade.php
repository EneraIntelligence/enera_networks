<div id="data_cont">
    <h5>Contenido</h5>

    {!! Form::open(array('id' => 'data-form')) !!}

        <div class="row">
            <form class="col s12">

                <div class="row">
                    <div class="input-field col s12 data-field data-banner_link">
                        <label for="link-input">Enlace</label>
                        <input placeholder="http://misitio.com" name="link" id="link-input" type="text" class="validate">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 data-field data-like">
                        <label for="like-input">Página de facebook</label>
                        <input placeholder="http://mipagina.com" name="like" id="like-input" type="text" class="validate">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 data-field data-captcha">
                        <input placeholder="mi producto" name="captcha" id="captcha" type="text" class="validate">
                        <label for="captcha">Captcha</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 data-field data-mailing_list">
                        <textarea style="height:600px" id="mailing_content" name="mailing"> </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field file-field btn col s6 offset-s3 data-field data-video">

                        <span>Subir Video <i class="material-icons left">file_upload</i></span>
                        <input id="video-input" name="video" type="file" accept='video/mp4'>

                    </div>
                </div>

                <div class="row data-field data-survey">
                    <div class="input-field file-field btn col s6 offset-s3">

                        <span> <i class="material-icons left">file_upload</i> <i class="material-icons left">collections</i> (684x400)</span>
                        <input id="image-survey" name="image-small" type="file" accept='image/*'>

                    </div>

                    <img id="image-survey-cropped" class="responsive-img col s6 offset-s3 mBottom-20" src="http://placehold.it/684x400?text=684x400" alt="">

                </div>

                <div class="row">

                    <div class="col s6 offset-s3 m4 offset-m1 data-field data-banner_link data-captcha data-like">

                        <div class="input-field file-field btn" style="margin:0 -0.75em; width: calc(100% + 1.5em); padding:0;">
                            <span>Banner (600x602)</span>
                            <input id="image-small" name="image-small" type="file" accept='image/*'>

                        </div>
                        <img id="image-small-cropped" class="responsive-img" src="http://placehold.it/600x602?text=600x602" alt="">
                    </div>



                    <div class="col s6 offset-s3 m4 offset-m2 data-field data-banner_link data-captcha data-like">

                        <div class="input-field file-field btn" style="margin:0 -0.75em; width: calc(100% + 1.5em); padding:0;">

                            <span>Banner (684x864)</span>
                            <input id="image-large" name="image-large" type="file" accept='image/*'>


                        </div>

                        <img id="image-large-cropped" class="responsive-img" src="http://placehold.it/600x864?text=684x864" alt="">

                    </div>


                </div>


            </form>
        </div>

    {!! Form::close() !!}



</div>

<!-- Modal image preview -->
<div id="modal-image" class="modal modal-fixed-footer">
    <div class="modal-content">
        <p>Recorta la imágen</p>
        <div id="image-cropper">
            <img src="" alt="">
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" id="crop-btn" class="modal-action waves-effect waves-green btn-flat ">Cortar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
    </div>
</div>

<!-- Modal uploading image -->
<div id="modal-loader" class="modal">
    <div class="modal-content">

        <p class="center-align">Espera un momento...</p>

        <div class="preloader-wrapper small active centered-loader">
            <div class="spinner-layer spinner-green-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>

    </div>
</div>