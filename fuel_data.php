<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT fuel FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['fuel'];
//    uniq
    $uniq = uniqid();
    
    $tmpinvno = "000000" . $row["fuel"];
    $lenth = strlen($tmpinvno);
    $no = trim("FUEL/") . substr($tmpinvno, $lenth - 7);

    
    
    
    $ResponseXML .= "<item_ref><![CDATA[$no]]></item_ref>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";
    
    
    
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

            $sql = "delete from expense where expense_ref = '" . $_GET['expense_ref'] . "'";
        
       $result = $conn->query($sql);

    $sql1 = "Insert into fuel(fuel_ref,vehicle_ref,date,rate,ltrs,amount,voucher_no)values 
                        ('" . $_GET['fuel_ref'] . "','" . $_GET['vehicle_ref'] . "','" . $_GET['date'] . "','" . $_GET['rate'] . "','" . $_GET['ltrs'] . "','" . $_GET['amount'] ."','" . $_GET['voucher_no'] ."')";
        $result = $conn->query($sql1);
//        echo $sql;

        $sql = "SELECT fuel FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['fuel'];
        $no2 = $no + 1;
        $sql = "update invpara set fuel = $no2 where fuel = $no";
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