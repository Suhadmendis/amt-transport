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
  

    $FROM = $_GET['from_txt'];
    $TO = $_GET['to_txt'];


    $VEHICLE = $_GET['vehicle_ref'];
  

    $sql = "SELECT * FROM vehicle_master1 where vehicle_ref = '" . $VEHICLE . "'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $VEHICLE_NUMBER = $row['vehicle_number'];
    $FUEL_TYPE = $row['fuel_type'];

    if ($_GET['V_FLAG'] == "ONE") {

        echo "<div id='main-table' class='container'>
              <h4>  Fuel Report</h4>
              <h6>  Vehicle Number : $VEHICLE_NUMBER  </h6>
              <h6>  Fuel Type : $FUEL_TYPE  </h6>

              <p>From : $FROM  &nbsp&nbsp&nbsp&nbsp&nbsp To : $TO</p>
              <table class='table table-bordered'>
                <thead>
                  <tr>
                    <th>Fuel Ref</th>
                    <th>Date</th>
                    <th>Rate</th>
                    <th>LTRS</th>
                    <th>Voucher No</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>";



                        // $sql = "select * from trip where driver_ref = '" . $DRIVER . "' and date between '" . $FROM . "' and '" . $TO . "'";
                        $sql = "select * from fuel where vehicle_ref = '" . $VEHICLE . "' and date between '" . $FROM . "' and '" . $TO . "'";

                    $sal_tot = 0;
                        foreach ($conn->query($sql) as $row) {


                                    $sqlV = "SELECT * FROM vehicle_master1 where vehicle_ref = '" . $row['vehicle_ref'] . "'";
                                    $resultV = $conn->query($sqlV);
                                    $rowV = $resultV->fetch();
                                    $VEHICLE_NUMBER = $rowV['vehicle_number'];


                             echo "<tr>
                                    <td>" . $row['fuel_ref'] . "</td>
                                    <td>" . $row['date'] . "</td>
                                    <td style= 'text-align: right;'>" . $row['rate'] . "</td>
                                    <td style= 'text-align: right;'>" . $row['ltrs'] . "</td>
                                    <td>" . $row['voucher_no'] . "</td>
                                    <td style= 'text-align: right;'>" . number_format($row['amount'],2) . "</td>

                                  </tr>
                                  <tr>";

                            $sal_tot = $sal_tot + $row['amount'];

                        }

                         echo "<tr>
                                    <td colspan='5' style= 'text-align: right;'><b>Total Amount</b></td>

                                    <td style= 'text-align: right;'><b>" . number_format($sal_tot,2) . "<b></td>

                                  </tr>
                                  <tr>";


                        echo "</tbody>
                      </table>
                    </div>";


    }

    if ($_GET['V_FLAG'] == "ALL") {


        echo "<div id='main-table' class='container'>
              <h4>  Fuel Report</h4>
              <h6>  Vehicle Number : $VEHICLE_NUMBER  </h6>

              <p>From : $FROM  &nbsp&nbsp&nbsp&nbsp&nbsp To : $TO</p>
              <table class='table table-bordered'>
                <thead>
                  <tr>
                    <th>Fuel Ref</th>
                    <th>Date</th>
                    <th>Vehicle Number</th>
                    <th>Rate</th>
                    <th>LTRS</th>
                    <th>Fuel Type</th>
                    <th>Voucher No</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>";



                        // $sql = "select * from trip where driver_ref = '" . $DRIVER . "' and date between '" . $FROM . "' and '" . $TO . "'";
                        $sql = "select * from fuel where date between '" . $FROM . "' and '" . $TO . "'";

                    $sal_tot = 0;
                        foreach ($conn->query($sql) as $row) {


                                    $sqlV = "SELECT * FROM vehicle_master1 where vehicle_ref = '" . $row['vehicle_ref'] . "'";
                                    $resultV = $conn->query($sqlV);
                                    $rowV = $resultV->fetch();
                                    $VEHICLE_NUMBER = $rowV['vehicle_number'];


                             echo "<tr>
                                    <td>" . $row['fuel_ref'] . "</td>
                                    <td>" . $row['date'] . "</td>
                                    <td>" . $VEHICLE_NUMBER . "</td>
                                    <td style= 'text-align: right;'>" . $row['rate'] . "</td>
                                    <td style= 'text-align: right;'>" . $row['ltrs'] . "</td>
                                    <td>" . $rowV['fuel_type'] . "</td>
                                    <td>" . $row['voucher_no'] . "</td>
                                    <td style= 'text-align: right;'>" . number_format($row['amount'],2) . "</td>

                                  </tr>
                                  <tr>";

                            $sal_tot = $sal_tot + $row['amount'];

                        }

                         echo "<tr>
                                    <td colspan='7' style= 'text-align: right;'><b>Total Amount</b></td>

                                    <td style= 'text-align: right;'><b>" . number_format($sal_tot,2) . "<b></td>

                                  </tr>
                                  <tr>";


                        echo "</tbody>
                      </table>
                    </div>";
    }


    ?>
