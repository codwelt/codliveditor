@if(count($configuracion) > 0)
    <form action="/codliveditor/configuracion/1" method="post">
        @csrf
        @method('put')
        <div>
            <label for="tipostorage">Storage</label>
            <select name="tipostorage" id="tipostorage">
                @if($configuracion[0]['tipostorage'] == 'local')
                    <option value="{{$configuracion[0]['tipostorage']}}"
                            selected>{{$configuracion[0]['tipostorage']}}</option>
                    <option value="s3">s3</option>
                @else
                    <option value="{{$configuracion[0]['tipostorage']}}"
                            selected>{{$configuracion[0]['tipostorage']}}</option>
                    <option value="local">local</option>
                @endif
            </select>
        </div>
        <div>
            <label for="tiporender">Tipo de renderizado</label>
            <select name="tiporender" id="tiporender">
                @if($configuracion[0]['tiporender'] == 1)
                    <option value="1" selected>Fisico</option>
                    <option value="0">Virtual</option>
                @else
                    <option value="0" selected>Virtual</option>
                    <option value="1">Fisico</option>
                @endif
            </select>
        </div>
        <div>
            <label for="tipoframework">Framework front</label>
            <select name="tipoframework" id="tipoframework">
                @if($configuracion[0]['idframeworkfront'] == 0)
                    <option value="0" selected>ninguno</option>
                    <option value="1">Bootstrap</option>
                    <option value="2">Semantic ui</option>
                @elseif($configuracion[0]['idframeworkfront'] == 1)
                    <option value="1" selected>Bootstrap</option>
                    <option value="2">Semantic ui</option>
                    <option value="0">ninguno</option>
                @elseif($configuracion[0]['idframeworkfront'] == 2)
                    <option value="2" selected>Semantic ui</option>
                    <option value="1">Bootstrap</option>
                    <option value="0">ninguno</option>
                @endif
            </select>
        </div>
        <input type="submit" value="Actualizar">
    </form>
@else
    <h1>Primero ejecute la migración</h1>
@endif
