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


    $sql = "Select * from advance where od_ref ='" . $cuscode . "'";


    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {


        $ResponseXML .= "<id><![CDATA[" . json_encode($row) . "]]></id>";
       
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
                     <th>Name.</th>
                    <th>Amount.</th>
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
     if ($_GET['customername3'] != "") {
        $sql .= " and driver_name like '%" . $_GET['customername3'] . "%'";
    }
     if ($_GET['customername4'] != "") {
        $sql .= " and amount like '%" . $_GET['customername4'] . "%'";
    }

    $sql .= " ORDER BY od_ref limit 50 ";



    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['od_ref'];

        $stname = $_GET["stname"];

        $ResponseXML .= "<tr> 
                              <td onclick=\"custno('$cuscode');\">" . $row['od_ref'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['date'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['driver_ref'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['driver_name'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['amount'] . "</a></td>
                         </tr>";
    }

    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
