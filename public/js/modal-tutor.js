$(document).ready(function(){
    $('#table-tutor').on('click', 'a.delete-record', function(event){
        event.preventDefault();

        $("#form-delete-tutor").attr('action', $(this).attr('href'));
        $('#modal-delete-tutor').modal("show");
    });
    $("#si-tutor").on("click", function(){
        $('#modal-delete-tutor').modal("hide");
        $.ajax({
            type: $("#form-delete-tutor").attr('method'),
            url: $("#form-delete-tutor").attr('action'),
            data: $("#form-delete-tutor").serialize(),
            success: function(data){
                if(data.response)
                {
                    $('table tr').each(function(){
                        if($(this).data('id') == data.id)
                        {
                            $(this).fadeOut(); //Con fadeOut lo oculto
                            muestraMensaje("#mensaje", "alert alert-success","El registro ha sido borrado correctamente.");
                        }
                    }); //recorrerá cada una de las filas y seleccionar la apropiada
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
$(document).ready(function(){
    $('#form-perfil').on('click', 'a.save-record', function(event){
        event.preventDefault();
            $.ajax({
                type: $("#form-perfil").attr('method'),
                url: $("#form-perfil").attr('action'),
                dataType: 'json',
                data: $("#form-perfil").first().serialize(),
                success: function(data){
                    actualizarNombre("li a", "#nombre-tutor", "input[name='Nombre']");
                    
                    formNoEditable("#form-perfil");
                    muestraMensaje("#mensaje", "alert alert-success","El registro ha sido editado correctamente.");
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