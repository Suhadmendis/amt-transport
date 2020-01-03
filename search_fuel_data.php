<?php

session_start();

include_once './connection_sql.php';

if ($_GET["Command"] == "pass_quot") {
    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $cuscode = $_GET["custno"];


    $sql = "Select * from fuel where fuel_ref ='" . $cuscode . "'";


    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {


        $ResponseXML .= "<id><![CDATA[" . $row['fuel_ref'] . "]]></id>";
        $ResponseXML .= "<str_customername1><![CDATA[" . $row['vehicle_ref'] . "]]></str_customername1>";
        
        $ResponseXML .= "<str_customername3><![CDATA[" . $row['date'] . "]]></str_customername3>";
        $ResponseXML .= "<str_customername4><![CDATA[" . $row['rate'] . "]]></str_customername4>";
        $ResponseXML .= "<str_customername5><![CDATA[" . $row['ltrs'] . "]]></str_customername5>";
        $ResponseXML .= "<str_customername6><![CDATA[" . $row['amount'] . "]]></str_customername6>";
        $ResponseXML .= "<str_customername7><![CDATA[" . $row['voucher_no'] . "]]></str_customername7>";


        $dpt_no = $row['vehicle_ref'];

        $sql2 = "Select * from vehicle_master1 where vehicle_ref='" . $dpt_no . "'";
        $result = $conn->query($sql2);
        $row2 = $result->fetch();

        $dpt_name = $row2['vehicle_number'];
        $fural_type = $row2['fuel_type'];

        $ResponseXML .= "<dpt_name><![CDATA[$dpt_name]]></dpt_name>";
        $ResponseXML .= "<fural_type><![CDATA[$fural_type]]></fural_type>";
    }



    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table class=\"table table-bordered\">
                <tr>
                    <th>Ref. No.</th>
                    <th>Vehicle No.</th>
                    <th>Date</th>
                    <th>Rate</th>
                    <th>Amount</th>
              </tr>";


    $sql = "Select * from view_search_fuel where fuel_ref<> ''";

    if ($_GET['cusno'] != "") {
        $sql .= " and fuel_ref like '%" . $_GET['cusno'] . "%'";
    }
    if ($_GET['customername1'] != "") {
        $sql .= " and vehicle_number like '%" . $_GET['customername1'] . "%'";
    }
    if ($_GET['customername2'] != "") {
        $sql .= " and date like '%" . $_GET['customername2'] . "%'";
    }
     if ($_GET['customername3'] != "") {
        $sql .= " and rate like '%" . $_GET['customername3'] . "%'";
    }
    if ($_GET['customername4'] != "") {
        $sql .= " and amount like '%" . $_GET['customername4'] . "%'";
    }

    $sql .= " ORDER BY fuel_ref limit 50 ";



    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['fuel_ref'];

        $stname = $_GET["stname"];

        $ResponseXML .= "<tr> 
                              <td onclick=\"custno('$cuscode');\">" . $row['fuel_ref'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['vehicle_number'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['date'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['rate'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['amount'] . "</a></td>
                         </tr>";
    }

    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
