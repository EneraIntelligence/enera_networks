<div class="section image-card">
    <img class="responsive-img" src="{{asset('images/dashboard/imagen_campaigns.jpg')}}" alt="">
</div>
<div class="section" style="font-size: 25px; padding-top:0;">
    <span style="font-weight: 400;">Campañas</span>
</div>

<div class="">
    @foreach($campaigns as $campaign)

        <div class="card black-text" style="padding: 5px 0 10px 0;">
            <div style="margin: 0 auto; width: 50%;">
                <span style="font-weight: 300;font-size: 17px;">{{$campaign->name}}</span>
            <span class="peity_accessed peity_data" style="margin: 5px 0;">
               {{$campaign->summary ? str_replace(str_split('[]'), '',json_encode($campaign->summary->take(15)->lists('accumulated.completed'))): ''}}</span>
                <?php
                $star = new DateTime();
                $end = new DateTime(date('Y-m-d',$campaign->filters['date']['end']->sec));
                $interval = $star->diff($end);
                ?>
                <span style="font-weight: 300;font-size: 10px; padding-bottom: 15px;">Dias restantes: {{$interval->format('%a días')}}</span>
            </div>
            <img  id="img-left" src="{{asset('images/icons/'.$campaign->interaction['name'].'.svg')}}">
            <a class="waves-effect waves-teal btn-fla" id="button-right" href="{{route('campaigns::show', ['id' => $campaign->_id])}}"><i class="material-icons right" style="margin-left: 0;">keyboard_arrow_right</i>Ver</a>
        </div>
    @endforeach
</div>
<div class="section card-bottom">
    <a style="width:80%; margin-left:10%;"
       class="btn cyan" href="{{route('reports::campaigns')}}">Ver más</a>
</div>