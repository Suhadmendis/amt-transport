<?php

session_start();

include_once './connection_sql.php';

if ($_GET["Command"] == "pass_quot") {

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $_SESSION["custno"] = $_GET['custno'];
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $cuscode = $_GET["custno"];

//main
    $sql = "Select * from trip where trip_ref ='" . $cuscode . "'";
    $sql = $conn->query($sql);

    $dpt_no = $row['driver_name'];

      $sql2 = "Select * from driver_master_file where driver_ref='" . $dpt_no . "'";
        $result = $conn->query($sql2);
        $row1 = $result->fetch();

        $dpt_name = $row1['driver_name'];
//        $fural_type= $row2['fuel_type'];

        $ResponseXML .= "<driver_name><![CDATA[$dpt_name]]></driver_name>";





    if ($rowM = $sql->fetch()) {
        $ResponseXML .= "<id><![CDATA[" . json_encode($rowM) .  "]]></id>";
    }

//vehicle
    $sql = "Select * from vehicle_master1 where vehicle_ref ='" . $rowM['vehicle_ref'] . "'";
    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $ResponseXML .= "<num><![CDATA[" . $row['vehicle_number'] .  "]]></num>";
    }
    //diver
    $sql = "Select * from driver_master_file where driver_ref ='" . $rowM['driver_ref'] . "'";
    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $ResponseXML .= "<driver><![CDATA[" . $row['driver_name'] .  "]]></driver>";
    }
    //cleaner
    $sql = "Select * from cleaner_master where cleaner_ref ='" . $rowM['cleaner_ref'] . "'";
    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $ResponseXML .= "<cleaner><![CDATA[" . $row['cleaner_name'] .  "]]></cleaner>";
    }


  



    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table class=\"table table-bordered\">
                <tr>
                    <th>Trip Ref.</th>
                    <th>Vehicle Ref.</th>
                    <th>Date</th>
                    <th>Driver Name</th>
                    <th>From</th>
                    <th>To</th>
              </tr>";


    $sql = "Select * from view_tripdata where trip_ref<> ''";

    if ($_GET['cusno'] != "") {
        $sql .= " and trip_ref like '%" . $_GET['cusno'] . "%'";
    }
    if ($_GET['customername1'] != "") {
        $sql .= " and vehicle_ref like '%" . $_GET['customername1'] . "%'";
    }
    if ($_GET['customername2'] != "") {
        $sql .= " and date like '%" . $_GET['customername2'] . "%'";
    }
     if ($_GET['customername3'] != "") {
        $sql .= " and driver_name like '%" . $_GET['customername3'] . "%'";
    }
    if ($_GET['customername4'] != "") {
        $sql .= " and from_loc like '%" . $_GET['customername4'] . "%'";
    }

     if ($_GET['customername5'] != "") {
        $sql .= " and to_loc like '%" . $_GET['customername5'] . "%'";
    }

    $sql .= " ORDER BY trip_ref limit 50 ";



    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['trip_ref'];

        $stname = $_GET["stname"];

        $ResponseXML .= "<tr> 
                              <td onclick=\"custno('$cuscode');\">" . $row['trip_ref'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['vehicle_ref'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['date'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['driver_name'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['from_loc'] . "</a></td>
                              <td onclick=\"custno('$cuscode');\">" . $row['to_loc'] . "</a></td>
                         </tr>";
    }

    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
