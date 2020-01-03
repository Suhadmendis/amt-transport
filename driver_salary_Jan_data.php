<?php

session_start();



include_once './connection_sql.php';



if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";
//$sql2 = "select * from temporary_manual_invoice WHERE svatboo = '1' AND nbtboo = '0' AND no = '0' AND Invoice_Date BETWEEN '" . $_GET['sdate'] . "' AND '" . $_GET['edate'] . "'";



    $sql2 = "select * from test_drvsal where Driver_Ref_No = '" . $_GET['driver'] . "' AND date BETWEEN '" . $_GET['sdate'] . "' AND '" . $_GET['edate'] . "'";



    $tb = "";
    $tb .= "<table id='testTable'  class='table table-bordered' >";


    $tb .= "<thead>";
    $tb .= "<tr><th>Driver Ref No</th>";
    $tb .= "<th>Date</th>";
    $tb .= "<th>Driver NIC No</th>";
    $tb .= "<th>Driver Name</th>";
    $tb .= "<th>Driver_Salary</th>";
    $tb .= "</thead><tbody>";


    //$totL = 0;
    $totS = 0.00;

    foreach ($conn->query($sql2) as $row) {
        $cuscode = $row['Driver_Ref_No'];
        $tb .= "<tr>
         <td>" . $row['Driver_Ref_No'] . "</td>
       
         <td>" . $row['Date'] . "</td>
         <td>" . $row['Driver_NIC_No'] . "</td>
         <td>" . $row['Driver_Name'] . "</td>
         <td>" . $row['Driver_Salary'] . "</td></tr>";

        //$totL = $totL + $row['ltrs'];
        $totS = $totS + $row['Driver_Salary'];
        
    }
    $tb .= "<tr>
         <td></td>
         <td></td>
         <td rowspan='2' ><b>Total</b></td>
         <td><b>" . $totS. "</b></td></tr>";
    $tb .= "</tbody></table>";
    $ResponseXML .= "<td><![CDATA[" . $tb . "]]></td>";
    $ResponseXML .= "</new>";
    echo $ResponseXML;
}
?>
