$(document).ready(function(){
    $('#table-empresa').on('click', 'a.delete-record', function(event){
        event.preventDefault();

        $("#form-delete").attr('action', $(this).attr('href'));
        $('#modal-delete').show();
    })
});