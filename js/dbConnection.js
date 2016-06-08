
function getEvents(calendar, callbackFunc){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "php/getEvents.php?calendar="+calendar, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var response = xhttp.responseText;
            callbackFunc(response);
        }
    }
}