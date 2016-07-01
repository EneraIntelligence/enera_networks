<div class="section image-card">
    <img class="responsive-img" src="{{asset('images/dashboard/imagen_campaigns.jpg')}}" alt="">
</div>
<div class="section" style="font-size: 25px; padding-top:0;">
    <span style="font-weight: 400;">Campañas</span>
</div>

<div class="section">
    @foreach($campaigns as $campaign)
        <div class="card black-text" style="padding: 5px 0 10px 0;">
            <div style="margin: 0 auto; width: 50%;">
                <span style="font-weight: 300;font-size: 17px;">{{$campaign->name}}</span>
            <span class="peity_accessed peity_data" style="margin: 5px 0;">
                1,2,3,4,5,6,1,2,3,4,1,2,3,4,5,6,1,2,3</span>
                <?php

                ?>
                <span style="font-weight: 300;font-size: 10px; padding-bottom: 15px;">Dias restantes: {{0}}</span>
            </div>
            <img  id="img-left" src="{{asset('images/icons/'.$campaign->interaction['name'].'.svg')}}">
            <a class="waves-effect waves-teal btn-fla" id="button-right" href="{{route('branches::show', ['id' => $campaign->_id])}}"><i class="material-icons right" style="margin-left: 0;">keyboard_arrow_right</i>Ver</a>
        </div>
    @endforeach
</div>

{{--<ul class="collection" style="border: none;">--}}
{{--@foreach($campaigns as $campaign)--}}
{{--<li class="collection-item avatar grey lighten-2" style="margin: 10px 0 10px 0;">--}}
{{--<img class="circle indigo lighten-4 animate-all" style="margin-top:10px; top:15px;"--}}
{{--src="{{ asset("images/icons/".$campaign['type'].'.svg') }}" alt="like icon">--}}
{{--<span class="title black-text">{{$campaign['name']}}</span>--}}
{{--<div class="progress" style="width: 70%; top: 7px;">--}}
{{--<div class="determinate" style="width: {{$data['percentage']}}%; background-color:{{($data['percentage'] > 85 ? 'red': ($data['percentage'] < 86 && $data['percentage'] > 50 ? 'yellow' : 'green'))}}"></div>--}}
{{--</div>--}}
{{--<span class="sub-title black-text " style="top: -5px; position: relative;">Dias restantes: {{$campaign['missingDays']}}</span>--}}
{{--<a href="{{route('campaigns::show', ['id' => $campaign['_id']])}}" class="secondary-content button cyan hide-on-med-and-up"--}}
{{--style="top: 30px; right: 10px">Más...</a>--}}
{{--<a href="{{route('campaigns::show', ['id' => $campaign['_id']])}}" class="secondary-content button cyan hide-on-small-only"--}}
{{--style="top: 30px; right: 12px">Ver más</a>--}}
{{--</li>--}}
{{--@endforeach--}}
{{--</ul>--}}