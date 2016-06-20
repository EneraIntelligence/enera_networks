<div class="section image-card">
    <img class="responsive-img" src="{{asset('images/dashboard/imagen_campaigns.jpg')}}" alt="">
</div>

<div class="section" style="font-size: 25px; padding-top:0;">
    <span style="font-weight: 400;">Campañas</span>
</div>

<ul class="collection" style="border: none;">
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
</ul>