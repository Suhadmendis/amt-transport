<?php

session_start();



include_once './connection_sql.php';

if ($_GET["Command"] == "pass_quot") {
    
  header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $cuscode = $_GET["custno"];
    
    $sql = "Select * from cleaner_master where cleaner_ref =  '" . $cuscode . "'";

    $result = $conn->query($sql);
    $row = $result->fetch();
    
    $cleaner_ref = $row['cleaner_ref'];
    $cleaner_nic = $row['cleaner_nic'];
    $cleaner_name = $row['cleaner_name'];
    $cleaner_number = $row['cleaner_number'];
  
    $ResponseXML .= "<cleaner_ref><![CDATA[$cleaner_ref]]></cleaner_ref>";
    $ResponseXML .= "<cleaner_nic><![CDATA[$cleaner_nic]]></cleaner_nic>";
    $ResponseXML .= "<cleaner_name><![CDATA[$cleaner_name]]></cleaner_name>";
    $ResponseXML .= "<cleaner_number><![CDATA[$cleaner_number]]></cleaner_number>";
   
   
//    $ResponseXML .= "<id><![CDATA[$vehicle_ref]]></id>";
    $ResponseXML .= "<stname><![CDATA[" . $_GET['stname'] . "]]></stname>";
    $ResponseXML .= "</new>";
   

    echo $ResponseXML;
  }


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table   class=\"table table-bordered\">
                <tr>
                    <th>VREF</th>
                    <th>Vehicle No</th>
                    <th>Department</th>
                    <th>Cleaner Name</th>
                </tr>";

     $sql = "Select * from cleaner_master where cleaner_ref<> ''";
 
    if ($_GET['cleaner_ref'] != "") {
        $sql .= " and cleaner_ref like '%" . $_GET['cleaner_ref'] . "%'";
    }
    if ($_GET['cleaner_nic'] != "") {
        $sql .= " and cleaner_nic like '%" . $_GET['cleaner_nic'] . "%'";
    }
    if ($_GET['cleaner_number'] != "") {
        $sql .= " and cleaner_number like '%" . $_GET['cleaner_number'] . "%'";
    }
    if ($_GET['cleaner_name'] != "") {
        $sql .= " and cleaner_name like '%" . $_GET['cleaner_name'] . "%'";
    }
 
    $sql .= " ORDER BY cleaner_ref limit 50 ";

    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['cleaner_ref'];
        $stname = $_GET["stname"];

        $ResponseXML .= "<tr>               
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['cleaner_ref'] . "</a></td>
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['cleaner_nic'] . "</a></td>
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['cleaner_number'] . "</a></td> 
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['cleaner_name'] . "</a></td>
                            </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
