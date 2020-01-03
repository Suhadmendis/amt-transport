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

function custno(code, stname) {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "search_cleaner_master_data.php";
    url = url + "?Command=" + "pass_quot";
    url = url + "&custno=" + code;
    url = url + "&stname=" + stname;
    

    xmlHttp.onreadystatechange = passcusresult_quot;

    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}

function passcusresult_quot()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("stname");
        var stname = XMLAddress1[0].childNodes[0].nodeValue;
        
        if (stname === "Master") {
            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cleaner_ref");
            opener.document.form1.cleaner_ref_Text.value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cleaner_nic");
            opener.document.form1.cleaner_nic_Text.value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cleaner_name");
            opener.document.form1.cleaner_name.value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cleaner_number");
            opener.document.form1.cleaner_number_Text.value = XMLAddress1[0].childNodes[0].nodeValue;
        }

        if (stname === "trip") {
           
            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cleaner_ref");
            opener.document.form1.cleaner_ref.value = XMLAddress1[0].childNodes[0].nodeValue;



            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cleaner_name");
            opener.document.form1.cleaner_name.value = XMLAddress1[0].childNodes[0].nodeValue;


        }



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


    var url = "search_cleaner_master_data.php";
    url = url + "?Command=" + "search_custom";


    url = url + "&cleaner_ref=" + document.getElementById('cleaner_ref_Text').value;
    url = url + "&cleaner_nic=" + document.getElementById('cleaner_nic_Text').value;
    url = url + "&cleaner_number=" + document.getElementById('cleaner_number_Text').value;
    url = url + "&cleaner_name=" + document.getElementById('cleaner_name').value;

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


