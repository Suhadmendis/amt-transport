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
              <h4>  Driver And Cleaner Consolidated</h4>
              <h6>  Name : $DRIVER_NAME  </h6>

              <p>From : $FROM  &nbsp&nbsp&nbsp&nbsp&nbsp To : $TO</p>
              <table class='table table-bordered' style='font-size: 14px;'>
                <thead class='thead-dark'>
                  <tr>
                    
                    <th>Driver Name</th>
                    <th>Cleaner Name</th>
                   
                    <th>Mileage</th>
                    <th>Driver Salary</th>
                    <th>Cleaner Salary</th>
                    <th>Total Salary</th>
                    <th>Advance</th>
                    <th>Loan</th>
                    <th>Deduction</th>
                    <th>Net Salary</th>
                    <th>Trip Amount</th>
                   
                   </tr>
                </thead>
                <tbody>";



                        $sql = "select * from trip where date between '" . $FROM . "' and '" . $TO . "' group by driver_ref order by date";



                    $CON_mileage = 0.00;
                    $CON_D_AMOUNT = 0.00;
                    $CON_C_AMOUNT = 0.00;
                    $CON_DC_SALARY = 0.00;
                    $CON_amo = 0.00;
                    $CON_NET_SAL = 0.00;
                    $CON_DD_AMOUNT = 0.00;


                        foreach ($conn->query($sql) as $row) {

                                     $sqlD = "SELECT * FROM driver_master_file where driver_ref = '" . $row['driver_ref'] . "'";
                                      $result = $conn->query($sqlD);
                                      $rowD = $result->fetch();
                                      $DRIVER_NAME = $rowD['driver_name'];

                                      $sqlC = "SELECT * FROM cleaner_master where cleaner_ref = '" . $row['cleaner_ref'] . "'";
                                      $result = $conn->query($sqlC);
                                      $rowC = $result->fetch();
                                      $CLEANER_NAME = $rowC['cleaner_name'];

                                      //tot cal 
                                      
                                      $sqlCAL = "select sum(mileage) as mil_tot,sum(damount) as d_tot,sum(camount) as c_tot,sum(amount) as tot from trip where date between '" . $FROM . "' and '" . $TO . "' and driver_ref = '" . $row['driver_ref'] . "'";

                                      $result = $conn->query($sqlCAL);
                                      $rowCAL = $result->fetch();
                                      $mileage = $rowCAL['mil_tot'];
                                      $D_AMOUNT = $rowCAL['d_tot'];
                                      $C_AMOUNT = $rowCAL['c_tot'];
                                      $TOT_AMOUNT = $rowCAL['tot'];

                                      $DC_SALARY = $D_AMOUNT + $C_AMOUNT;


                                      //tot advance
                                      
                                      $sqlAD = "select sum(amount) as amo from advance where date between '" . $FROM . "' and '" . $TO . "' and driver_ref = '" . $row['driver_ref'] . "'";

                                      $result = $conn->query($sqlAD);
                                      $rowAD = $result->fetch();
                                      $amo = $rowAD['amo'];
                                     
                                      $NET_SAL = $DC_SALARY - $amo;

                                      //tot Deduction
                                      
                                      $sqlDE = "select sum(amount) as amo from deduction where date between '" . $FROM . "' and '" . $TO . "' and driver_ref = '" . $row['driver_ref'] . "'";

                                      $result = $conn->query($sqlDE);
                                      $rolDE = $result->fetch();
                                      $amo_DE = $rolDE['amo'];
                                     
                                      $NET_SAL = $NET_SAL - $amo_DE;
                                    

                                        echo "<tr>";
                                        echo "<td>" . $DRIVER_NAME . "</td>";
                                        echo "<td>" . $CLEANER_NAME . "</td>";
                                       
                                        echo "<td>" . $mileage . "</td>";
                                        echo "<td style='text-align: right;background-color: #ddffff;'>" . number_format($D_AMOUNT,2) . "</td>";
                                        echo "<td style='text-align: right;background-color: #ddffff;'>" . number_format($C_AMOUNT,2) . "</td>";
                                        echo "<td style='text-align: right;background-color: #91ffff;'>" . number_format($DC_SALARY,2) . "</td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'>(" . number_format($amo,2) . ")</td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'>(" . number_format(0,2) . ")</td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'>(" . number_format($amo_DE,2) . ")</td>";

                                        if ($NET_SAL < 0) {
                                             echo "<td style='text-align: right;background-color: #99ffaf;'>(" . number_format($NET_SAL,2) . ")</td>";
                                        }else{
                                             echo "<td style='text-align: right;background-color: #99ffaf;'>" . number_format($NET_SAL,2) . "</td>";
                                        }
                                        echo "<td style='text-align: right;background-color: #c4dede;'>" . number_format($TOT_AMOUNT,2) . "</td>";
                                       
                                        echo "</tr>";

                                    $CON_mileage = $CON_mileage + $mileage;
                                    $CON_D_AMOUNT = $CON_D_AMOUNT + $D_AMOUNT;
                                    $CON_C_AMOUNT = $CON_C_AMOUNT + $C_AMOUNT;
                                    $CON_DC_SALARY = $CON_DC_SALARY + $DC_SALARY;
                                    $CON_amo = $CON_amo + $amo;
                                    $CON_NET_SAL = $CON_NET_SAL + $NET_SAL;
                                    $CON_TOT_AMOUNT = $CON_TOT_AMOUNT + $TOT_AMOUNT;
                                    $CON_DD_AMOUNT = $CON_DD_AMOUNT + $amo_DE;


                        }

                                        echo "<tr>";
                                        echo "<td colspan='2'></b></td>";
                                        
                                        echo "<td><b>" . $CON_mileage . "</b></td>";
                                        echo "<td style='text-align: right;background-color: #ddffff;'><b>" . number_format($CON_D_AMOUNT,2) . "</b></td>";
                                        echo "<td style='text-align: right;background-color: #ddffff;'><b>" . number_format($CON_C_AMOUNT,2) . "</b></td>";
                                        echo "<td style='text-align: right;background-color: #91ffff;'><b>" . number_format($CON_DC_SALARY,2) . "</b></td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'><b>(" . number_format($CON_amo,2) . ")</b></td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'><b>(" . number_format(0,2) . ")</b></td>";
                                        echo "<td style='text-align: right;background-color: antiquewhite;'><b>(" . number_format($CON_DD_AMOUNT,2) . ")</b></td>";

                                        if ($CON_NET_SAL < 0) {
                                             echo "<td style='text-align: right;background-color: #99ffaf;'><b>(" . number_format($CON_NET_SAL,2) . ")</b></td>";
                                        }else{
                                             echo "<td style='text-align: right;background-color: #99ffaf;'><b>" . number_format($CON_NET_SAL,2) . "</b></td>";
                                        }
                                        echo "<td style='text-align: right;background-color: #c4dede;'><b>" . number_format($CON_TOT_AMOUNT,2) . "</b></td>";
                                       
                                        echo "</tr>";




                echo "</tbody>
              </table>
            </div>";


    



    ?>
