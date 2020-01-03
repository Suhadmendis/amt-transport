
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
    document.getElementById('cdcode').value = "";
    document.getElementById('uniq').value = "";
//    document.getElementById('driver_txt').value = "";
//    document.getElementById('cleaner_txt').value = "";
    document.getElementById('from_txt').value = "";
    document.getElementById('to_txt').value = "";
    document.getElementById('driver').checked = true;

    getdt();
}


function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "driver_salary_summary_data.php";
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

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("item_ref");
        document.getElementById('fuel_ref').value = XMLAddress1[0].childNodes[0].nodeValue;

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

    if (document.getElementById('fuel_ref').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Fuel Ref No. Not Enterd</span></div>";
        return false;
    }

    var url = "cleaner_driver_salary_data.php";
    url = url + "?Command=" + "save_item";

    var jobtitle = "";
    if (document.getElementById('driver').checked) {
        shipingMethod = 'local';
    } else {
        if (document.getElementById('cleaner').checked) {
            shipingMethod = 'sea';
        } else {
        }
    }

    url = url + "&jobtitle=" + jobtitle;


    url = url + "&fuel_ref=" + document.getElementById('fuel_ref').value;
    url = url + "&vehicle_ref=" + document.getElementById('vehicle_ref').value;
    url = url + "&date=" + document.getElementById('date').value;
    url = url + "&rate=" + document.getElementById('rate').value;
    url = url + "&ltrs=" + document.getElementById('ltrs').value;
    url = url + "&amount=" + document.getElementById('amount').value;
    url = url + "&voucher_no=" + document.getElementById('voucher_no').value;
    url = url + "&yes=" + yes;
    url = url + "&no=" + no;

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

//
//function edit() {
//
//    xmlHttp = GetXmlHttpObject();
//    if (xmlHttp == null) {
//        alert("Browser does not support HTTP Request");
//        return;
//    }
//    if (document.getElementById('reference_no').value == "") {
//        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Reference NO  Not Entered</span></div>";
//        return false;
//    }
//
//    var url = "po_requistion_note_data.php";
//    url = url + "?Command=" + "update";
//
//    url = url + "&reference_no=" + document.getElementById('reference_no').value;
//    url = url + "&date=" + document.getElementById('date').value;
//    url = url + "&manual_no=" + document.getElementById('manual_no').value;
//    url = url + "&job_no=" + document.getElementById('job_no').value;
//    url = url + "&remarks=" + document.getElementById('remarks').value;
//    url = url + "&dummy=" + document.getElementById('dummy').value;
//
//
//
//
//    xmlHttp.onreadystatechange = update;
//    xmlHttp.open("GET", url, true);
//    xmlHttp.send(null);
//}
//
//function update() {
//    var XMLAddress1;
//
//    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
//
//        if (xmlHttp.responseText == "update") {
//            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Updated</span></div>";
//
//        } else {
//            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
//        }
//    }
//}
//
//
//function delete1() {
//    xmlHttp = GetXmlHttpObject();
//    if (xmlHttp == null) {
//        alert("Browser does not support HTTP Request");
//        return;
//    }
//    if (document.getElementById('reference_no').value == "") {
//        document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>Reference NO  Not Entered</span></div>";
//        return false;
//    }
//
//    var url = "po_requistion_note_data.php";
//    url = url + "?Command=" + "delete";
//
//    url = url + "&reference_no=" + document.getElementById('reference_no').value;
//
//    xmlHttp.onreadystatechange = delete2;
//    xmlHttp.open("GET", url, true);
//    xmlHttp.send(null);
//
//}

//function delete2() {
//    var XMLAddress1;
//
//    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
//
//        if (xmlHttp.responseText == "delete") {
//            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>Deleted</span></div>";
//
//        } else {
//            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
//        }
//    }
//}
function print_out() {

        var url = "cleaner_driver_con_print.php";
        url = url + "?Command=" + "save";
        url = url + "&cdcode=" + document.getElementById('cdcode').value;   
        // url = url + "&driver_ref=" + document.getElementById('driver_ref').value;
        // url = url + "&cleaner_ref=" + document.getElementById('cleaner_ref').value;
   
  

    url = url + "&from_txt=" + document.getElementById('from_txt').value;
    url = url + "&to_txt=" + document.getElementById('to_txt').value;
  alert(url);
    window.open(url, "_blank");
}

//function add_tmp() {
//    xmlHttp = GetXmlHttpObject();
//    if (xmlHttp == null) {
//        alert("Browser does not support HTTP Request");
//        return;
//    }
//
//    var url = "po_requistion_note_data.php";
//    url = url + "?Command=" + "setitem";
//    url = url + "&Command1=" + "add_tmp";
//
//
//    url = url + "&reference_no=" + document.getElementById('reference_no').value;
//    url = url + "&rec_no=" + document.getElementById('rec_no').value;
//    url = url + "&product_code=" + document.getElementById('product_code').value;
//    url = url + "&product_description=" + document.getElementById('product_description').value;
//    url = url + "&quantity=" + document.getElementById('quantity').value;
//    url = url + "&umo=" + document.getElementById('umo').value;
//    url = url + "&uniq=" + document.getElementById('uniq').value;
//    xmlHttp.onreadystatechange = aodtmp;
//    xmlHttp.open("GET", url, true);
//    xmlHttp.send(null);
//
//
//}


//function aodtmp() {
//    var XMLAddress1;
//
//    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
//
//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
//        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
//
//
//
//
//
//    }
//}

//function remove_tmp(id) {
//    xmlHttp = GetXmlHttpObject();
//    if (xmlHttp == null) {
//        alert("Browser does not support HTTP Request");
//        return;
//    }
//
//    var url = "po_requistion_note_data.php";
//    url = url + "?Command=" + "removerow";
//
//    url = url + "&uniq=" + document.getElementById('uniq').value;
////    url = url + "&sjrequestref=" + document.getElementById('sjrequestref_txt').value;
//    url = url + "&id=" + id;
//
//
//    xmlHttp.onreadystatechange = removeAdo;
//    xmlHttp.open("GET", url, true);
//    xmlHttp.send(null);
//
//
//}


//function removeAdo() {
//    var XMLAddress1;
//
//    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
//
//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
//        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
//
//    }
//}



//function add_tmp() {
//    xmlHttp = GetXmlHttpObject();
//    if (xmlHttp == null) {
//        alert("Browser does not support HTTP Request");
//        return;
//    }

// split and remove before zeros
//    var id = document.getElementById('aodnumber').value;
//    var split = id.split("/");
//    var mid = parseInt(split[2]);



//     var url = "po_requistion_note_data.php";
//    url = url + "?Command=" + "setitem";
//    url = url + "&Command1=" + "add_tmp";

//    url = url + "&aodnumber=" + mid;
//    url = url + "&reference_no=" + document.getElementById('reference_no').value;
//    url = url + "&rec_no=" + document.getElementById('rec_no').value;
//    url = url + "&product_code=" + document.getElementById('product_code').value;
//    url = url + "&product_description=" + document.getElementById('product_description').value;
//    url = url + "&quantity=" + document.getElementById('quantity').value;
//    url = url + "&umo=" + document.getElementById('umo').value;
//    url = url + "&uniq=" + document.getElementById('uniq').value;
//      alert(url);
//
//    xmlHttp.onreadystatechange = aodtmp;
//    xmlHttp.open("GET", url, true);
//    xmlHttp.send(null);
//
//
//}


//function aodtmp() {
//    var XMLAddress1;
//
////  var XMLAddress1;
//       
//    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
//    
//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
//        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
//
//


//        document.getElementById('order_id').value = "";
//        document.getElementById('description').value = "";
//        document.getElementById('qty').value = "";


//
//    }
//}



function ltesCal() {

    var rate = parseFloat(document.getElementById("rate").value || 0);
    var ltrs = parseFloat(document.getElementById("ltrs").value || 0);




    var tot = rate * ltrs;

    document.getElementById("amount").value = tot;

}





