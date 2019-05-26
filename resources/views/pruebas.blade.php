@extends('layouts/general')
@section('pageTitle', 'Empresa')
@section('content')
<h1>Pruebas</h1>
<script>
    var infoEmpresa = {!! json_encode($empresa->toArray(), JSON_HEX_TAG) !!};
    var url = '{{route("empresa.destroy", ":id")}}';
    function AImg(situado, Consulta, enlace, clase, img, url)
    {
        for(var datos in Consulta)
        {
            var Claves = Object.keys(Consulta[datos]);
            var Valores = Object.values(Consulta[datos]);
            
            var urln = url.replace(':id', Consulta[datos]["id"]);
            console.log(urln);
            return $(situado).after($("<a>").attr({"class":"btn btn-danger delete-record", "href":urln}).append($("<img>").attr({"src":"../images/trashcan.svg", "class": "img-iconos"})))
        }   
        
    }
    AImg("h1", infoEmpresa, "#", "#", "#", url);
</script>
@stop