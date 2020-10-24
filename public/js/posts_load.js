var i = 0;
var ok = 0;
var element = document.getElementById("loaded_content");

function loadXMLDoc(i) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
            if (xmlhttp.status == 200) {
                if (xmlhttp.responseText) {
                    element.innerHTML += xmlhttp.responseText;
                    i += 6;
                }
            } 
        }
    };

    xmlhttp.open("GET", "http://46.101.187.161/camagru/posts/getposts?offset=" + i + "&limit=6", true);
    xmlhttp.send();
}

document.addEventListener('scroll', function () {
    if (window.scrollY >= document.body.clientHeight - window.innerHeight) {
        if (ok == 0) {
            i += 6;
            loadXMLDoc(i);
        }

    }
}, false);
loadXMLDoc(i);