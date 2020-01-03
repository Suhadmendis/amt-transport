<?php

session_start();



include_once './connection_sql.php';



if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";
//$sql2 = "select * from temporary_manual_invoice WHERE svatboo = '1' AND nbtboo = '0' AND no = '0' AND Invoice_Date BETWEEN '" . $_GET['sdate'] . "' AND '" . $_GET['edate'] . "'";
    $sql2 = "select * from fuel where vehicle_ref = '" . $_GET['vehicle'] . "' AND date BETWEEN '" . $_GET['sdate'] . "' AND '" . $_GET['edate'] . "'";
    $tb = "";
    $tb .= "<table id='testTable'  class='table table-bordered' >";
    $tb .= "<thead>";
    $tb .= "<tr><th>Fuel Ref</th>";
    $tb .= "<th>Date</th>";
    $tb .= "<th>Rate</th>";
    $tb .= "<th>Ltrs</th>";
    $tb .= "<th>Amount</th>";
    $tb .= "</thead><tbody>";
    $totL = 0;
    $totA = 0.00;

    foreach ($conn->query($sql2) as $row) {
        $cuscode = $row['fuel_ref'];

        $tb .= "<tr>
         <td>" . $row['fuel_ref'] . "</td>
         <td>" . $row['date'] . "</td>
         <td>" . $row['rate'] . "</td>
         <td>" . $row['ltrs'] . "</td>
         <td>" . $row['amount'] . "</td></tr>";

        $totL = $totL + $row['ltrs'];
        $totA = $totA + $row['amount'];
        
    }
    $tb .= "<tr>
         <td></td>
         <td></td>
         <td rowspan='2' ><b>Total</b></td>
         <td><b>" . $totL . "</b></td>
         <td><b>" . $totA . "</b></td></tr>";

    $tb .= "</tbody></table>";

    $ResponseXML .= "<td><![CDATA[" . $tb . "]]></td>";
    $ResponseXML .= "</new>";
    echo $ResponseXML;
}
?>
