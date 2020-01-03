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



                        $sql = "select *,SUM(mileage) as MIL,SUM(damount) as DS,SUM(camount) as CS,SUM(amount) as FA from trip where date between '" . $FROM . "' and '" . $TO . "' group by vehicle_ref order by date";



                    $CON_mileage = 0.00;
                    $CON_D_AMOUNT = 0.00;
                    $CON_C_AMOUNT = 0.00;
                    $CON_VE = 0.00;
                    $CON_FU = 0.00;
                    $CON_TOT_AMO = 0.00;
                    $CON_TRIP = 0.00;
                    $CON_BAL = 0.00;
                   


                        foreach ($conn->query($sql) as $row) {

                                     // $sqlD = "SELECT * FROM driver_master_file where driver_ref = '" . $row['driver_ref'] . "'";
                                     //  $result = $conn->query($sqlD);
                                     //  $rowD = $result->fetch();
                                     //  $DRIVER_NAME = $rowD['driver_name'];

                                      // $sqlC = "SELECT * FROM cleaner_master where cleaner_ref = '" . $row['cleaner_ref'] . "'";
                                      // $result = $conn->query($sqlC);
                                      // $rowC = $result->fetch();
                                      // $CLEANER_NAME = $rowC['cleaner_name'];

                                      //tot cal 
                                      
                                      // $sqlCAL = "select sum(mileage) as mil_tot,sum(damount) as d_tot,sum(camount) as c_tot,sum(amount) as tot from trip where date between '" . $FROM . "' and '" . $TO . "' and driver_ref = '" . $row['driver_ref'] . "'";

                                      // $result = $conn->query($sqlCAL);
                                      // $rowCAL = $result->fetch();
                                      // $mileage = $rowCAL['mil_tot'];
                                      // $D_AMOUNT = $rowCAL['d_tot'];
                                      // $C_AMOUNT = $rowCAL['c_tot'];
                                      // $TOT_AMOUNT = $rowCAL['tot'];

                                      // $DC_SALARY = $D_AMOUNT + $C_AMOUNT;


                                      // //tot advance
                                      
                                      // $sqlAD = "select sum(amount) as amo from advance where date between '" . $FROM . "' and '" . $TO . "' and driver_ref = '" . $row['driver_ref'] . "'";

                                      // $result = $conn->query($sqlAD);
                                      // $rowAD = $result->fetch();
                                      // $amo = $rowAD['amo'];
                                     
                                      // $NET_SAL = $DC_SALARY - $amo;

                                      //tot Deduction
                                      
                                      


   

                                    $sqlveh = "select * from vehicle_master1 where vehicle_ref ='" . $row['vehicle_ref'] . "'";
                                    $result = $conn->query($sqlveh);
                                    $rowveh = $result->fetch();
                                    $no = $rowveh['vehicle_number'];



                                    $sqlex = "select SUM(amount) as EXAMO from expense where vehicle_ref ='" . $row['vehicle_ref'] . "' and date between '" . $FROM . "' and '" . $TO . "'";
                                    $result = $conn->query($sqlex);
                                    $rowex = $result->fetch();

                                    $sqlfu = "select SUM(amount) as FUAMO from fuel where vehicle_ref ='" . $row['vehicle_ref'] . "' and date between '" . $FROM . "' and '" . $TO . "'";
                                    $result = $conn->query($sqlfu);
                                    $rowfu = $result->fetch();

                                        echo "<tr>";
                                        echo "<td>" . $no . "</td>";
                                        echo "<td>" . $row['MIL'] . "</td>";
                                       
                                        echo "<td style='text-align: right;background-color: antiquewhite;'>" . number_format($row['DS'],2) . "</td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'>" . number_format($row['CS'],2) . "</td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'>" . number_format($rowex['EXAMO'],2) . "</td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'>" . number_format($rowfu['FUAMO'],2) . "</td>";
                                        $TOT_AMOUNT = $row['DS']+$row['CS']+$rowex['EXAMO']+$rowfu['FUAMO'];
                                        echo "<td style='text-align: right;background-color: antiquewhite;'>(" . number_format($TOT_AMOUNT,2) . ")</td>";

                                        echo "<td style='text-align: right;background-color: #91ffff;'>" . number_format($row['FA'],2) . "</td>";
                                        echo "<td style='text-align: right;background-color: #91ffff;'>(" . number_format($row['FA']-$TOT_AMOUNT,2) . ")</td>";
                                        // echo "<td style='text-align: right;background-color: antiquewhite;'>(" . number_format($amo_DE,2) . ")</td>";

                                        // if ($NET_SAL < 0) {
                                        //      echo "<td style='text-align: right;background-color: #99ffaf;'>(" . number_format($NET_SAL,2) . ")</td>";
                                        // }else{
                                        //      echo "<td style='text-align: right;background-color: #99ffaf;'>" . number_format($NET_SAL,2) . "</td>";
                                        // }
                                        // echo "<td style='text-align: right;background-color: #c4dede;'>" . number_format($TOT_AMOUNT,2) . "</td>";
                                       
                                        echo "</tr>";

                                        $CON_mileage = $CON_mileage + $row['MIL'];
                                        $CON_D_AMOUNT = $CON_D_AMOUNT + $row['DS'];
                                        $CON_C_AMOUNT = $CON_C_AMOUNT + $row['CS'];
                                        $CON_VE = $CON_VE + $rowex['EXAMO'];
                                        $CON_FU = $CON_FU + $rowfu['FUAMO'];
                                        $CON_TOT_AMO = $CON_TOT_AMO + $TOT_AMOUNT;
                                        $CON_TRIP = $CON_TRIP + $row['FA'];
                                        $CON_BAL = $CON_BAL + $row['FA']-$TOT_AMOUNT;

                        }

                                        echo "<tr>";
                                        echo "<td ></b></td>";
                                        
                                        echo "<td><b>" . number_format($CON_mileage,2) . "</b></td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'><b>" . number_format($CON_D_AMOUNT,2) . "</b></td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'><b>" . number_format($CON_C_AMOUNT,2) . "</b></td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'><b>" . number_format($CON_VE,2) . "</b></td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'><b>" . number_format($CON_FU,2) . "</b></td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'><b>(" . number_format($CON_TOT_AMO,2) . ")</b></td>";
                                        echo "<td style='text-align: right;background-color: #91ffff;'><b>" . number_format($CON_TRIP,2) . "</b></td>";
                                        echo "<td style='text-align: right;background-color: #91ffff;'><b>" . number_format($CON_BAL,2) . "</b></td>";

                                        // if ($CON_NET_SAL < 0) {
                                        // }else{
                                        //      echo "<td style='text-align: right;background-color: #99ffaf;'><b>" . number_format($CON_NET_SAL,2) . "</b></td>";
                                        // }
                                        // echo "<td style='text-align: right;background-color: #c4dede;'><b>" . number_format($CON_TOT_AMOUNT,2) . "</b></td>";
                                       
                                        echo "</tr>";


                echo "</tbody>
              </table>
            </div>";


    



    ?>
