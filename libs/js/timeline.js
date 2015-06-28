var count = getAllPosts(0);

function getAllPosts(count) {
    id = document.getElementById("id").value;
    var xhr = new XMLHttpRequest();
    var url = "http://socialcompany/profile/timelineAjax/"+id+"/" + count;
    console.log(url);
    xhr.open("GET",url, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if(xhr.responseText !== ""){
                document.getElementById("posts").innerHTML += xhr.responseText;
            }
        }
    };
    xhr.send(null);
    return count+2;
}

$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() > $(document).height() - 20) {
        count = getAllPosts(count);
    }
});