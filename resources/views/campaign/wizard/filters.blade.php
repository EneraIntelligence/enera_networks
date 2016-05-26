<h5>Segmentación</h5>
<div class="container">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="col s12">
                    <p>Edades</p>
                    <p class="range-field">
                    <div id="slider"></div>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <p>Genero</p>
                    <p>
                        <input class="with-gap" name="sex" type="radio" id="val1" value="damas"/>
                        <label for="val1">Damas</label>

                        <input class="with-gap" name="sex" type="radio" id="val2" value="caballeros"/>
                        <label for="val2">Caballeros</label>

                        <input class="with-gap" name="sex" type="radio" id="val3" value="ambos" checked/>
                        <label for="val3">Ambos</label>
                    </p>
                </div>
            </div>
            {{--<div class="row">--}}
                {{--<div class="col s12">--}}
                    {{--<p>Nodos</p>--}}
                    {{--<p>--}}
                        {{--<input class="with-gap" name="place" type="radio" id="all" value="all" checked/>--}}
                        {{--<label for="all">Todos</label>--}}
                        {{--<input class="with-gap" name="place" type="radio" id="sel" value="none"/>--}}
                        {{--<label for="sel">Selecionar</label>--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="row" id="place">
                <div class="col s12">
                    {{--<p>Nodos</p>--}}
                    {{--<p>--}}
                        {{--<input class="with-gap" name="place" type="radio" id="all" value="all" checked/>--}}
                        {{--<label for="all">Todos</label>--}}
                        {{--<input class="with-gap" name="place" type="radio" id="sel" value="none"/>--}}
                        {{--<label for="sel">Selecionar</label>--}}
                    {{--</p>--}}
                    {{--<br>--}}
                    {{--<p>--}}
                        {{--<input type="checkbox" id="test1" checked/>--}}
                        {{--<label for="test1">Red</label>--}}
                    {{--<p>--}}
                    {{--</p>--}}
                    {{--<input type="checkbox" id="test2" checked/>--}}
                    {{--<label for="test2">RedRedRedRedRed</label>--}}
                    {{--<p>--}}
                    {{--</p>--}}
                    {{--<input type="checkbox" id="test3" checked/>--}}
                    {{--<label for="test3">Red</label>--}}
                    {{--<p>--}}
                    {{--</p>--}}
                    {{--<input type="checkbox" id="test4" checked/>--}}
                    {{--<label for="test4">Red</label>--}}
                    {{--<p>--}}
                    {{--</p>--}}
                    {{--<input type="checkbox" id="test5" checked/>--}}
                    {{--<label for="test5">Red</label>--}}
                    {{--<p>--}}
                    {{--</p>--}}
                    {{--<input type="checkbox" id="test6" checked/>--}}
                    {{--<label for="test6">RedRedRedRedRed</label>--}}
                    {{--<p>--}}
                    {{--</p>--}}
                    {{--<input type="checkbox" id="test7" checked/>--}}
                    {{--<label for="test7">Red</label>--}}
                    {{--<p>--}}
                    {{--</p>--}}
                    {{--<input type="checkbox" id="test8" checked/>--}}
                    {{--<label for="test8">Red</label>--}}
                    {{--</p>--}}
                    <p>
                        <label for="start">Inicio de campaña</label>
                        <input type="date" class="datepicker" id="start" >
                    </p>
                    <p>
                        <label for="end">Fin de campaña</label>
                        <input type="date" class="datepicker" id="end" disabled>
                    </p>

                </div>
            </div>
        </form>
    </div>
</div>