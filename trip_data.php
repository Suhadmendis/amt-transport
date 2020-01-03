<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT trip_ref FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['trip_ref'];
//    uniq
    $uniq = uniqid();
    
    $tmpinvno = "000000" . $row["trip_ref"];
    $lenth = strlen($tmpinvno);
    $no = trim("TRIP/") . substr($tmpinvno, $lenth - 7);

    
    
    
    $ResponseXML .= "<trip_ref><![CDATA[$no]]></trip_ref>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";
    
    
    
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

            $sql = "delete from trip where trip_ref = '" . $_GET['trip_ref'] . "'";
            $result = $conn->query($sql);

            $sql1 = "Insert into trip(trip_ref,vehicle_ref,date,opening_km,closing_km,mileage,driver_ref,cleaner_ref,remark,user,amount,damount,camount,item_ref,item_name,department,run_no,from_loc,to_loc,day_pay)values  
                        ('" . $_GET['trip_ref'] . "','" . $_GET['vehicle_ref'] . "','" . $_GET['date'] . "','" . $_GET['opening_km'] . "','" . $_GET['closing_km'] . "','" . $_GET['mileage'] . "','" . $_GET['driver_ref'] . "','" . $_GET['cleaner_ref'] . "','" . $_GET['remark'] . "','" . $_GET['user'] . "','" . $_GET['amount'] . "','" . $_GET['damount'] . "','" . $_GET['camount'] ."','" . $_GET['item_ref'] ."','" . $_GET['item_name'] . "','" . $_GET['department'] . "','" . $_GET['run_no'] . "','" . $_GET['from_loc'] . "','" . $_GET['to_loc'] . "','" . $_GET['daypay'] . "')";

            $result = $conn->query($sql1);
      // echo $sql1;

        $sql = "SELECT trip_ref FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['trip_ref'];
        $no2 = $no + 1;
        $sql = "update invpara set trip_ref = $no2 where trip_ref = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "update") {
    try {
        $sql = "update customer set name = '" . $_GET['name'] . "' ,address = '" . $_GET['address'] . "' ,dob = '" . $_GET['dob'] .  "'  where cid = '" . $_GET['cid'] . "'";
        $result = $conn->query($sql);
//        cid = '" . $_GET['cid'] . "',
        echo "update";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_GET["Command"] == "delete") {
   
        $sql = "delete from customer where cid = '" . $_GET['cid'] . "'";
        $result = $conn->query($sql);
      //  echo $sql;
        echo "delete";
   
}

?>