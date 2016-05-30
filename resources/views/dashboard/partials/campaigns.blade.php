<div class="section image-card">
    <img class="responsive-img" src="{{asset('images/dashboard/imagen_campaigns.jpg')}}" alt="">
</div>

<div class="section" style="font-size: 25px; padding-top:0;">
    <span style="font-weight: 400;">Campañas</span>
</div>

<ul class="collection" style="border: none;">
    @foreach($camData as $data)
        <li class="collection-item avatar grey lighten-2" style="margin: 10px 0 10px 0;">
            <img class="circle indigo lighten-4 animate-all" style="margin-top:10px; top:15px;"
                 src="{{ asset("images/icons/".$data['type'].'.svg') }}" alt="like icon">
            <span class="title black-text">{{$data['name']}}</span>
            <div class="progress" style="width: 70%; top: 5px;">
                <div class="determinate" style="width: {{$data['percentage']}}"></div>
            </div>
            <span class="title black-text">Dias restantes: {{$data['missingDays']}}</span>
            <a href="{{route('campaigns::show', ['id' => $data['_id']])}}" class="secondary-content button cyan"
               style="top: 30px; right: 5px">VER MÁS</a>
        </li>
    @endforeach
</ul>