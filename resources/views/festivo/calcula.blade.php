@extends('layouts/general')
@section('pageTitle', 'Calcula tus horas')
@section('content')
<h1>Calcula horas</h1>
<div class="container">
    {!! Form::open(['id' => 'form-add-acuerdo', 'method' => 'POST']) !!}
    <div class="form-row">
    
        <div class="form-group col-md-4">
            <label>Fecha inicial</label>
            <input class="form-control" type="date" name="fecha_alta">
        </div>
        <div class="form-group col-md-4">
            <label>Fecha fin</label>
            <input class="form-control" type="date" name="fin">
        </div> 
        <div class="form-group col-md-2">
            <label>Horas del acuerdo</label>
            <input class="form-control" type="text" name="acabada" placeholder="350">
        </div>
        <div class="form-group col-md-12">
        	<h3>Horas</h3>
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
	<a class="btn btn-info calcula-horas" id="calcula-horas"><img width="25" height="25" class="img-iconos" src="{{URL::asset('images/calculator.png')}}"></a>  
    {!! Form::close() !!}
@stop
<script type="text/javascript">
	var Festivos= {!! json_encode($festivo->toArray(), JSON_HEX_TAG) !!};
    
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
            var tipo = Festivos[posicion]["Tipo"].split(" ");
            console.log(tipo[0])
            
            
            if(tipo[0] == tipos){
                console.log("Festivo / Local");
            }else{
                console.log("no")
            }
            

    	}
    }
    var fecha = "2019-06-10";
    esFestivo(fecha, Festivos, "local")
    /*
    if(esFestivo(fecha, Festivos, "festivo local")){
        console.log("Es festivo");
    }else{
        console.log("No es festivo");
    }
    */

	
</script>