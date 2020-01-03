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


    $DRIVER = $_GET['driver_ref'];
    $CLEANER = $_GET['cleaner_ref'];

    $sql = "SELECT * FROM driver_master_file where driver_ref = '" . $_GET['driver_ref'] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $DRIVER_NAME = $row['driver_name'];

    $sql = "SELECT * FROM cleaner_master where cleaner_ref = '" . $_GET['cleaner_ref'] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $CLEANER_NAME = $row['cleaner_name'];



    if ($_GET['DC_FLAG'] == "D") {

        $DC = "Driver";



        echo "<div id='main-table' class='container'>
              <h4>  $DC  Salary</h4>
              <h6>  Name : $DRIVER_NAME  </h6>

              <p>From : $FROM  &nbsp&nbsp&nbsp&nbsp&nbsp To : $TO</p>
              <table class='table table-bordered'>
                <thead>
                  <tr>
                    <th>Trip Ref</th>
                    <th>Date</th>
                    <th>Run Number</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Salary</th>
                  </tr>
                </thead>
                <tbody>";



                        $sql = "select * from trip where driver_ref = '" . $DRIVER . "' and date between '" . $FROM . "' and '" . $TO . "' order by date";



                    $sal_tot = 0;
                    $DAY_COUNT = 0;
                    $CURRENT_DATE = "";
                   
                        foreach ($conn->query($sql) as $row) {

                                    $sqlD = "SELECT * FROM driver_master_file where driver_ref = '" . $row['driver_ref'] . "'";
                                    $resultD = $conn->query($sqlD);
                                    $rowD = $resultD->fetch();
                                    $DRIVER_NAME = $rowD['driver_name'];


                             echo "<tr>
                                    <td>" . $row['trip_ref'] . "</td>
                                    <td>" . $row['date'] . "</td>
                                    <td>" . $row['run_no'] . "</td>
                                    <td>" . $row['from_loc'] . "</td>
                                    <td>" . $row['to_loc'] . "</td>
                                   
                                    <td style= 'text-align: right;'>" . number_format($row['damount'],2) . "</td>
                                  </tr>
                                  <tr>";

                            $sal_tot = $sal_tot + $row['damount'];

                            if ($CURRENT_DATE != $row['date']) {
                                $CURRENT_DATE = $row['date'];

                                if ($row['camount'] == 0) {
                                    $DAY_COUNT = $DAY_COUNT + 2;
                                }else{
                                    $DAY_COUNT = $DAY_COUNT + 1;
                                }

                            }else{
                                if ($row['camount'] == 0) {
                                    $DAY_COUNT = $DAY_COUNT + 1;
                                }
                            }


                        }



                        $sql_DEDUCTION = "select * from deduction where driver_ref = '" . $DRIVER . "' and date between '" . $FROM . "' and '" . $TO . "'";
                        $DEDUCTION = 0;
                        foreach ($conn->query($sql_DEDUCTION) as $row_DEDUCTION) {
                                    $DEDUCTION = $DEDUCTION + $row_DEDUCTION['amount'];
                        }
                         $sql_ADVANCE = "select * from advance where driver_ref = '" . $DRIVER . "' and date between '" . $FROM . "' and '" . $TO . "'";
                        $ADVANCE = 0;
                        foreach ($conn->query($sql_ADVANCE) as $row_ADVANCE) {
                                    $ADVANCE = $ADVANCE + $row_ADVANCE['amount'];
                        }


                        $sql_LOAN = "select * from loan where driver_ref = '" . $DRIVER . "' and end_date > '" . $FROM . "' ";
                        $LOAN = 0;
                        foreach ($conn->query($sql_LOAN) as $row_LOAN) {
                                    $temp_01 = $row_LOAN['amount']/$row_LOAN['monthes'];
                                    $LOAN = $LOAN + $temp_01;
                        }




                            echo "<tr>

                                  <td colspan='5' style= 'text-align: right;'><b>Driver Net Salary</b></td>
                                  <td style= 'text-align: right;'><b>" . number_format($sal_tot,2) . "<b></td>
                                  </tr>";

                                  $TOTAL_SALARAY = $sal_tot;


                        $sql_C = "select * from trip where cleaner_ref = '" . $_GET['cleaner_ref'] . "' and date between '" . $FROM . "' and '" . $TO . "'";

                        
                        $sal_tot_C = 0;
                        foreach ($conn->query($sql_C) as $rowCC) {                           

                            $sal_tot_C = $sal_tot_C + $rowCC['camount'];

                        }


                                  echo "<tr>
                                    <td colspan='5' style= 'text-align: right;'><b>Cleaner Net Salary</b></td>
                                    <td style= 'text-align: right;'><b>" . number_format($sal_tot_C,2) . "<b></td>
                                  </tr>
                                  <tr>";

                                 $TOTAL_SALARAY = $TOTAL_SALARAY + $sal_tot_C;

                                  ////////////////////////////////////////////////////////////////////////////////////
                                  // $BS = 13900 / 26;
                                  // $BS = $BS * $DAY_COUNT;
                                  // echo "<tr>
                                  // <td colspan='5' style= 'text-align: right;'><b>Basic Salary</b></td>
                                  // <td style= 'text-align: right;'><b>" . number_format($BS,2) . "<b></td>
                                  // </tr>";

                                  echo "<tr>
                                  <td colspan='5' style= 'text-align: right;'><b>Deduction</b></td>
                                  <td style= 'text-align: right;'><b>(" . number_format($DEDUCTION,2) . ")<b></td>
                                  </tr>";

                                  $TOTAL_SALARAY = $TOTAL_SALARAY - $DEDUCTION;

                                  echo "<tr>
                                  <td colspan='5' style= 'text-align: right;'><b>Loan</b></td>
                                  <td style= 'text-align: right;'><b>(" . number_format($LOAN,2) . ")<b></td>
                                  </tr>";

                                  // $E_TEMP = 1000/26;
                                  // $B_ALLOW_2005 = $E_TEMP * $DAY_COUNT;

                                  // $E_TEMP = 2500/26;
                                  // $ALLOW_2016 = $E_TEMP * $DAY_COUNT;

                                  // $E_TEMP = $BS + $B_ALLOW_2005 + $ALLOW_2016;
                                  // $E_TEMP = $E_TEMP/100;
                                  // $EPF = $E_TEMP*8;

                                  // echo "<tr>
                                  // <td colspan='5' style= 'text-align: right;'><b>EPF</b></td>
                                  // <td style= 'text-align: right;'><b>(" . number_format($EPF,2) . ")<b></td>
                                  // </tr>";

                                   echo "<tr>
                                  <td colspan='5' style= 'text-align: right;'><b>Advance</b></td>
                                  <td style= 'text-align: right;'><b>(" . number_format($ADVANCE,2) . ")<b></td>
                                  </tr>";



                                  $TOTAL_SALARAY = $TOTAL_SALARAY - $LOAN - $ADVANCE;

                                 
                                  echo "<tr>
                                  <td colspan='5' style= 'text-align: right;'><b>Total Salary</b></td>
                                  <td style= 'text-align: right;'><b>" . number_format($TOTAL_SALARAY,2) . "<b></td>
                                  </tr>
                                  <tr>";


                echo "</tbody>
              </table>
            </div>";


    }

    if ($_GET['DC_FLAG'] == "C") {
       
        $DC = "Cleaner";



        echo "<div id='main-table' class='container'>
              <h4>  $DC  Salary</h4>
              <h6>  Name : $CLEANER_NAME  </h6>

              <p>From : $FROM  &nbsp&nbsp&nbsp&nbsp&nbsp To : $TO</p>
              <table class='table table-bordered'>
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Trip Ref</th>
                    <th>Run Number</th>
                    <th>From</th>
                    <th>To</th>
                    
                    <th>Salary</th>
                  </tr>
                </thead>
                <tbody>";



                        $sql = "select * from trip where cleaner_ref = '" . $CLEANER . "' and date between '" . $FROM . "' and '" . $TO . "'";

                        $sal_tot = 0;

                        foreach ($conn->query($sql) as $row) {



                                    $sqlC = "SELECT * FROM cleaner_master where cleaner_ref = '" . $row['cleaner_ref'] . "'";
                                    $resultC = $conn->query($sqlC);
                                    $rowC = $resultC->fetch();
                                    $CLEANER_NAME = $rowC['cleaner_name'];

                                   


                             echo "<tr>
                                    <td>" . $row['date'] . "</td>
                                    <td>" . $row['trip_ref'] . "</td>
                                    <td>" . $row['run_no'] . "</td>
                                     <td>" . $row['from_loc'] . "</td>
                                    <td>" . $row['to_loc'] . "</td>
                                    <td style= 'text-align: right;'>" . number_format($row['camount'],2) . "</td>
                                  </tr>
                                  <tr>";

                            $sal_tot = $sal_tot + $row['camount'];

                        }

                         echo "<tr>
                                    <td colspan='5' style= 'text-align: right;'><b>Net Salary</b></td>
                                    <td style= 'text-align: right;'><b>" . number_format($sal_tot,2) . "<b></td>
                                  </tr>
                                  <tr>";


                echo "</tbody>
              </table>
            </div>";


    }





        // include 'function.php';


    ?>
