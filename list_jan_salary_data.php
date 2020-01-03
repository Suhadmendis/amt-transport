<?php

session_start();



include_once './connection_sql.php';



if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";
//$sql2 = "select * from temporary_manual_invoice WHERE svatboo = '1' AND nbtboo = '0' AND no = '0' AND Invoice_Date BETWEEN '" . $_GET['sdate'] . "' AND '" . $_GET['edate'] . "'";



    $sql2 = "select * from view_salary where vehicle_ref = '" . $_GET['vehicle'] . "' AND date BETWEEN '" . $_GET['sdate'] . "' AND '" . $_GET['edate'] . "'";
//    echo $sql2;


    $tb = "";
    $tb .= "<table id='testTable'  class='table table-bordered' >";


    $tb .= "<thead>";
    $tb .= "<tr><th>Driver Ref</th>";
    $tb .= "<th>Driver NIC</th>";
    $tb .= "<th>Driver Name</th>";
    $tb .= "<th>Date</th>";
    $tb .= "<th>Amount</th>";
    $tb .= "</thead><tbody>";
    $totS = 0.00;

    foreach ($conn->query($sql2) as $row) {
        $cuscode = $row['driver_ref'];

        $tb .= "<tr>
         <td>" . $row['driver_ref'] . "</td>
         <td>" . $row['driver_nic'] . "</td>
         <td>" . $row['driver_name'] . "</td>
         <td>" . $row['date'] . "</td>
         <td>" . $row['damount'] . "</td></tr>";

        $totS = $totS + $row['damount'];
        
    }


    $tb .= "<tr>
         <td></td>
         <td></td>
         <td rowspan='2' ><b>Total</b></td>
         <td><b>" . $totS . "</b></td></tr>";




    $tb .= "</tbody></table>";




    $ResponseXML .= "<td><![CDATA[" . $tb . "]]></td>";
    $ResponseXML .= "</new>";


    echo $ResponseXML;
}
?>
