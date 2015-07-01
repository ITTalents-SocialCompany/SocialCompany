function approve(id){
    if (confirm('Are you sure you want to approve this user?')) {
        $(document).ready(function(){
            $.get('/admin/approveUser/'+id, function(result){
                $("#approve_" + id).hide();
                $("#approve_success_"+id).show();
                $("#delete_user_" + id).show();
                $("#delete_success_"+id).hide();
            });
        });
    }
}

function deleteUser(id){
    if (confirm('Are you sure you want to delete this user?')) {
        $(document).ready(function(){
            $.get('/admin/deleteUser/'+id, function(result){
                $("#delete_user_" + id).hide();
                $("#delete_success_"+id).show();
                $("#approve_" + id).show();
                $("#approve_success_"+id).hide();
            });
        });
    }
}

function makeAdmin(id){
    if (confirm('Are you sure you want to make this user admin?')) {
        $(document).ready(function(){
            $.get('/admin/makeAdmin/'+id, function(result){
                $("#admin_user_" + id).hide();
                $("#is_admin_"+id).show();
            });
        });
    }
}