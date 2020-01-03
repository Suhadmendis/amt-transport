// alert("fds");
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
    document.getElementById('trip_ref').value = "";
    document.getElementById('vehicle_ref').value = "";
    document.getElementById('date').value = "";
    document.getElementById('opening_km').value = "";
    document.getElementById('closing_km').value = "";
    document.getElementById('normal').checked = true;
    document.getElementById('mileage').value = "";
    document.getElementById('item_ref').value = "";
    document.getElementById('item_name').value = "";
    document.getElementById('department').value = "";
    document.getElementById('run_no').value = "";
    document.getElementById('driver_salary').value = "";
    document.getElementById('driver_salary').disabled = true;
    document.getElementById('cleaner_salary').disabled = true;

    getdt();
}


function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "trip_data.php";
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

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("trip_ref");
        document.getElementById('trip_ref').value = XMLAddress1[0].childNodes[0].nodeValue;
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
    
    if (document.getElementById('trip_ref').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Trip Ref No. Not Enterd</span></div>";
        return false;
    }
    
    if (document.getElementById('date').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Date Not Enterd</span></div>";
        return false;
    }
    
    if (document.getElementById('run_no').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Run No. Not Enterd</span></div>";
        return false;
    }
    
    if (document.getElementById('driver_ref').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Driver Ref No. Not Enterd</span></div>";
        return false;
    }
    
    if (document.getElementById('item_ref').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Ref No. Not Enterd</span></div>";
        return false;
    }
    
    if (document.getElementById('vehicle_ref').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Vehicle Ref No. Not Enterd</span></div>";
        return false;
    }
    
    if (document.getElementById('opening_km').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Opening KM Not Enterd</span></div>";
        return false;
    }
    
    if (document.getElementById('amount').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Amount Not Enterd</span></div>";
        return false;
    }
    
     if (document.getElementById('closing_km').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Closing KM Not Enterd</span></div>";
        return false;
    }
    
     if (document.getElementById('driver_salary').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Driver Salary  Not Enterd</span></div>";
        return false;
    }
    
     if (document.getElementById('department').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Department Not Enterd</span></div>";
        return false;
    }
    
     if (document.getElementById('mileage').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Milage Not Enterd</span></div>";
        return false;
    }
    
    var daypay = "";
    if (document.getElementById("daypay").checked) {
        daypay = "DP";
    }else{
        daypay = "NL";
    }
    var url = "trip_data.php";
    url = url + "?Command=" + "save_item";
    url = url + "&item_ref=" + document.getElementById("item_ref").value;
    url = url + "&item_name=" + document.getElementById("item_name").value;

    url = url + "&trip_ref=" + document.getElementById('trip_ref').value;
    url = url + "&vehicle_ref=" + document.getElementById('vehicle_ref').value;
    url = url + "&date=" + document.getElementById('date').value;
    url = url + "&driver_ref=" + document.getElementById('driver_ref').value;
    url = url + "&cleaner_ref=" + document.getElementById('cleaner_ref').value;
    url = url + "&opening_km=" + parseInt(document.getElementById("closing_km").value || 0);
    url = url + "&closing_km=" + parseInt(document.getElementById("opening_km").value || 0);
    url = url + "&amount=" + parseInt(document.getElementById("amount").value || 0);
    url = url + "&damount=" + parseInt(document.getElementById("driver_salary").value || 0);
    url = url + "&camount=" + parseInt(document.getElementById("cleaner_salary").value || 0);

    url = url + "&from_loc=" + document.getElementById("from_loc").value;
    url = url + "&to_loc=" + document.getElementById("to_loc").value;

    url = url + "&department=" + document.getElementById('department').value;
    url = url + "&run_no=" + document.getElementById('run_no').value;
    
    url = url + "&daypay=" + daypay;

    //add Item trip_data



    var num1 = parseInt(document.getElementById("closing_km").value || 0);
    var num2 = parseInt(document.getElementById("opening_km").value || 0);

    var sub = num1 - num2;

    url = url + "&mileage=" + sub;
    url = url + "&remark=" + document.getElementById('remark').value;
    url = url + "&user=" + document.getElementById('user').value;



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
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Vehicle Name  Not Entered</span></div>";
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
    if (document.getElementById('cid').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>customer Name  Not Entered</span></div>";
        return false;
    }

    var url = "customer_data.php";
    url = url + "?Command=" + "delete";

    url = url + "&cid=" + document.getElementById('cid').value;

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


function maileageCal() {

    var num1 = parseInt(document.getElementById("closing_km").value || 0);
    var num2 = parseInt(document.getElementById("opening_km").value || 0);

    if (num1 >= num2) {
        document.getElementById("mileage").value = num1 - num2 + " KM";
    } else {
        document.getElementById("mileage").value = "ERROR";
    }


}

function paymentCal() {

    if (document.getElementById("normal").checked) {

        var amount = parseFloat(document.getElementById("amount").value || 0);

        var temp = amount / 100;
        var driver = temp * 15;
        var cleaner = temp * 10;
        document.getElementById("driver_salary").value = driver;
        document.getElementById("cleaner_salary").value = cleaner;
    } else {


    }




}


function dayChange() {
    var normal = 0;
    var daypay = 0;

    if (document.getElementById("normal").checked) {

        var amount = parseFloat(document.getElementById("amount").value || 0);

        var temp = amount / 100;
        var driver = temp * 15;
        var cleaner = temp * 10;
        document.getElementById("driver_salary").value = driver;
        document.getElementById("cleaner_salary").value = cleaner;

        document.getElementById('driver_salary').disabled = true;
        document.getElementById('cleaner_salary').disabled = true;
    } else {

        var num1 = parseFloat(document.getElementById('driver_salary').value) || 0;
        var num2 = parseFloat(document.getElementById('cleaner_salary').value) || 0;


        document.getElementById('driver_salary').value = num1 + num2;
        document.getElementById('cleaner_salary').value = "";
        document.getElementById('driver_salary').disabled = false;
        document.getElementById('cleaner_salary').disabled = true;
    }





}


