<?php

session_start();



include_once './connection_sql.php';



if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";


    $sql2 = "select * from view_salary";


    $tb = "";
    $tb .= "<table id='testTable'  class='table table-bordered'>";
    $tb .= "<tr><th style = 'width:10%'>Cleaner Ref No.</th>";
    $tb .= "<th style='width: 10%;'>Date</th>";
    $tb .= "<th style='width: 10%;'>Cleaner NIC No.</th>";
    $tb .= "<th style='width: 10%;'>Cleaner Name</th>";
    $tb .= "<th style='width: 10%;'>Cleaner Salary</th>";
   



    $tb .= "</tr></thead><tbody>";

    $totL = 0.00;



    foreach ($conn->query($sql2) as $row) {
        $cuscode = $row['cleaner_ref'];

//        $sql3 = "select * from manuel_aod_table where aodnumber = '" . $row['aod_number'] . "'";
//
//
//        $sql4 = "select count(aodnumber) from manuel_aod_table where aodnumber = '" . $row['aod_number'] . "'";
//        $resul = $conn->query($sql4);
//        $row4 = $resul->fetch();
//        if ($row4[0] == 0) {
//            $tb .= "<tr>               
//                               <td rowspan=\"1\" onclick=\"custno('$cuscode');\">" . $row['aod_number'] . "</a></td>
//                               <td rowspan=\"1\" onclick=\"custno('$cuscode');\">" . $row['dod'] . "</a></td>
//                               <td rowspan=\"1\" onclick=\"custno('$cuscode');\">" . $row['type'] . "</a></td>                              
//                              <td rowspan=\"1\" onclick=\"custno('$cuscode');\">" . $row['Name'] . "</a></td>
//                              <td>&nbsp;</td>
//                              <td>&nbsp;</td>";
//        } else {
//            $tb .= "<tr>               
//                               <td rowspan=\"$row4[0]\" onclick=\"custno('$cuscode');\">" . $row['aod_number'] . "</a></td>
//                               <td rowspan=\"$row4[0]\" onclick=\"custno('$cuscode');\">" . $row['dod'] . "</a></td>
//                               <td rowspan=\"$row4[0]\" onclick=\"custno('$cuscode');\">" . $row['type'] . "</a></td>                              
//                              <td rowspan=\"$row4[0]\" onclick=\"custno('$cuscode');\">" . $row['Name'] . "</a></td>";
//        }



        $tb .= "<tr>               
                               <td style = 'width:10%' rowspan=\"\" onclick=\"custno('$cuscode');\">" . $row['cleaner_ref'] . "</a></td>
                               <td style = 'width:10%' rowspan=\"\" onclick=\"custno('$cuscode');\">" . $row['date'] . "</a></td>
                               <td style = 'width:10%' rowspan=\"\" onclick=\"custno('$cuscode');\">" . $row['cleaner_nic'] . "</a></td>                              
                               <td style = 'width:10%' rowspan=\"\" onclick=\"custno('$cuscode');\">" . $row['cleaner_name'] . "</a></td>
                               <td style = 'width:10%' rowspan=\"\" onclick=\"custno('$cuscode');\">" . $row['camount'] . "</a></td></tr>";

        
        
                               // $totL = $totL + $row['damount'];
                               // echo $totL;



//        foreach ($conn->query($sql3) as $row1) {
//
//            if ($row1['Product_Des'] == "") {
//                $tb .= " <td onclick=\"custno('$cuscode');\">&nbsp;</a></td>
//                              <td onclick=\"custno('$cuscode');\">" . $row1['QTY'] . "</a></td>
//                            </tr>";
//            } else {
//                $tb .= " <td onclick=\"custno('$cuscode');\">" . $row1['Product_Des'] . "</a></td>
//                              <td onclick=\"custno('$cuscode');\">" . $row1['QTY'] . "</a></td>
//                            </tr>";
//            }
//        }
    }
    $tb .= "</tbody></table>";




    $ResponseXML .= "<td><![CDATA[" . $tb . "]]></td>";
    $ResponseXML .= "</new>";


    echo $ResponseXML;
}

?>
