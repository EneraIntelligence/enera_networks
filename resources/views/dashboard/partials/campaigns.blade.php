<div class="section image-card">
    <img class="responsive-img" src="{{asset('images/dashboard/imagen_campaigns.jpg')}}" alt="">
</div>

<div class="section" style="font-size: 25px; padding-top:0;">
    <span style="font-weight: 400;">Campañas</span>
</div>


<div class="collection black-text hide-on-small-only" style="margin-bottom:20px; height:250px; overflow-y:scroll;border: none;">
    @foreach($campaigns as $id=>$name)

        <?php
        $max_chars=28;
        if (strlen($name) > $max_chars)
            $name = substr($name, 0, $max_chars-3) . '...';
        ?>


        <a href="{{route("campaigns::show",$id)}}" class="collection-item white-text" style="background-color: rgba(0, 0, 0, 0);">
            {{$name}}
            <i class="material-icons secondary-content">forward</i>
        </a>
    @endforeach
</div>

<ul class="collection black-text hide-on-med-and-up" style="height:250px; overflow-y:scroll; border: none;">
    @foreach($campaigns as $id=>$name)

        <?php
        $max_chars=27;
        if (strlen($name) > $max_chars)
            $name = substr($name, 0, $max_chars-3) . '...';
        ?>

        <li class="collection-item white-text" style="background-color: rgba(0, 0, 0, 0);">
            <div>{{$name}}
                <a href="{{route("campaigns::show",$id)}}" class="secondary-content">
                    <i class="material-icons">forward</i>
                </a>
            </div>
        </li>

    @endforeach
</ul>