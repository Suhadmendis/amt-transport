<?php
session_start();
include_once './connection_sql.php';
?>

<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Trip Details Summary</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">



                <div class="form-group-sm">


                    <a  onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; SAVE
                    </a>
                    <a onclick="edit();" class="btn btn-warning btn-sm ">
                        <span class="glyphicon glyphicon-edit"></span> &nbsp; EDIT
                    </a>       
                    <a onclick="delete1();" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE
                    </a>
                    <a onclick="NewWindow('search_deduction.php', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                    <a onclick="print();" class="btn btn-primary btn-sm" >
                        <span class="glyphicon glyphicon-print"></span> &nbsp; PRINT
                    </a>
                </div>
                <br>
                <div id="msg_box"  class="span12 text-center"></div>


                <div class="col-md-12">

                    <table id='myTable' class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>Vehicle Rep</th>
                                <th>Trip Ref</th>
                                <th>Date</th>
                                <th>Opening KM</th>
                                <th>Closing KM</th>
                                <th>Mileage</th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            require_once("./connection_sql.php");

                            $sql = "select * from trip order by vehicle_ref";

                            $vehicleEx = "";

                            $totmilage = 0;
                            $subtotmilage = 0;

                            $sw01 = "OFF";
                            foreach ($conn->query($sql) as $row) {

                                if ($vehicleEx != $row['vehicle_ref']) {

                                    if ($sw01 == "ON") {

                                        echo "<tr>";
                                        echo "<td colspan='3'  style='text-align: right;'><b>Sub Total Milage</b></td>";
                                        echo "<td><b>" . number_format($subtotmilage, 0) . "</b></td>";
                                        echo "<td></td>";
                                        echo "</tr>";

                                        $totmilage = $totmilage + $subtotmilage;
                                    }

                                    $sw01 = "ON";


                                    echo "<tr>";
                                    echo "<td colspan='5'><b>" . $row['vehicle_ref'] . "</b></td>";

                                    echo "</tr>";

                                    $vehicleEx = $row['vehicle_ref'];

                                    echo "<tr>";
                                    echo "<td>" . $row['vehicle_ref'] . "</td>";
                                    echo "<td>" . $row['trip_ref'] . "</td>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $row['opening_km'] . "</td>";
                                    echo "<td>" . $row['closing_km'] . "</td>";
                                    echo "<td>" . $row['mileage'] . "</td>";
                                    echo "</tr>";
                                    $subtotmilage = $row['mileage'];
                                } else {


                                    echo "<tr>";
                                    echo "<td>" . $row['vehicle_ref'] . "</td>";
                                    echo "<td>" . $row['trip_ref'] . "</td>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $row['opening_km'] . "</td>";
                                    echo "<td>" . $row['closing_km'] . "</td>";
                                    echo "<td>" . $row['mileage'] . "</td>";
                                    echo "</tr>";

                                    $subtotmilage = $subtotmilage + $row['mileage'];
                                }
                            }
                            echo "<tr>";
                            echo "<td colspan='3'  style='text-align: right;'><b>Sub Total Milage</b></td>";
                            echo "<td><b>" . number_format($subtotmilage, 0) . "</b></td>";
                            echo "<td></td>";
                            echo "</tr>";

                            $totmilage = $totmilage + $subtotmilage;

                            echo "<tr>";
                            echo "<td colspan='3' style='text-align: right;'><b>Total Milage</b></td>";
                            echo "<td><b>" . number_format($totmilage, 0) . "</b></td>";
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



