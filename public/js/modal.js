$(document).ready(function(){
    $('#form-perfil').on('click', 'a.save-record', function(event){
        event.preventDefault();
        $.ajax({
            type: $("#form-perfil").attr('method'),
            url: $("#form-perfil").attr('action'),
            dataType: 'json',
            data: $("#form-perfil").first().serialize(),
            success: function(data){
                formNoEditable("#form-perfil");
                muestraMensaje("#mensaje", "alert alert-success","Los datos han sido editados correctamente.");
            },
            error: function(data){
                var errores = data.responseJSON;
                if(errores)
                {
                    $.each(errores, function(i){
                        console.log(errores[i]);
                    })
                }
            }
        })
    });
});
$(document).ready(function(){
    $('#table-empresa').on('click', 'a.delete-record', function(event){
        event.preventDefault();

        $("#form-delete").attr('action', $(this).attr('href'));
        $('#modal-delete').modal("show");
    });
    $("#si-seguro").on("click", function(){
        $('#modal-delete').modal("hide");
        $.ajax({
            type: $("#form-delete").attr('method'),
            url: $("#form-delete").attr('action'),
            data: $("#form-delete").serialize(),
            success: function(data){
                if(data.response)
                {
                    $('table tr').each(function(){
                        if($(this).data('id') == data.id)
                        {
                            $(this).fadeOut(); //Con fadeOut lo oculto
                        }
                    }); //recorrerá cada una de las filas y seleccionar la apropiada
                    //toastr.success(data.message);
                    console.log("Borrado correctamente")
                }else{
                    //toastr.error(data.message);
                    console.log("No se ha borrado");
                }
            },
            error: function(data){
                console.log("Error intentalo más tarde");
                console.log(data);
                //toastr.error('Error, intentalo más tarde');
            }
        });
    });
});
