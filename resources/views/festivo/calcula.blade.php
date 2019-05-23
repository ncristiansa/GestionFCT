@extends('layouts/general')
@section('pageTitle', 'Calcula tus horas')
@section('content')
<h1>Calcula horas</h1>
<div class="container">
    <form id="calculadora">
    <div class="form-row">
        <div class="form-group col-md-12">
            <h5>Fechas</h5>
        </div>
        <div class="form-group col-md-4">
            <label>Fecha inicial</label>
            <input class="form-control" type="date" name="fechainicio">
        </div>
        <div class="form-group col-md-4">
            <label>Fecha fin</label>
            <input class="form-control" type="date" name="fechafin">
        </div> 
        <div class="form-group col-md-2">
            <label>Horas del acuerdo</label>
            <input class="form-control" type="text" name="acabada" placeholder="350">
        </div>
        <div class="form-group col-md-12">
        	<h5>Horas</h5>
        </div>
        <div class="form-group col-md-2">
            <label>Lunes</label>
            <input class="form-control" type="number" name="hlunes">
        </div>
        <div class="form-group col-md-2">
            <label>Martes</label>
            <input class="form-control" type="number" name="hmartes">
        </div>
        <div class="form-group col-md-2">
            <label>Miercoles</label>
            <input class="form-control" type="number" name="hmiercoles">
        </div>
        <div class="form-group col-md-2">
            <label>Jueves</label>
            <input class="form-control" type="number" name="hjueves">
        </div>
        <div class="form-group col-md-2">
            <label>Viernes</label>
            <input class="form-control" type="number" name="hviernes">
        </div>
             
    </div>
    <form>
	<a class="btn btn-info calcula-horas" id="calcula-horas"><img width="25" height="25" class="img-iconos" src="{{URL::asset('images/calculator.png')}}"></a>
    <p id="resultado"></p>

<script type="text/javascript">
	var Festivos= {!! json_encode($festivo->toArray(), JSON_HEX_TAG) !!};
    
    function calculaDias(fechainicio, fechafin)
    {
        var fechaInicio = new Date(fechainicio).getTime();
        var fechaFin    = new Date(fechafin).getTime();
        var diff = fechaFin - fechaInicio;
        return diff/(1000*60*60*24)-8;
    }
    $(document).on('click', 'a.calcula-horas', function(){
        var fechainicio = $("input[name='fechainicio']").val();
        var fechafin = $("input[name='fechafin'").val();
        $("#resultado").text(calculaDias(fechainicio, fechafin));
    });
    function esFestivo(fecha, Festivos, tipos)
    {
        var fecha_recibida = fecha.split("-");
        var mes = fecha_recibida[1];
        var dia = fecha_recibida[2];
        
    	for(var posicion in Festivos)
    	{
    		var fechas = Festivos[posicion]["Fecha"].split("-");
    		// fecha[0] devuelve Año
    		// fecha[1] devuelve Mes
            // fecha[2] devuelve Día
            var Valores = Object.values(Festivos[posicion]);
            var num = 0;
            if(fechas[1] == mes && fechas[2] == dia && Valores[2] === tipos)
            {
                num=num+1
                console.log(num);
                //return true   
            }
            
            
    	}
    }	
</script>
@stop