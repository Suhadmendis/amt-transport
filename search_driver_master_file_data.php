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

    $sql = "select * from driver_master_file where driver_ref= '" . $cuscode . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {

        $ResponseXML .= "<driver_ref><![CDATA[" . $row['driver_ref'] . "]]></driver_ref>";
        $ResponseXML .= "<driver_nic><![CDATA[" . $row['driver_nic'] . "]]></driver_nic>";
        $ResponseXML .= "<driver_number><![CDATA[" . $row['driver_number'] . "]]></driver_number>";
        $ResponseXML .= "<driver_name><![CDATA[" . $row['driver_name'] . "]]></driver_name>";
        
        
       

    }

   $ResponseXML .= "<stname><![CDATA[" . $_GET['stname'] . "]]></stname>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table   class=\"table table-bordered\">
                <tr>
                    <th>Driver Ref</th>
                    <th>Driver NIC</th>
                    <th>Driver Number</th>
                    <th>Driver Name</th>
                    
                </tr>";
    
     $sql = "Select * from driver_master_file where driver_ref<> ''";
// 
    if ($_GET['cusno'] != "") {
        $sql .= " and driver_ref like '%" . $_GET['cusno'] . "%'";
    }
    if ($_GET[''] != "customername1") {
        $sql .= " and driver_nic like '%" . $_GET['customername1'] . "%'";
    }
    if ($_GET['customername2'] != "") {
        $sql .= " and driver_number like '%" . $_GET['customername2'] . "%'";
    }
     if ($_GET['customername3'] != "") {
        $sql .= " and driver_name like '%" . $_GET['customername3'] . "%'";
    }

    $sql .= " ORDER BY driver_ref limit 50";


    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['driver_ref'];
        $stname = $_GET["stname"];

        $ResponseXML .= "<tr>               
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['driver_ref'] . "</a></td>
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['driver_nic'] . "</a></td>
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['driver_number'] . "</a></td>
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['driver_name'] . "</a></td>
                               
                            </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
