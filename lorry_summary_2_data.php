<?php session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Print</title>
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        /*@media print {
            a[href]:after {
                content: none !important;
            }
        }*/
        a:link, a:visited {

            text-decoration: none;
            color:#000000;
        }


        a:hover {
            text-decoration: underline;
        }
        body {
            color: #333;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 16px;
            line-height: 1.32857;
        }
    /*    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            border-top:1px solid #DDDDDD;
            line-height:1.2857;
            padding:1.5px;

            vertical-align:top;
        }
        .right {
            text-align: right;
        }   
        .left {
            text-align: left;
        }  
        .center {
            text-align: center;
        }
        .table1 {
            border-collapse: collapse;
            border: 1px;
        }
        .table1, td, th {

            font-family: Arial, Helvetica, sans-serif;
            padding: 5px;

        }
        .table1 th {
            font-weight: bold;
            font-size: 12px;
        }
        .table1 td {
            font-size: 12px;
            border-bottom: none;
            border-top: none;
        }
        #main-table{
        

        }*/
    </style>
</head>



<body> 
    <?php
    require_once ("./connection_sql.php");
    date_default_timezone_set("Asia/Colombo");

    //common variables
    $DC = "";

    $FROM = $_GET['from_txt'];
    $TO = $_GET['to_txt'];


   
    // $sql = "SELECT * FROM driver_master_file where driver_ref = '" . $_GET['driver_ref'] . "'";
    // $result = $conn->query($sql);
    // $row = $result->fetch();
    // $DRIVER_NAME = $row['driver_name'];

    // $sql = "SELECT * FROM cleaner_master where cleaner_ref = '" . $_GET['cleaner_ref'] . "'";
    // $result = $conn->query($sql);
    // $row = $result->fetch();
    // $CLEANER_NAME = $row['cleaner_name'];

        echo "<div id='main-table' class='' >
              <h4> Lorry Summary</h4>
              

              <p>From : $FROM  &nbsp&nbsp&nbsp&nbsp&nbsp To : $TO</p>
              <table class='table table-bordered' style='font-size: 14px;'>
                <thead class='thead-dark'>
                  <tr>
                    
                    <th rowspan=2>Lorry No</th>
                    <th>Mileage</th>
                    <th>Driver Salary</th>
                    <th>Cleaner Salary</th>
                    <th>Vehicle Expenses</th>
                    <th>Fuel</th>
                    <th>Total Amount</th>
                    <th>Trip Amount</th>
                    <th>Balance</th>
                    
                   </tr>
                   <tr>
                    
                    <th>Lorry No</th>
                    <th>Mileage</th>
                    <th>Driver Salary</th>
                    <th>Cleaner Salary</th>
                    <th>Vehicle Expenses</th>
                    <th>Fuel</th>
                    <th>Total Amount</th>
                    <th>Trip Amount</th>
                    <th>Balance</th>
                    
                   </tr>
                </thead>
                <tbody>";



                            $sql = "SELECT * from vehicle_master1";

                        // $sql = "select *,SUM(mileage) as MIL,SUM(damount) as DS,SUM(camount) as CS,SUM(amount) as FA from trip where date between '" . $FROM . "' and '" . $TO . "' group by vehicle_ref order by date";
                   


                        foreach ($conn->query($sql) as $rowm) {
                                $sw = "off";

                                    $sqls = "SELECT *,SUM(mileage) as MIL,SUM(damount) as DS,SUM(camount) as CS,SUM(amount) as FA from trip where date between '" . $FROM . "' and '" . $TO . "' and vehicle_ref = '" . $rowm['vehicle_ref'] . "'";
                                    foreach ($conn->query($sqls) as $row) {
                                        if ($row['MIL'] != "") {
                                            $sw = "on";
                                        }
                                    }


                                if ($sw == "on") {
                                    


                                }


                                

                        }


                echo "</tbody>
              </table>
            </div>";


    



    ?>
