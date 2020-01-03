<?php
session_start();
include_once './connection_sql.php';
?>

<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Cleaner Salary</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">




                <br>
                <div id="msg_box"  class="span12 text-center"></div>

                <div class="form-group-sm">

                    <a style="float: right;margin-right: 10px;" onclick="NewWindow('list_cleaner_salary.php', 'mywin', '1920', '1080', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; List
                    </a>
                </div>


                <div class="col-md-12">

                    <table id='myTable' class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>Fuel Ref No.</th>
                                <th>Vehicle Ref No. </th>
                                <th>Date</th>
                                <th>Rate</th>
                                <th>Fuel Type</th>
                                <th>Ltrs.</th>
                                <th>Amount</th>
                                <th>Voucher No.</th>



                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            require_once("./connection_sql.php");

                            $sql = "select * from view_vehicle_fuel_data group by fuel_ref";

                            $vehicleEx = "";

                            $subtotamt = 0.00;
                            $totamt = 0.00;
                            $subtotltr = 0;
                            $totltr = 0;
                           
                            $sw01 = "OFF";
                            foreach ($conn->query($sql) as $row) {

                                if ($vehicleEx != $row['fuel_ref']) {

                                    if ($sw01 == "ON") {

                                        echo "<tr>";
                                        echo "<td colspan='3'  style='text-align: left;'><b>Total Amount of LTRS</b></td>";
                                        echo "<td><b>" . number_format($subtotltr) . "</b></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td colspan='3'  style='text-align: left;'><b>Total Amount</b></td>";
                                        echo "<td><b>" . number_format($subtotamt, 2) . "</b></td>";
                                        echo "<td></td>";
                                        echo "</tr>";

                                        $totamt = $totamt + $subtotamt;
                                        $totltr = $totltr + $subtotltr;
                                    }

                                    $sw01 = "ON";


                                    echo "<tr>";
                                    echo "<td colspan='5'><b>" . $row['fuel_ref'] . "</b></td>";

                                    echo "</tr>";

                                    $vehicleEx = $row['fuel_ref'];

                                    echo "<tr>";
                                    
                                    echo "<td>" . $row['fuel_ref'] . "</td>";
                                    echo "<td>" . $row['vehicle_ref'] . "</td>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $row['rate'] . "</td>";
                                    echo "<td>" . $row['fuel_type'] . "</td>";
                                    echo "<td>" . $row['ltrs'] . "</td>";
                                    echo "<td>" . $row['amount'] . "</td>";
                                    echo "<td>" . $row['voucher_no'] . "</td>";
                                    
                                    echo "</tr>";
                                    
                                    $subtotltr = $row['ltrs'];
                                    $subtotamt = $row['amount'];
                                } else {


                                    echo "<tr>";
                                    echo "<td>" . $row['fuel_ref'] . "</td>";
                                    echo "<td>" . $row['vehicle_ref'] . "</td>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $row['fuel_type'] . "</td>";
                                    echo "<td>" . $row['ltrs'] . "</td>";
                                    echo "<td>" . $row['rate'] . "</td>";
                                    echo "<td>" . $row['amount'] . "</td>";
                                    echo "<td>" . $row['voucher_no'] . "</td>";
                                    echo "</tr>";
                                    $subtotltr = $subtotltr + $row['ltrs'];
                                    $subtotamt = $subtotamt + $row['amount'];
                                }
                            }
                            echo "<tr>";
                            echo "<td colspan='3'  style='text-align: right;'><b>Sub Total LTRS</b></td>";
                            echo "<td><b>" . number_format($subtotltr) . "</b></td>";
                            echo "<td colspan='3'  style='text-align: right;'><b>Sub Total Amount</b></td>";
                            echo "<td><b>" . number_format($subtotamt,2) . "</b></td>";
                            echo "<td></td>";
                            echo "</tr>";

                            $totamt = $totamt + $subtotamt;
                            $totltr = $totltr + $subtotltr;

                            echo "<tr>";
                            echo "<td colspan='3' style='text-align: right;'><b>Grand Total LTRS</b></td>";
                            echo "<td><b>" . number_format($totltr) . "</b></td>";
                            echo "<td colspan='3' style='text-align: right;'><b>Grand Total Amount</b></td>";
                            echo "<td><b>" . number_format($totamt, 2) . "</b></td>";
                            echo "<td></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td></td>";
                            echo "</tr>";
                            ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </form>
    </div>

</section>
<!-- <script src="js/deduction.js"></script>


<script>newent();</script>
-->



