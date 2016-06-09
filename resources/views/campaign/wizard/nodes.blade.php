<div class="nodos">
    <h5>Nodos</h5>
    <br>
    <div class="divider"></div>
    <br>
    <div class="container">
        <div class="row">
            <form class="col s12" id="data-nodes">
                <p>
                    <input class="with-gap" name="place" type="radio" id="all" value="all" checked/>
                    <label for="all">Todos</label>
                    <input class="with-gap" name="place" type="radio" id="sel" value="none"/>
                    <label for="sel">Selecionar</label>
                </p>
                <br>
                @foreach($branches as $key => $branch)
                    <p>
                        <input type="checkbox" name="node" id="{{$key}}" class="checkbox" value="{{$branch}}" checked/>
                        <label for="{{$key}}">{{$branch}}</label>
                    </p>
                    <hr>
                @endforeach
                <br>
            </form>
        </div>
    </div>
</div>