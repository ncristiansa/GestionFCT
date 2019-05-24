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
            <input class="form-control" type="number" name="hlunes" value="4">
        </div>
        <div class="form-group col-md-2">
            <label>Martes</label>
            <input class="form-control" type="number" name="hmartes" value="4">
        </div>
        <div class="form-group col-md-2">
            <label>Miercoles</label>
            <input class="form-control" type="number" name="hmiercoles" value="4">
        </div>
        <div class="form-group col-md-2">
            <label>Jueves</label>
            <input class="form-control" type="number" name="hjueves" value="4">
        </div>
        <div class="form-group col-md-2">
            <label>Viernes</label>
            <input class="form-control" type="number" name="hviernes" value="4">
        </div>         
    </div>
    <input type="submit" name="enviar" value="Calcular">
    {!! Form::close() !!}
    <?php
        $tablaFestivo = DB::select('select Fecha, Tipo from festivos');
        $festivos = json_decode(json_encode($tablaFestivo), True);
        foreach ($festivos as $value) {
            print_r($value["Fecha"]);
        }
        function esFestivo($fechainicio, $fechafin)
        {
            $festivos = array(
                '01-01',  //  Año Nuevo (irrenunciable)
                '10-04',  //  Viernes Santo (feriado religioso)
                '11-04',  //  Sábado Santo (feriado religioso)
                '01-05',  //  Día Nacional del Trabajo (irrenunciable)
                '21-05',  //  Día de las Glorias Navales
                '29-06',  //  San Pedro y San Pablo (feriado religioso)
                '16-07',  //  Virgen del Carmen (feriado religioso)
                '15-08',  //  Asunción de la Virgen (feriado religioso)
                '18-09',  //  Día de la Independencia (irrenunciable)
                '19-09',  //  Día de las Glorias del Ejército
                '12-10',  //  Aniversario del Descubrimiento de América
                '31-10',  //  Día Nacional de las Iglesias Evangélicas y Protestantes (feriado religioso)
                '01-11',  //  Día de Todos los Santos (feriado religioso)
                '08-12',  //  Inmaculada Concepción de la Virgen (feriado religioso)
                '13-12',  //  elecciones presidencial y parlamentarias (puede que se traslade al domingo 13)
                '25-12',  //  Natividad del Señor (feriado religioso) (irrenunciable)
            );
            $fechaInicio = new DateTime($fechainicio);
            $fechaFin = new DateTime($fechafin);
        }
        
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
            esFestivo($fechainicio, $fechafin);
            for($fecha1;$fecha1<=$fecha2;$fecha1=strtotime('+1 day ' . date('Y-m-d',$fecha1))){
                if((strcmp(date('D',$fecha1),'Sun')!=0) && (strcmp(date('D',$fecha1),'Sat')!=0)){                    
                    $total=$total+1;
                    $horashechas = 0;
                    if((strcmp(date('M', $fecha1), 'Jan ')!=1))
                    {
                        echo "Es enero";
                    }
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

            }
            $horadia = $tiempo/24;
            $horames = $tiempo/730.001;
            $horaeje=3;
            echo "<p> Días: ".$total."</p>";
            echo '<p> Resultado: '.$tiempo." hores.<br>\n
            Finaliza: ".$fechafin." (".$horaeje." hores)</p>";
            echo '<p> Horas a dias '.round($horadia, 0)."</p>";
            echo '<p> Horas a mes '.round($horames,1)."</p>";
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