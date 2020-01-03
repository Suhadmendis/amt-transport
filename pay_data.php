<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT pay_code FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['pay_code'];
//    uniq
    $uniq = uniqid();
    
    $tmpinvno = "000000" . $row["pay_code"];
    $lenth = strlen($tmpinvno);
    $no = trim("PAY/") . substr($tmpinvno, $lenth - 7);

    
    
    
    $ResponseXML .= "<id><![CDATA[$no]]></id>";
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

    $sql1 = "Insert into payinfo(pay_ref,pdate,driver_ref,amount,user)values  
                        ('" . $_GET['pay_ref'] . "','" . $_GET['pdate'] . "','" . $_GET['driver_ref'] . "','" . $_GET['amount'] . "','" . $_GET['user'] .  "')";
        $result = $conn->query($sql1);
      // echo $sql1;

        $sql = "SELECT pay_code FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['pay_code'];
        $no2 = $no + 1;
        $sql = "update invpara set pay_code = $no2 where pay_code = $no";
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
   
        $sql = "delete from payinfo where pay_ref = '" . $_GET['pay_ref'] . "'";
        $result = $conn->query($sql);
      //  echo $sql;
        echo "delete";
   
}

?>