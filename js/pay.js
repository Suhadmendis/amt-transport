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
   
    document.getElementById('pay_ref').value = ""; 
    document.getElementById('driver_ref').value = "";
    document.getElementById('driver_name').value = "";
    document.getElementById('amount').value = "";
    document.getElementById('pdate').value = "";
    document.getElementById('uniq').value = "";
    document.getElementById('msg_box').innerHTML = "";
   


    getdt();
}


function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "pay_data.php";
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

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        document.getElementById('pay_ref').value = XMLAddress1[0].childNodes[0].nodeValue;
//
         XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("uniq");
        document.getElementById('uniq').value = XMLAddress1[0].childNodes[0].nodeValue;
    }
}

function save_inv()
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "pay_data.php";
    url = url + "?Command=" + "save_item";
    url = url + "&pay_ref=" + document.getElementById("pay_ref").value;

    url = url + "&pdate=" + document.getElementById('pdate').value;
    url = url + "&driver_ref=" + document.getElementById('driver_ref').value;
    url = url + "&amount=" + parseInt(document.getElementById("amount").value || 0);

    url = url + "&user=" + document.getElementById('user').value;
    
     if (document.getElementById('pay_ref').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Pay Ref Not Entered</span></div>";
        $("#msg_box").hide().slideDown(400).delay(2000);
        $("#msg_box").slideUp(400);
        return false;
    }

    if (document.getElementById('pdate').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Date Not Selected</span></div>";
        $("#msg_box").hide().slideDown(400).delay(2000);
        $("#msg_box").slideUp(400);
        return false;
    }

    if (document.getElementById('driver_ref').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Driver Ref Not Selected</span></div>";
        $("#msg_box").hide().slideDown(400).delay(2000);
        $("#msg_box").slideUp(400);
        return false;
    }

   
    if (document.getElementById('driver_name').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Driver Name Not Selected</span></div>";
        $("#msg_box").hide().slideDown(400).delay(2000);
        $("#msg_box").slideUp(400);
        return false;
    }

    if (document.getElementById('amount').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Amount Not Entered</span></div>";
        $("#msg_box").hide().slideDown(400).delay(2000);
        $("#msg_box").slideUp(400);
        return false;
    }
 

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
        }
    }
}


function edit() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    if (document.getElementById('cid').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>pay_ref no.  Not Entered</span></div>";
        return false;
    }

    var url = "customer_data.php";
    url = url + "?Command=" + "update";

    url = url + "&cid=" + document.getElementById('cid').value;
    url = url + "&name=" + document.getElementById('name').value;
    url = url + "&address=" + document.getElementById('address').value;
    url = url + "&dob=" + document.getElementById('dob').value;




    xmlHttp.onreadystatechange = update;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function update() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "update") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Updated</span></div>";

        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}


function delete1() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    if (document.getElementById('pay_ref').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>pay_ref no.  Not Entered</span></div>";
        return false;
    }

    var url = "pay_data.php";
    url = url + "?Command=" + "delete";

    url = url + "&pay_ref=" + document.getElementById('pay_ref').value;

    xmlHttp.onreadystatechange = delete2;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function delete2() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "delete") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>Deleted</span></div>";

        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}








