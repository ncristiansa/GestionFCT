
$(document).ready(function(){
    $('#form-perfil').on('click', 'a.save-record', function(event){
        
        event.preventDefault();
            $.ajax({
                type: $("#form-perfil").attr('method'),
                url: $("#form-perfil").attr('action'),
                dataType: 'json',
                data: $("#form-perfil").first().serialize(),
                success: function(data){
                    actualizarNombre("li a", "#nombre-empresa", "input[name='Empresa']");
                    //$("li a").eq(4).text($("input[name='Empresa']").val());
                    //$("#nombre-empresa").text($("input[name='Empresa']").val());
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
$(document).ready(function(){

    $('#table-empresa').on('click', 'a.delete-record', function(event){
        event.preventDefault();

        $("#form-delete").attr('action', $(this).attr('href'));
        $('#modal-delete').modal("show");
    });
    $("#si-empresa").on("click", function(){
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

