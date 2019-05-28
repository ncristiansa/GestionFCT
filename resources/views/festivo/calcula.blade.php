@extends('layouts/general')
@section('pageTitle', 'Calcula tus horas')
@section('content')
<h1>Calcula horas</h1>
<div class="container">
    {!! Form::open(['id' => 'form-calcula', 'method' => 'POST']) !!}
    <div class="form-row">
        <div class="form-group col-md-12">
            <h5>Fechas</h5>
        </div>
        <div class="form-group col-md-4">
            <label>Fecha inicial</label>
            <input class="form-control" type="date" id="fechainicio" name="fechainicio">
        </div>
        <div class="form-group col-md-4">
            <label>Fecha fin</label>
            <input class="form-control" type="date" id="fechafin" name="fechafin">
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
    <input type="submit" name="enviar" value="Calcular">
    {!! Form::close() !!}
    <?php
        $tablaFestivo = DB::select('select Fecha, Tipo from festivos');
        $festivos = json_decode(json_encode($tablaFestivo), True);
        $arrayfestivo = [];
        foreach ($festivos as $value) {
            $fechasep = explode("-", $value["Fecha"]);
            array_push($arrayfestivo, $fechasep);
        }
        //Mes $arrayfestivo[0][1]
        //Dia $arrayfestivo[0][2]      
        
        if(isset($_POST["enviar"]))
        {
            $fechainicio = $_POST["fechainicio"];
            $fechafin = $_POST["fechafin"];
            $hora_lunes = $_POST['hlunes'];
            $hora_martes = $_POST['hmartes'];
            $hora_miercoles = $_POST['hmiercoles'];
            $hora_jueves = $_POST['hjueves'];
            $hora_viernes = $_POST['hviernes'];

            $fecha1 = strtotime($fechainicio); 
            $fecha2 = strtotime($fechafin); 
            $total = 0;
            $tiempo = 0;
            $contadorfiesta = 0;
            $fechaf = strtotime("2019-01-01");
            $contadorf= 0;
            
            for($fecha1;$fecha1<=$fecha2;$fecha1=strtotime('+1 day ' . date('Y-m-d',$fecha1))){
                if((strcmp(date('D',$fecha1),'Sun')!=0) && (strcmp(date('D',$fecha1),'Sat')!=0)){                    
                    $total=$total+1;
                    $horashechas = 0;
                    if((strcmp(date('D',$fecha1),'Mon')!=1)){
                        $horashechas=+$hora_lunes;
                    }
                    if((strcmp(date('D',$fecha1),'Tue')!=1)){
                        $horashechas=$tiempo+$hora_martes;
                    }
                    if((strcmp(date('D',$fecha1),'Wed')!=1)){
                        $horashechas=$tiempo+$hora_miercoles;   
                    }
                    if((strcmp(date('D',$fecha1),'Thu')!=1)){
                        $horashechas=$tiempo+$hora_jueves;
                    }
                    if((strcmp(date('D',$fecha1),'Fri')!=1)){
                        $horashechas=$tiempo+$hora_viernes;
                    }
                }
                
                $tiempo=$horashechas;
                $contadorfiesta=$contadorf;

            }
            echo '<p> Resultado: '.$tiempo." hores.<br>\n
            Finaliza: ".$fechafin." ( hores)</p>";
            $fechainicio = $_POST["fechainicio"];
            $fechafin = 0;
            $hora_lunes = 0;
            $hora_martes = 0;
            $hora_miercoles =0;
            $hora_jueves = 0;
            $hora_viernes = 0;
        }
    ?>
<script type="text/javascript">
	

    /*
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
    */
</script>
@stop