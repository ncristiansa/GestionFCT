$(document).ready(function(){
    $('#table-acuerdo').on('click', 'a.delete-record', function(event){
        event.preventDefault();
        
        $("#modal-acuerdo").attr('action', $(this).attr('href'));
        var idAcuerdo = $("#modal-acuerdo").attr('action');
        var id = idAcuerdo.split("/");
        $("#form-delete-acuerdo").append($("<input>").attr({"type":"hidden", "name":"id-acuerdo", "value":id[4]}));
        $("#form-delete-acuerdo").attr('action', idAcuerdo);
        
        $('#modal-acuerdo').modal("show");
    });
    
    $("#si-seguro-acuerdo").on("click", function(){
        $('#modal-acuerdo').modal("hide");
        $.ajax({
            type: $("#form-delete-acuerdo").attr('method'),
            url: $("#form-delete-acuerdo").attr('action'),
            data: $("#form-delete-acuerdo").serialize(),
            success: function(data){
                if(data.response)
                {
                    $('table tr').each(function(){
                        if($(this).data('id') == data.id)
                        {
                            $(this).fadeOut(); //Con fadeOut lo oculto
                            muestraMensaje("#msg", "alert alert-success","El registro ha sido borrado correctamente.");
                        }
                    }); //recorrerá cada una de las filas y seleccionar la apropiada
                }else{
                    console.log("No se ha borrado");
                }
            },
            error: function(data){
                console.log("Error intentalo más tarde");
                console.log(data);
            }
        });
    });
    
});