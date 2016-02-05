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
    <div id="page_heading">
        <h1>{{ $branch->name }}</h1>
        <span class="uk-text-muted uk-text-upper uk-text-small">
            {{  $network->name }}
        </span>
    </div>

    <div id="page_content_inner">
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            <div class="uk-width-xLarge-2-10 uk-width-large-3-10 uk-row-first">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Portal
                        </h3>
                    </div>
                    <div class="md-card-content">
                        {{-- Similador --}}
                        <div class="preview-container" style="height: 469px; margin: 25px 0px 15px;">

                            <img class="uk-align-center uk-responsive-width phone"
                                 src="http://networks.enera-intelligence.mx/images/android_placeholder.png" alt=""
                                 style="margin-bottom: 0px;">

                            <!-- like preview -->
                            <div class="interaction uk-align-center uk-position-relative"
                                 style="height: 320px; margin-top: -394px; width: 202px;
                                 background-image: url('https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/{!! $branch->portal['background'] !!}'); background-repeat: no-repeat; background-position: top center; background-attachment: fixed; background-size: cover;">

                                <img class="interaction-image"
                                     src="https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/{!! $branch->portal['image'] !!}"
                                     style="margin-bottom: 10px;">

                                <img class="interaction-image"
                                     src="http://networks.enera-intelligence.mx/images/terminos.png"
                                     style="margin: 10px 0; width: 300px;">

                                {{--<img class="uk-align-right" width="60" height="50"
                                     src="https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/logo_pie_sendero.png"
                                     alt="">--}}

                                <img class="uk-align-left" width="60" height="50"
                                     src="https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/logo_pie_enera.png"
                                     alt="">

                                <div class="uk-clearfix"></div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Detalles
                        </h3>
                    </div>
                    <div class="md-card-content">
                        <ul class="md-list">
                            <li>
                                <div class="md-list-content">
                                    <span class="uk-text-small uk-text-muted uk-display-block">Antenas</span>
                                    <span class="md-list-heading uk-text-large uk-text-success">
                                        {{ count($branch->aps) }}
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="md-list-content">
                                    <span class="uk-text-small uk-text-muted uk-display-block">Conexiones</span>
                                    <span class="md-list-heading uk-text-large">
                                        {{ $branch->campaign_logs()->count() }}
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="md-list-content">
                                    <span class="uk-text-small uk-text-muted uk-display-block">Dispositivos detectados</span>
                                    <span class="md-list-heading uk-text-large">
                                        {{ $devices }}
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="md-list-content">
                                    <span class="uk-text-small uk-text-muted uk-display-block">SKU</span>
                                    <span class="md-list-heading uk-text-large">4319572394</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-xLarge-8-10  uk-width-large-7-10">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Ubicacion
                        </h3>
                    </div>
                    <div class="md-card-content large-padding">
                        <div class="uk-grid uk-grid-divider uk-grid-medium">
                            {{-- Google Maps --}}
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2741.784543315565!2d-{!! $branch->location[1] !!}!3d{!! $branch->location[0] !!}!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x62079ed96931d412!!5e0!3m2!1ses-419!2smx!4v1454702603997"
                                    width="800" height="400" frameborder="0" style="border:0"></iframe>
                        </div>
                    </div>
                </div>
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Analiticas
                        </h3>
                    </div>
                    <div class="md-card-content large-padding">
                        <div class="uk-grid uk-grid-divider uk-grid-medium">
                            {{-- ??? --}}

                        </div>
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