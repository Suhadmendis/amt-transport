<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT expense FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['expense'];
//    uniq
    $uniq = uniqid();
    
    $tmpinvno = "000000" . $row["expense"];
    $lenth = strlen($tmpinvno);
    $no = trim("EX/") . substr($tmpinvno, $lenth - 7);

    
    
    
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

    $sql1 = "Insert into expense(expense_ref,expense_category,amount,remark,vehicle_ref,date,entry_type)values 
                        ('" . $_GET['expense_ref'] . "','" . $_GET['expense_category'] ."','" . $_GET['amount'] ."','" . $_GET['remark'] ."','" . $_GET['vehicle_ref'] ."','" . $_GET['date'] ."','" . $_GET['entry_type'] ."')";
        $result = $conn->query($sql1);
       

        $sql = "SELECT expense FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['expense'];
        $no2 = $no + 1;
        $sql = "update invpara set expense = $no2 where expense = $no";
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
        $sql = "update customer set name = '" . $_GET['name'] . "' ,address = '" . $_GET['address'] . "' ,dob = '" . $_GET['dob'] .  "',date = '" . $_GET['date'] .  "'  where cid = '" . $_GET['cid'] . "'";
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