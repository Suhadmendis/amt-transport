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
                                <th>Cleaner Ref No.</th>
                                <th>Date</th>
                                <th>Cleaner NIC No.</th>
                                <th>Cleaner Name</th>
                                <th>Cleaner Salary</th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            require_once("./connection_sql.php");

                            $sql = "select * from view_salary order by cleaner_ref";

                            $vehicleEx = "";

                            //$totmilage = 0;
                            $totsal = 0.00;

                            $sw01 = "OFF";
                            foreach ($conn->query($sql) as $row) {

                                if ($vehicleEx != $row['cleaner_ref']) {

                                    if ($sw01 == "ON") {

                                        echo "<tr>";
                                        echo "<td colspan='3'  style='text-align: right;'><b>Total Salary</b></td>";
                                        echo "<td><b>" . number_format($totsal, 2) . "</b></td>";
                                        echo "<td></td>";
                                        echo "</tr>";
                                    }

                                    $sw01 = "ON";


                                    echo "<tr>";
                                    echo "<td colspan='5'><b>" . $row['cleaner_ref'] . "</b></td>";

                                    echo "</tr>";

                                    $vehicleEx = $row['cleaner_ref'];

                                    echo "<tr>";
                                    echo "<td>" . $row['cleaner_ref'] . "</td>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $row['cleaner_nic'] . "</td>";
                                    echo "<td>" . $row['cleaner_name'] . "</td>";
                                    echo "<td>" . $row['camount'] . "</td>";
                                    echo "</tr>";
                                    $totsal = $row['camount'];
                                } else {


                                    echo "<tr>";
                                    echo "<td>" . $row['cleaner_ref'] . "</td>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $row['cleaner_nic'] . "</td>";
                                    echo "<td>" . $row['cleaner_name'] . "</td>";
                                    echo "<td>" . $row['camount'] . "</td>";
                                    echo "</tr>";
                                    $totsal = $totsal + $row['camount'];
                                }
                            }
                            echo "<tr>";
                            echo "<td colspan='3'  style='text-align: right;'><b>Total Salary</b></td>";
                            echo "<td><b>" . number_format($totsal, 2) . "</b></td>";
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



