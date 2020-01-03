<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT deduction_code FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['deduction_code'];
//    uniq
    $uniq = uniqid();
    
    $tmpinvno = "000000" . $row["deduction_code"];
    $lenth = strlen($tmpinvno);
    $no = trim("D/") . substr($tmpinvno, $lenth - 7);

    
    
    
    $ResponseXML .= "<od_ref><![CDATA[$no]]></od_ref>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";
    
    
    
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

            //$sql = "delete from trip where trip_ref = '" . $_GET['trip_ref'] . "'";
        
      // $result = $conn->query($sql);

    $sql1 = "Insert into deduction(od_ref,date,driver_ref,amount,user)values  
                        ('" . $_GET['od_ref'] . "','" . $_GET['date'] . "','" . $_GET['driver_ref'] . "','" . $_GET['amount'] . "','" . $_GET['user'] .  "')";
        $result = $conn->query($sql1);
      // echo $sql1;

        $sql = "SELECT deduction_code FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['deduction_code'];
        $no2 = $no + 1;
        $sql = "update invpara set deduction_code = $no2 where deduction_code = $no";
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