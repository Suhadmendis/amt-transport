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
    $stname = $_GET["stname"];

    

        $sql = "SELECT * from expense where expense_ref = '" . $cuscode . "'";

            $sql = $conn->query($sql);
            if ($row = $sql->fetch()) {

                $ResponseXML .= "<id><![CDATA[" . $row['expense_ref'] . "]]></id>";
                $ResponseXML .= "<str_customername1><![CDATA[" . $row['expense_category'] . "]]></str_customername1>";
                $ResponseXML .= "<str_customername2><![CDATA[" . $row['amount'] . "]]></str_customername2>";
                $ResponseXML .= "<str_customername3><![CDATA[" . $row['remark'] . "]]></str_customername3>";
                $ResponseXML .= "<str_customername4><![CDATA[" . $row['vehicle_ref'] . "]]></str_customername4>";
                $ResponseXML .= "<str_customername5><![CDATA[" . $row['date'] . "]]></str_customername5>";
                $ResponseXML .= "<str_customername6><![CDATA[" . $row['entry_type'] . "]]></str_customername6>";
                $ResponseXML .= "<stname><![CDATA[" . $stname . "]]></stname>";
                
            }

            $ResponseXML .= "</salesdetails>";
            echo $ResponseXML;
        
    
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table class=\"table table-bordered\">
                <tr>
                     <th>Expense Ref.</th>
                    <th>Expense Category</th>
                    <th>Amount</th>
              </tr>";

    $stname = $_GET["stname"];

    if ($stname == "gcode") {

        $sql = "SELECT * from expense where expense_ref<> ''";

        if ($stname == "vcode") {

            $sql = "Select * from view_exp_vehicle where expense_ref<> ''";

            if ($_GET['cusno'] != "") {
                $sql .= " and expense_ref like '%" . $_GET['cusno'] . "%'";
            }
            if ($_GET['customername1'] != "") {
                $sql .= " and expense_category like '%" . $_GET['customername1'] . "%'";
            }
            if ($_GET['customername2'] != "") {
                $sql .= " and amount like '%" . $_GET['customername2'] . "%'";
            }

            $sql .= " ORDER BY expense_ref limit 50 ";

            foreach ($conn->query($sql) as $row) {
                $cuscode = $row['expense_ref'];

                $stname = $_GET["stname"];

                $ResponseXML .= "<tr> 
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['expense_ref'] . "</a></td>
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['expense_category'] . "</a></td>
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['amount'] . "</a></td>
                         </tr>";
            }

            $ResponseXML .= "   </table>";


            echo $ResponseXML;
        }
    }
}
?>
