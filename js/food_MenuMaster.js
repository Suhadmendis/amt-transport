function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
// Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function keyset(key, e) {

    if (e.keyCode == 13) {
        document.getElementById(key).focus();
    }
}

function got_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000066";
}

function lost_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000000";
}

function newent() {

    document.getElementById('itemCodeTxt').value = "";
    document.getElementById('itemDescripTxt').value = "";
    document.getElementById('breakFastCheck').checked = false;
    document.getElementById('dinnerCheck').checked = false;
    document.getElementById('lunchCheck').checked = false;
    document.getElementById('tPCCheck').checked = false;
    document.getElementById('sandwhicsCheck').checked = false;
    document.getElementById('SpecialDishesCheck').checked = false;
    document.getElementById('cakepcsCheck').checked = false;
    document.getElementById('snackCheck').checked = false;
    document.getElementById('dessertCheck').checked = false;
    document.getElementById('juiceCheck').checked = false;
    document.getElementById('otherCheck').checked = false;
    document.getElementById('Standard_BreakFast').checked = false;
    document.getElementById('Standard_Dinner').checked = false;
    document.getElementById('Standard_Lunch').checked = false;

    document.getElementById('amountTxt').value = "";


    getdt();

}


function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "food_MenuMaster_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";
    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}


function assign_dt() {
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        document.form1.itemCodeTxt.value = XMLAddress1[0].childNodes[0].nodeValue;
    }
}







