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


   

        $DC = "Driver";

 $sqlV = "SELECT * FROM vehicle_master1 where vehicle_ref = '" . $_GET['vehicle_ref'] . "'";
                                    $resultV = $conn->query($sqlV);
                                    $rowV = $resultV->fetch();
                                    $VEHICLE = $rowV['vehicle_number'];

        echo "<div id='main-table' class='container'>
              <h4>  Number : $VEHICLE</h4>
          

              <p>From : $FROM  &nbsp&nbsp&nbsp&nbsp&nbsp To : $TO</p>
              <table class='table table-bordered'>
                <thead>
                  <tr>
                    <th>Trip Ref</th>
                    <th>Date</th>
                    <th>Run Number</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Driver</th>
                    <th>Trip Amount</th>



                  </tr>
                </thead>
                <tbody>";
    $VEHICLE = $_GET['vehicle_ref'];



                        $sql = "select * from trip where vehicle_ref = '" . $VEHICLE . "' and date between '" . $FROM . "' and '" . $TO . "' order by date";



                    $sal_tot = 0;
                    $DAY_COUNT = 0;
                    $CURRENT_DATE = "";
                    $TOT = 0;
                   
                        foreach ($conn->query($sql) as $row) {

                                    $sqlD = "SELECT * FROM driver_master_file where driver_ref = '" . $row['driver_ref'] . "'";
                                    $resultD = $conn->query($sqlD);
                                    $rowD = $resultD->fetch();
                                    $DRIVER_NAME = $rowD['driver_name'];

                                    $sqlC = "SELECT * FROM cleaner_master where cleaner_ref = '" . $row['cleaner_ref'] . "'";
                                    $resultC = $conn->query($sqlC);
                                    $rowC = $resultC->fetch();
                                    $DRIVER_NAME = $rowC['cleaner_name'];


                             echo "<tr>
                                    <td>" . $row['trip_ref'] . "</td>
                                    <td>" . $row['date'] . "</td>
                                    <td>" . $row['run_no'] . "</td>
                                    <td>" . $row['from_loc'] . "</td>
                                    <td>" . $row['to_loc'] . "</td>
                                    <td style= 'text-align: right;'>" . $DRIVER_NAME . "</td>
                                    <td style= 'text-align: right;'>" . number_format($row['amount'],2) . "</td>
                                  </tr>
                                  <tr>";
                     $TOT = $TOT + $row['amount'];

                        }



                                 
                                  echo "<tr>
                                  <td colspan='6' style= 'text-align: right;'><b>Total</b></td>
                                  <td style= 'text-align: right;'><b>" . number_format($TOT,2) . "<b></td>
                                  </tr>
                                  <tr>";


                echo "</tbody>
              </table>
            </div>";






    ?>
