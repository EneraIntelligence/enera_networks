@extends('layouts.main')

@section('title', 'Nodos')

@section('head_scripts')
    {!! HTML::style('assets/css/campaign.css') !!}
    <style>
        .margi-title {
            margin: 5px 0 5px 25px;
        }

        .border {
            border: solid red 1px;
        }
    </style>
@stop

@section('content')
    <div class="content uk-margin-remove">
        <div class="row">
            <div class="uk-width-1">
                <div class="uk-panel-box-secondary">
                    <h3 class="margi-title">{{ '<nombre nodo>' }}</h3>
                    <h3 class="margi-title">{{  '<nombre red>' }}</h3>
                </div>
            </div>
        </div>

        <div class="row" style="margin: 20px;">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-1-3">
                    <div class="uk-width-1">
                        <div class="uk-panel-box-secondary uk-panel-box">
                            <h3 class="uk-panel-title">Preview</h3>
                            <div class="preview-container">

                                <img class="uk-align-center uk-responsive-width phone"
                                     src="{!! URL::asset('images/android_placeholder.png') !!}" alt="">

                                <!-- like preview -->
                                <div class="interaction uk-align-center uk-position-relative"
                                     style="background-color: red;">


                                    <img class="interaction-image"
                                         src="https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/{!! $image = 'logo_maxcom_p.png' !!}">

                                    <img class="interaction-image"
                                         src="{!! URL::asset('images/terminos.png') !!}" style="margin: 10px 0; width: 300px;">

                                    <img class="uk-align-right" width="60" height="50"
                                         src="https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/logo_pie_sendero.png"
                                          alt="">

                                    <img class="uk-align-left" width="60" height="50"
                                         src="https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/logo_pie_enera.png"
                                         alt="">

                                    <div class="uk-clearfix"></div>

                                    <a style="position: absolute; bottom: 0; width: 100%;" class="uk-hidden-small"
                                       href="#">
                                        <p class="uk-text-truncate uk-text-center uk-margin-bottom-remove">Deseo navegar
                                            en internet</p>
                                    </a>

                                    <a style="position: absolute; bottom: 0; width: 100%;"
                                       class="uk-hidden-medium uk-hidden-large" href="#">
                                        <p class="uk-text-truncate uk-text-center uk-margin-bottom-remove"
                                           style="font-size: 10px">Deseo navegar en internet</p>
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-2-3">
                    <div class="uk-panel-box-secondary uk-panel-box">
                        <h3 class="uk-panel-title">Titulo</h3>
                    </div>
                </div>
                <div class="uk-width-1-3">
                    <div class="uk-panel-box-secondary uk-panel-box">
                        <h3 class="uk-panel-title">Detalles</h3>
                        <table class="uk-table">
                            <thead>
                            <tr>
                                <th>...</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td>...</td>
                            </tr>
                            </tfoot>
                            <tbody>
                            <tr>
                                <td>...</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="uk-width-2-3">
                    <div class="uk-panel-box-secondary uk-panel-box">
                        <h3 class="uk-panel-title">Titulo</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! HTML::script('js/preview_helper.js') !!}
    <script>
        $(document).ready(function () {

        });
    </script>
@stop