/**
 * Funciones
 */

function actualizarNombre(_lia, idb, inputNombre)
{
    $(_lia).eq(4).text($(inputNombre).val());
    $(idb).text($(inputNombre).val());
}

function crearInput(tipo, nombre, valor, clase, imagen)
{
    if(clase != undefined && imagen != undefined)
    {
        return $("<input>").append($("<img>").attr({"src":imagen})).attr({"type":tipo, "name":nombre, "value":valor, "class":clase});
    }
    return $("<input>").attr({"type":tipo, "name":nombre, "value":valor});
}
function crearBoton(nombre, icono, clase, enlace, otroAttr, _function)
{
    if(enlace != undefined) 
    {
        return $("<button>").attr({"href":enlace, "name":nombre, "class":clase, "data-id":otroAttr,}).append($("<a>").attr({"href": enlace}).append($("<img>").attr({"src":icono, "class":"img-iconos"})));
    }
    return $("<button>").attr({"name":nombre, "class":clase,"data-id":otroAttr, "onclick":_function, "href":enlace}).append($("<img>").attr({"src":icono, "class":"img-iconos"}));
}
function crearAImg(icono, nombre, clase, funcion, enlace)
{
    if(funcion != undefined)
    {
        return $("<a>").attr({"name": nombre, "class":clase,"onclick": funcion, "href":enlace}).append($("<img>").attr({"class":"img-iconos","src": icono, "width":"16px", "height":"16px"}));
    }
    return $("<a>").attr({"name": nombre, "class":clase, "href":enlace}).append($("<img>").attr({"class":"img-iconos","src": icono, "width":"16px", "height":"16px"}));
}
function nuevoRegistro(data, idtbody, urlD, urlE)
 {
    var trvalores = $("<tr>").attr({"data-id": data.id});
    trvalores.append(crearAImg("/../images/trashcan.svg", "borrar", "btn btn-danger delete-record", undefined, urlD));
    trvalores.append(crearAImg("/../images/eye.svg", "editar", "btn btn-warning", undefined, urlE));
    trvalores.append("<td>"+data.id+"</td>"+
        "<td>"+data.Empresa+"</td>"+
        "<td>"+data.NIF+"</td>");
    $(idtbody).append(trvalores);
 }
function crearFilas(elementoAnterior, consulta,urlDestroy, urlEdit, attrTbody, Rol, tipo)
{   
    var tbody = $("<tbody>").attr({"id":attrTbody});
    for(var datos in consulta)
        {
            var urlD = urlDestroy.replace(':id', consulta[datos]["id"]);
            var urlE = urlEdit.replace(':id', consulta[datos]["id"]);
            var trvalores = $("<tr>").attr({"data-id":consulta[datos]["id"]});   
            var valores = Object.values(consulta[datos]);
            if(Rol == "Tutor")
            {
                if(tipo == "acuerdo")
                {
                    trvalores.append(crearAImg("/../images/eye.svg", "editar", "btn btn-warning", undefined, urlE+"/"+consulta[datos]["id"]));
                }
                if(tipo == "noacuerdo")
                {
                    trvalores.append(crearAImg("/../images/eye.svg", "editar", "btn btn-warning", undefined, urlE));
                }
                //trvalores.append(crearAImg("/../images/trashcan.svg", "borrar", "btn btn-danger delete-record", undefined, urlD));
                
            }else{
                if(tipo == "acuerdo")
                {
                    trvalores.append(crearAImg("/../images/eye.svg", "editar", "btn btn-warning", undefined, urlE+"/"+consulta[datos]["id"]));
                    trvalores.append(crearAImg("/../images/trashcan.svg", "borrar", "btn btn-danger delete-record", undefined, urlD+"/"+consulta[datos]["id"]));
                }
                if(tipo == "noacuerdo")
                {
                    trvalores.append(crearAImg("/../images/eye.svg", "editar", "btn btn-warning", undefined, urlE));
                    trvalores.append(crearAImg("/../images/trashcan.svg", "borrar", "btn btn-danger delete-record", undefined, urlD));
                }
            }
            
            
            for(var valor in valores)
            {   
                trvalores.append(crearTd(valores[valor]));    
            }
            tbody.append(trvalores);
        }
    $(elementoAnterior).append(tbody);
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
function crearTd(texto)
{
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
function muestraMensaje(id, clase, mensaje)
{
    $(id).addClass(clase);
    $(id).append($("<p>").text(mensaje));
    setTimeout(function(){$(id).fadeOut("fast");}, 5000);
}

function crearFormulario(elementoAnterior, Consulta, _action, metodo, boton, id, listaLabels)
{
    if(Consulta != undefined)
    {
        var divGeneral = $("<div>").attr({'class':'container'});
        var formulario = $("<form>").attr({"action":_action, "id":id, "method": metodo});
        var divrow = $("<div>").attr({"class": "form-row"});
        for(var datos in Consulta)
        {
            var ClavesDatos = Object.keys(Consulta[datos]);
            var ValoresDatos = Object.values(Consulta[datos]);
            for(var clave in ClavesDatos)
            {
                if(ClavesDatos[clave] != "id")
                {
                    divrow.append(crearLabelInput(listaLabels[clave], "text", ClavesDatos[clave], ValoresDatos[clave], "disabled"));
                }
                
            }
        }
        formulario.append(divrow);
        if(boton == true)
        {
            formulario.append(crearAImg("/../images/icono-guardar.png", "guardar", "btn btn-success save-record", undefined));
            formulario.append(crearAImg("/../images/pencil.svg", "editar", "btn btn-info", "formEditable('#form-perfil');"));
        }
        divGeneral.append(formulario);
        return $(elementoAnterior).after(divGeneral);
    }
}
function formEditable(idform)
{
    $(idform).find('input[type=text]').removeAttr('disabled');
}
function formNoEditable(idform)
{
    $(idform).find('input[type=text]').attr('disabled', 'disabled');
}
function crearLabelInput(textLabel, typeInput, nameInput, valueInput, estado)
{
    var div = $("<div>").attr({"class":"form-group col-md-6"});
    if(valueInput != undefined)
    {
        div.append($("<label>").text(textLabel));
        div.append($("<input>").attr({"type":typeInput, "name": nameInput, "value": valueInput, "class":"form-control", 'disabled': estado}));
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
