/**
 * Funciones
 */
function crearFilas(elementoAnterior, consulta, enlace, botones)
{   
    var elementoPadre = $(elementoAnterior);
    for(var datos in consulta)
    {
        var trvalores = $("<tr>");
        var valores = Object.values(consulta[datos]);
        for(var valor in valores)
        {
            if(botones == true)
            {
                
            }
            trvalores.append(crearTd(valores[valor], undefined, enlace+consulta[datos]["id"]))
        }
    }
    return elementoPadre.append(trvalores);

}
function crearTabla(elementoAnterior, tableClass, theadClass, Consulta, enlace)
{
    if(Consulta.length <= 0)
    {
        var mensaje = $("<div>").attr({"class":"alert alert-warning", "role":"alert"}).append($("<p>").text("No se han encontrado registros."));
        $(elementoAnterior).after(mensaje);
    }
    var divTabla = $("<div>").addClass("table-responsive");
    var elementoPadre = $(elementoAnterior);
    var tabla = $("<table>").addClass(tableClass);
    var thead = $("<thead>").addClass(theadClass);
    var tbody = $("<tbody>");
    var trtitulos = $("<tr>");
    if(Consulta instanceof Array)
    {
        for(var datos in Consulta)
        {
            var trvalores = $("<tr>");
            var Claves = Object.keys(Consulta[datos]);
            var Valores = Object.values(Consulta[datos]);
            for(var valor in Valores)
            {
                trvalores.append(crearTd(Valores[valor], undefined, enlace+Consulta[datos]["id"]));
            }
            tbody.append(trvalores);
            thead.append(trtitulos);
        }
        for(var clave in Claves)
        {
            trtitulos.append(crearTh(Claves[clave], "scope"));
        }
        tabla.append(thead);
        tabla.append(tbody);
        divTabla.append(tabla);
        return elementoPadre.append(divTabla);
        
    }
}
function crearTd(texto, attr, url, agregarBoton)
{
    if(attr != undefined)
    {
        if(agregarBoton == true)
        {
            return $("<td>").text(texto).attr(attr);
        }else{
            return $("<td>").text(texto).attr(attr);
        }
        
    }
    if(url != undefined)
    {
        return $("<td>").append($("<a>").text(texto).attr({'href': url}));
    }
    return $("<td>").text(texto);
}
function crearTh(texto, attrscope)
{
    if(attrscope != undefined)
    {
        return $("<th>").text(texto).attr("scope", attrscope);
    }
    return $("<th>").text(texto);
}
function mensajeError(situado, mensaje)
{
    return $(situado).after($("<div>").attr({"class": "alert alert-danger", "role":"alert"}).append("<p>").text(mensaje));
}
function crearFormulario(elementoAnterior, Consulta, _action, metodo, boton)
{
    if(Consulta != undefined)
    {
        if(Consulta instanceof Array)
        {
            var divGeneral = $("<div>").attr({'class':'container'});
            console.log("Es una array");
            var formulario = $("<form>").attr({"action":_action});
            var divrow = $("<div>").attr({"class": "form-row"});
            console.log(Consulta);
            for(var datos in Consulta)
            {
                var ClavesDatos = Object.keys(Consulta[datos]);
                var ValoresDatos = Object.values(Consulta[datos]);
                for(var clave in ClavesDatos)
                {
                    divrow.append(crearLabelInput(ClavesDatos[clave], "text", ClavesDatos[clave], ValoresDatos[clave]));
                    crearInput("button", "eliminar", undefined, "btn btn-danger", "{{URL::asset('images/trashcan.svg')}}");
                }
            }
            formulario.append(divrow);
            if(boton == true)
            {
                formulario.append(crearInput("submit", "enviar", "Agregar", "btn btn-success"));
            }
            divGeneral.append(formulario);
            return $(elementoAnterior).after(divGeneral);
        }
    }
}
function crearLabelInput(textLabel, typeInput, nameInput, valueInput)
{
    var div = $("<div>").attr({"class":"form-group col-md-6"});
    if(valueInput != undefined)
    {
        div.append($("<label>").text(textLabel));
        div.append($("<input>").attr({"type":typeInput, "name": nameInput, "value": valueInput, "class":"form-control"}));
        return div;
    }
    div.append($("<label>").text(textLabel));
    div.append($("<input>").attr({"type":typeInput, "name": nameInput, "class":"form-control"}));
    return div;
}
function crearLabel(texto, clase)
{
    if(clase != undefined)
    {
        return $("<label>").text(texto).attr("class", clase);
    }
    return $("<div>").attr({"class":"form-group col-md-6"}).append($("<label>").text(texto));
}
function crearInput(tipo, nombre, valor, clase, enlaceimagen)
{
    if(clase != undefined && imagen != undefined)
    {
        return $("<input>").append($("<img>").attr({"src":enlaceimagen})).attr({"type":tipo, "name":nombre, "value":valor, "class":clase});
    }
    return $("<input>").attr({"type":tipo, "name":nombre, "value":valor});
}