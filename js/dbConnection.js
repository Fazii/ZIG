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
function postServiceCategory(id, categoryName, callbackFunc){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "php/postServiceCategory.php?ID="+id+"&categoryName="+categoryName, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var response = xhttp.responseText;
            callbackFunc(response);
        }
    }
}
function postServiceElement(id, elementName, cena, categoryID, callbackFunc){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "php/postServiceElement.php?ID="+id+"&elementName="+elementName+"&cena="+cena+"&categoryID="+categoryID, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var response = xhttp.responseText;
            callbackFunc(response);
        }
    }
}
function deleteServiceCategory(id, callbackFunc){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "php/deleteServiceCategory.php?ID="+id, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var response = xhttp.responseText;
            callbackFunc(response);
        }
    }
}