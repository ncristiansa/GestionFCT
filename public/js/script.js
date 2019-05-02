/**
 * Funciones
 */

function crearTabla(elementoAnterior, tableClass, theadClass, Consulta)
{
    console.log(Consulta);
    var divTabla = $("<div>").addClass("table-responsive");
    var elementoPadre = $(elementoAnterior);
    var tabla = $("<table>").addClass(tableClass);
    var thead = $("<thead>").addClass(theadClass);
    var tbody = $("<tbody>");
    if(Consulta instanceof Array)
    {
        for(var datos in Consulta)
        {
            var ClavesDatos = Object.keys(Consulta[datos]);
            var ValoresDatos = Object.values(Consulta[datos]);
            for(var valores in ValoresDatos)
            {
               //var link = $("<a>").attr("href", "/empresa/"+Consulta[datos]["id"]);
                //
                tbody.append(crearTd(ValoresDatos[valores], undefined, Consulta[datos]["id"]));
            }
            for(var clave in ClavesDatos)
            {
                var tituloTh = crearTh(ClavesDatos[clave], "col");
                thead.append(tituloTh);
            }
        }
        tabla.append(thead);
        tabla.append(tbody);
        divTabla.append(tabla);
        elementoPadre.after(divTabla);
    }
}
function crearTd(texto, attr, enlace)
{
    if(attr != undefined)
    {
        return $("<td>").text(texto).attr(attr);
    }
    if(enlace != undefined)
    {
        return $("<a>").attr("href", enlace).append($("<td>").text(texto));
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