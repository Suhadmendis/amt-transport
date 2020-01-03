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


    $sql = "Select * from loan where od_ref ='" . $cuscode . "'";


    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {


        $ResponseXML .= "<id><![CDATA[" . $row['od_ref'] . "]]></id>";
        $ResponseXML .= "<str_customername1><![CDATA[" . $row['date'] . "]]></str_customername1>";
        $ResponseXML .= "<str_customername2><![CDATA[" . $row['driver_ref'] . "]]></str_customername2>";
        $ResponseXML .= "<str_customername3><![CDATA[" . $row['amount'] . "]]></str_customername3>";
        $ResponseXML .= "<str_customername4><![CDATA[" . $row['user'] . "]]></str_customername4>";
        $ResponseXML .= "<str_customername5><![CDATA[" . $row['monthes'] . "]]></str_customername5>";
//        $ResponseXML .= "<str_customername6><![CDATA[" . $row['end_date'] . "]]></str_customername6>";
        
        $dpt_no = $row['driver_ref'];

        $sql2 = "Select * from driver_master_file where driver_ref='" . $dpt_no . "'";
        $result = $conn->query($sql2);
        $row2 = $result->fetch();

        $dpt_name = $row2['driver_name'];
//        $fural_type= $row2['fuel_type'];

        $ResponseXML .= "<driver_name><![CDATA[$dpt_name]]></driver_name>";
       
    }
    
   

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table class=\"table table-bordered\">
                <tr>
                     <th>Ref. No.</th>
                    <th>Date</th>
                    <th>Driver Ref.</th>
              </tr>";


    $sql = "Select * from loan where od_ref<> ''";

    if ($_GET['cusno'] != "") {
        $sql .= " and od_ref like '%" . $_GET['cusno'] . "%'";
    }
    if ($_GET['customername1'] != "") {
        $sql .= " and date like '%" . $_GET['customername1'] . "%'";
    }
    if ($_GET['customername2'] != "") {
        $sql .= " and driver_ref like '%" . $_GET['customername2'] . "%'";
    }

    $sql .= " ORDER BY od_ref limit 50 ";



    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['od_ref'];

        $stname = $_GET["stname"];

        $ResponseXML .= "<tr> 
                              <td onclick=\"custno('$cuscode');\">" . $row['od_ref'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['date'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['driver_ref'] . "</a></td>
                         </tr>";
    }

    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
