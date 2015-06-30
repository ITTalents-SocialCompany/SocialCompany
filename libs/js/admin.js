function approve(id){
    $(document).ready(function(){
        $.get('/admin/approveUser/'+id, function(result){
            $("#approve_" + id).hide();
            $("#approve_success_"+id).show();
            $("#delete_user_" + id).show();
            $("#delete_success_"+id).hide();
        });
    });
}

function deleteUser(id){
    $(document).ready(function(){
        $.get('/admin/deleteUser/'+id, function(result){
            $("#delete_user_" + id).hide();
            $("#delete_success_"+id).show();
            $("#approve_" + id).show();
            $("#approve_success_"+id).hide();
        });
    });
}