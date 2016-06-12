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

function postEvent(calendar, eventID, start, end, title, callbackFunc){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "php/postEvents.php?calendar="+calendar+"&ID="+eventID+"&start="+start+"&end="+end+"&title="+title, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var response = xhttp.responseText;
            callbackFunc(response);
        }
    }
}

function deleteEvent(calendar, eventID, callbackFunc){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "php/deleteEvents.php?calendar="+calendar+"&ID="+eventID, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var response = xhttp.responseText;
            callbackFunc(response);
        }
    }
}

function getServices(callbackFunc){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "php/getServices.php", true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var response = xhttp.responseText;
            callbackFunc(response);
        }
    }
}