
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
    
    document.getElementById('cleaner_ref_Text').value = "";
    document.getElementById('cleaner_nic_Text').value = "";
    document.getElementById('cleaner_number_Text').value = "";
    document.getElementById('cleaner_name').value = "";
    getdt();
}
function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "cleaner_master_data.php";
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
      XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cleaner_ref_Text");
      document.getElementById('cleaner_ref_Text').value = XMLAddress1[0].childNodes[0].nodeValue;
    
//      XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("uniq");
//      document.form1.uniq.value = XMLAddress1[0].childNodes[0].nodeValue;
    }
}

function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('cleaner_ref_Text').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Cleaner Ref Not Enterd</span></div>";
        $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        return false;
    }
    if (document.getElementById('cleaner_nic_Text').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Cleaner NIC Not Enterd</span></div>";
        $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        return false;
    }
    if (document.getElementById('cleaner_name').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Cleaner Name Not Enterd</span></div>";
        $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        return false;
    }
    
    var url =  "cleaner_master_data.php";
    url = url + "?Command=" + "save_item";
    
    url = url + "&cleaner_ref=" + document.getElementById('cleaner_ref_Text').value;
    url = url + "&cleaner_nic=" + document.getElementById('cleaner_nic_Text').value;
    url = url + "&cleaner_number=" + document.getElementById('cleaner_number_Text').value;
    url = url + "&cleaner_name=" + document.getElementById('cleaner_name').value;
  
    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

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