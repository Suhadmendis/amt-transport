<?php

session_start();



include_once './connection_sql.php';



if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";
//$sql2 = "select * from temporary_manual_invoice WHERE svatboo = '1' AND nbtboo = '0' AND no = '0' AND Invoice_Date BETWEEN '" . $_GET['sdate'] . "' AND '" . $_GET['edate'] . "'";



     $sql2 = "select * from view_fuel_data order by date";



    $tb = "";
    $tb .= "<table id='testTable'  class='table table-bordered' >";


    $tb .= "<thead>";
    $tb .= "<th style='width: 10%;'>Date</th>";
    $tb .= "<th style='width: 10%;'>Vehicle No.</th>";
    $tb .= "<th style='width: 10%;'>Voucher No.</th>";
    $tb .= "<th style='width: 10%;'>Ltrs</th>";
    $tb .= "<th style='width: 10%;'>Rate</th>";
    $tb .= "<th style='width: 10%;'>Fuel Type</th>";
    $tb .= "<th style='width: 10%;'>Amount</th>";
    $tb .= "<th style='width: 10%;'>Full Amount</th>";
    $tb .= "</thead><tbody>";


    $totL = 0;
    $totA = 0.00;
    
   // $veh_no = array();
    
//    echo print_r($veh_no[0][0]);
    foreach ($conn->query($sql2) as $row) {
        $cuscode = $row['date'];

        
//        array_push($veh_no, array($row['vehicle_number'],$row['amount']));

        $tb .= "<tr>
        
         <td>" . $row['date'] . "</td>
         <td>" . $row['vehicle_number'] . "</td>
         <td>" . $row['voucher_no'] . "</td>
         <td>" . $row['ltrs'] . "</td>
         <td>" . $row['rate'] . "</td>
         <td>" . $row['fuel_type'] . "</td>
         <td>" . $row['amount'] . "</td>
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
