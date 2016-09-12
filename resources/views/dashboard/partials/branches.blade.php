<div class="section image-card">
    <img class="responsive-img" src="{{asset('images/dashboard/imagen_nodos.jpg')}}" alt="">
</div>

<div class="section" style="font-size: 25px; padding:0;">
    <span style="font-weight: 400;">Nodos</span>
</div>

<div class="section" style="padding: 0;">
    @foreach($branches as $branch)
        <div class="card black-text" style="margin-bottom: 5px;">
            <div class="container" style="width: 90%;">
                <p style="padding: 5px 0 0 0; margin-bottom: 5px;">{{$branch->name}}</p>
                <div class="divider grey darken-1"></div>
                <div class="row">
                    <div class="col s7 m6 right-align">
                        <span style="font-weight: 300;"><i class="material-icons icon-left">&#xE62B;</i>Connexíones:</span>
                    </div>
                    <div class="col s5 m6 right-align">
                        <span style="font-weight: 200;font-size:19px;">{{  $branch->summary->last() ? number_format($branch->summary->last()->accumulated['connections']) : '---' }}</span>
                    </div>
                    <div class="col s12 m 12 right-align">
                        <span class="dark-green" style="font-size:9px; font-weight: 300; vertical-align:top;">{{date('d-M',strtotime( "-7 days" ))}}
                            - {{date('d-M')}}</span>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="section card-bottom">
    <a style="width:80%; margin-left:10%;"
       class="btn cyan" href="#!">Ver más</a>
</div>