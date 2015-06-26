function approve(id){
    var xhr = new XMLHttpRequest();
    var url = "http://socialcompany/admin/approveUser/"+ id;

    xhr.open("GET",url, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("approve_" + id).className += " disabled";
        }
    };
    xhr.send(null);
}

function deleteUser(id){
    var xhr = new XMLHttpRequest();
    var url = "http://socialcompany/admin/deleteUser/"+ id;

    xhr.open("GET",url, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("delete_user_" + id).className += " disabled";
        }
    };
    xhr.send(null);
}