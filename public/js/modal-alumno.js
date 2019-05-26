$(document).ready(function(){
    $('#table-alumno').on('click', 'a.delete-record', function(event){
        event.preventDefault();

        $("#form-delete-alumno").attr('action', $(this).attr('href'));
        $('#modal-delete-alumno').modal("show");
    });
    $("#si-alumno").on("click", function(){
        $('#modal-delete-alumno').modal("hide");
        $.ajax({
            type: $("#form-delete-alumno").attr('method'),
            url: $("#form-delete-alumno").attr('action'),
            data: $("#form-delete-alumno").serialize(),
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
        actualizarNombre("li a", "#nombre-alumno", "input[name='Nombre']");
            $.ajax({
                type: $("#form-perfil").attr('method'),
                url: $("#form-perfil").attr('action'),
                dataType: 'json',
                data: $("#form-perfil").first().serialize(),
                success: function(data){
                    
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