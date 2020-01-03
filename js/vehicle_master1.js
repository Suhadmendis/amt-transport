
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
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    
    document.getElementById('vehicle_ref_Text').value = "";
    document.getElementById('department_Text').value = "";
    document.getElementById('vehicle_type_Text').value = "";
    document.getElementById('fuel_type_Text').value = "";
    document.getElementById('vehicle_number').value = "";
    document.getElementById('msg_box').innerHTML  = "";
    getdt();
}
function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "vehicle_master_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function assign_dt() {
     var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
      XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("reference_no");
      document.getElementById('vehicle_ref_Text').value = XMLAddress1[0].childNodes[0].nodeValue;
    
      XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("uniq");
      document.form1.uniq.value = XMLAddress1[0].childNodes[0].nodeValue;
}
}

function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('vehicle_ref_Text').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Vehicle Ref Not Enterd</span></div>";
       $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        return false;
    }
    if (document.getElementById('department_Text').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Department Not Enterd</span></div>";
        $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        return false;
    }
    if (document.getElementById('vehicle_type_Text').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Vehicle Type  Not Enterd</span></div>";
        $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        return false;
    }
    if (document.getElementById('vehicle_number').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Vehicle No Not Enterd</span></div>";
        $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        return false;
    }
    if (document.getElementById('fuel_type_Text').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Fuel Type Not Enterd</span></div>";
        $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        return false;
    }

    var url =  "vehicle_master_data.php";
    url = url + "?Command=" + "save_item";
    
    url = url + "&vehicle_ref=" + document.getElementById('vehicle_ref_Text').value;
    url = url + "&department=" + document.getElementById('department_Text').value;
    url = url + "&vehicle_number=" + document.getElementById('vehicle_number').value;
    url = url + "&vehicle_type=" + document.getElementById('vehicle_type_Text').value;
    url = url + "&fuel_type=" + document.getElementById('fuel_type_Text').value;
  
    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function delete1() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    if (document.getElementById('vehicle_ref_Text').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>Vehicle Name  Not Entered</span></div>";
        return false;
    }

    var url = "vehicle_master_data.php";
    url = url + "?Command=" + "delete";

    url = url + "&vehicle_ref=" + document.getElementById('vehicle_ref_Text').value;

    xmlHttp.onreadystatechange = delete2;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}
function delete2() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "delete") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>Deleted</span></div>";
            $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}

function salessaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
            $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
            $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        }
    }
  }