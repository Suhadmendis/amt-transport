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

    $sql = "select * from item_master_file where item_ref= '" . $cuscode . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {

        $ResponseXML .= "<item_ref><![CDATA[" . $row['item_ref'] . "]]></item_ref>";
        $ResponseXML .= "<item_name><![CDATA[" . $row['item_name'] . "]]></item_name>";
//        $ResponseXML .= "<address><![CDATA[" . $row['address'] . "]]></address>";
//        $ResponseXML .= "<dob><![CDATA[" . $row['dob'] . "]]></dob>";
       

    }

   $ResponseXML .= "<stname><![CDATA[" . $_GET['stname'] . "]]></stname>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table   class=\"table table-bordered\">
                <tr>
                    <th>Item Ref</th>
                    <th>Item Name</th>
                   
                    
                </tr>";
    
     $sql = "Select * from item_master_file where item_ref<> ''";
// 
    if ($_GET['cusno'] != "") {
        $sql .= " and item_ref like '%" . $_GET['cusno'] . "%'";
    }
    if ($_GET[''] != "customername1") {
        $sql .= " and item_name like '%" . $_GET['customername1'] . "%'";
    }
//    if ($_GET['customername2'] != "") {
//        $sql .= " and address like '%" . $_GET['customername2'] . "%'";
//    }

    $sql .= " ORDER BY item_ref limit 50";


    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['item_ref'];
        $stname = $_GET["stname"];

        $ResponseXML .= "<tr>               
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['item_ref'] . "</a></td>
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['item_name'] . "</a></td>
                              
                               
                            </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
