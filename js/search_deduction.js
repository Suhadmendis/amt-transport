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

    getdt();
}


function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "search_deduction_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function assign_dt() {
    document.getElementById('itemdetails').innerHTML = xmlHttp.responseText;
}


function custno(code)
{
    //alert(code);
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "search_deduction_data.php";
    url = url + "?Command=" + "pass_quot";
    url = url + "&custno=" + code;

    xmlHttp.onreadystatechange = passcusresult_quot;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function passcusresult_quot()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        opener.document.form1.od_ref.value = XMLAddress1[0].childNodes[0].nodeValue;
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_customername1");
        opener.document.form1.date.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_customername2");
        opener.document.form1.driver_ref.value = XMLAddress1[0].childNodes[0].nodeValue;
       
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_customername4");
        opener.document.form1.amount.value = XMLAddress1[0].childNodes[0].nodeValue;
//       alert(name);
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("dpt_name");
        opener.document.form1.driver_name.value = XMLAddress1[0].childNodes[0].nodeValue;

       self.close();
    }
}

function update_cust_list(stname)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "search_deduction_data.php";
    url = url + "?Command=" + "search_custom";




    url = url + "&cusno=" + document.getElementById('cleaner_ref_Text').value;
    url = url + "&customername1=" + document.getElementById('cleaner_nic_Text').value;
    url = url + "&customername2=" + document.getElementById('cleaner_number_Text').value;

   
    url = url + "&stname=" + stname;


    xmlHttp.onreadystatechange = showcustresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}

function showcustresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        document.getElementById('filt_table').innerHTML = xmlHttp.responseText;

    }
}
