@extends('layouts.mainmat')

@section('title', 'Campañas')

@section('head_scripts')
    {!! HTML::style('assets/css/campaign.css') !!}
@stop

@section('content')


    @if( count($campaigns) > 0 )


        <div class="container">
            <h3>Campañas</h3>

            <div class="row">

                @foreach($campaigns as $campaign)


                <div class="col s12 m6 l4">

                    <div class="card">

                        <div class="row">

                            <div class="thumb left">
                                <img src="{{"https://s3-us-west-1.amazonaws.com/enera-publishers/items/". ($campaign->interaction['name'] != 'survey' ? $campaign->content['images']['large'] : $campaign->content['images']['survey'])}}">
                            </div>


                            <strong>{{$campaign->name}} <br> </strong>
                            <span>
                                Vistos: 100 <br>
                                Interacciones:12
                            </span>
                            <div class="divider" style="margin-top:7px;"></div>
                            <span class="grey-text bottom-left" style="margin-left:87px;">
                                {{ trans( "campaigns.interaction.".$campaign->interaction['name'] ) }}
                            </span>
                            <a class="bottom-right" style="margin-right:10px;" href="{{route('campaigns::show', ['id' => $campaign->id])}}">
                                Detalles
                            </a>

                        </div>



                    </div> <!-- end card -->


                </div> <!-- end col s12 -->

                @endforeach

            </div><!-- end row -->

        </div>

    @endif;

    <div class="fixed-action-btn" style="bottom: 55px; right: 24px;">

        @if( count($campaigns) == 0 )
            <i class="large material-icons animated-arrow grey-text" style="right: -15px; bottom: 30px; position: absolute;" >arrow_drop_down</i>
        @endif

        <a class="btn-floating btn-large red waves-effect waves-light modal-trigger" href="#create">
            <i class="material-icons">add</i>
        </a>
    </div>

    <div id="create" class="modal">
        <div class="modal-content" style="height: 100px;">
            <i class="material-icons right-corner" style="cursor: pointer">close</i>
            <div class="row" style="margin: 0;">
                <form class="col m12 s12 formValidate" action="/campaigns/new" method="get" id="validate" novalidate="novalidate">
                    <div class="row">
                        <div class="input-field col m10 s9">
                            <input id="name" type="text" name="name" required>
                            <label for="name">Nombre de Campaña</label>
                        </div>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="input-field col m2 s3">
                            {{--<a class="waves-effect waves-light btn">Crear</a>--}}
                            <button type="submit" class="sbm-button waves-light teal lighten-2" id="btn-modal">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@stop

@section('scripts')
    {!! HTML::script('js/jquery-validation/dist/jquery.validate.js') !!}

    @if( count($campaigns) == 0 )

        <!-- animated arrow for new campaign button -->
        <script>
            $( document ).ready(function() {
                animateArrow();

                function animateArrow() {
                    TweenLite.to(".animated-arrow", .7, {
                        y: -50, ease:Quad.easeOut,onComplete: function () {
                            TweenLite.to(".animated-arrow", .7, {y: 0, ease:Quad.easeIn, onComplete: animateArrow});
                        }
                    });
                }
            });
        </script>
    @endif

    <script>
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
            
            $('.right-corner').click(function () {
                $('.modal').closeModal();
            })
        });
        $("#validate").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 30
                }
            },
            //For custom messages
            messages: {
                name:{
                    required: "* Ingresa un nombre para la campaña",
                    maxlength: "* La campaña debe tener maximo 30 caracteres"

                },
                curl: "Enter your website"
            },
            errorElement : 'div',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });
    </script>
@stop

