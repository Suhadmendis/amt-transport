<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT cleaner_master_code FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['cleaner_master_code'];
   
    $tmpinvno = "0000000" . $row["cleaner_master_code"];
    $lenth = strlen($tmpinvno);
    $no = trim("CR/") . substr($tmpinvno, $lenth - 7);

    $ResponseXML .= "<cleaner_ref_Text><![CDATA[$no]]></cleaner_ref_Text>";
   
    
    $ResponseXML .= "</new>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction(); 
        
        $sql = "delete from cleaner_master where cleaner_ref = '" . $_GET['cleaner_ref'] . "'";
        $result = $conn->query($sql);

        $sql1 = "Insert into cleaner_master(cleaner_ref,cleaner_nic,cleaner_number,cleaner_name)values 
    ('" .  $_GET['cleaner_ref'] . "','" . $_GET['cleaner_nic'] . "','" . $_GET['cleaner_number'] ."','" . $_GET['cleaner_name'] ."') ";

        $result = $conn->query($sql1);
      
        
        $sql = "SELECT cleaner_master_code FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['cleaner_master_code'];
        $no2 = $no + 1;
        $sql = "update invpara set cleaner_master_code = $no2 where cleaner_master_code = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

