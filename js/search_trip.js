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


function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
   // alert("sancjbhsgvcb nm,");

    var url = "search_Trip_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

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
    var url = "search_Trip_data.php";
    url = url + "?Command=" + "pass_quot";
    url = url + "&custno=" + code;
alert(url);
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
        var obj = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("driver");
        var driver = XMLAddress1[0].childNodes[0].nodeValue;
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cleaner");
        var cleaner = XMLAddress1[0].childNodes[0].nodeValue;

        console.log(obj);

        opener.document.getElementById('trip_ref').value = obj.trip_ref;
        
        opener.document.getElementById('date').value = obj.date;

        opener.document.getElementById('vehicle_ref').value = obj.vehicle_ref;
        opener.document.getElementById('vehicle_number').value = obj.vehicle_number;
        
        opener.document.getElementById('item_ref').value = obj.item_ref;
        opener.document.getElementById('item_name').value = obj.item_name;
       
        opener.document.getElementById('driver_ref').value = obj.driver_ref;
        opener.document.getElementById('driver_name').value = driver;

        opener.document.getElementById('cleaner_ref').value = obj.cleaner_ref;
        opener.document.getElementById('cleaner_name').value = cleaner;

        opener.document.getElementById('run_no').value = obj.run_no;

        opener.document.getElementById('opening_km').value = obj.opening_km;
        opener.document.getElementById('closing_km').value = obj.closing_km;

        opener.document.getElementById('from_loc').value = obj.from_loc;
        opener.document.getElementById('to_loc').value = obj.to_loc;

        opener.document.getElementById('mileage').value = obj.mileage;
        opener.document.getElementById('amount').value = obj.amount;
        opener.document.getElementById('driver_salary').value = obj.damount;
        opener.document.getElementById('cleaner_salary').value = obj.camount;


        if (obj.camount==0) {

            window.opener.document.getElementById('daypay').checked = true;
        }else{
            window.opener.document.getElementById('normal').checked = true;
        }
        
        opener.document.getElementById('department').value = obj.department;
        opener.document.getElementById('remark').value = obj.remark;

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


    var url = "search_Trip_data.php";
    url = url + "?Command=" + "search_custom";


    url = url + "&cusno=" + document.getElementById('cusno').value;
    url = url + "&customername1=" + document.getElementById('customername1').value;
    url = url + "&customername2=" + document.getElementById('customername2').value;
    url = url + "&customername3=" + document.getElementById('customername3').value;
    url = url + "&customername4=" + document.getElementById('customername4').value;
    url = url + "&customername5=" + document.getElementById('customername5').value;

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