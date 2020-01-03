<?php
session_start();
include_once './connection_sql.php';
?>

<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Trip History</b></h3>
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
                            <th>Trip Ref</th>
                            <th>Date</th>
                            <th>Item</th>
                            <th>Vehicle</th>
                            <th>Mileage</th>
                            <th>Driver</th>
                            <th>Cleaner</th>
                            <th>Department</th>
                            <th>Run No</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        require_once("./connection_sql.php");

                        $sql = "select * from trip order by trip_ref DESC";

                
                        foreach ($conn->query($sql) as $row) {



                                    $sqlC = "SELECT * FROM cleaner_master where cleaner_ref = '" . $row['cleaner_ref'] . "'";
                                    $resultC = $conn->query($sqlC);
                                    $rowC = $resultC->fetch();
                                    $CLEANER_NAME = $rowC['cleaner_name'];

                                    $sqlD = "SELECT * FROM driver_master_file where driver_ref = '" . $row['driver_ref'] . "'";
                                    $resultD = $conn->query($sqlD);
                                    $rowD = $resultD->fetch();
                                    $DRIVER_NAME = $rowD['driver_name'];

                                    $sqlI = "SELECT * FROM item_master_file where item_ref = '" . $row['item_ref'] . "'";
                                    $resultI = $conn->query($sqlI);
                                    $rowI = $resultI->fetch();
                                    $ITEM_NAME = $rowI['item_name'];

                                    $sqlV = "SELECT * FROM vehicle_master1 where vehicle_ref = '" . $row['vehicle_ref'] . "'";
                                    $resultV = $conn->query($sqlV);
                                    $rowI = $resultV->fetch();
                                    $VEHICLE_NUMBER = $rowV['vehicle_number'];

                             echo "<tr>
                                    <td>" . $row['trip_ref'] . "</td>
                                    <td>" . $row['date'] . "</td>
                                    <td>" . $ITEM_NAME . "</td>
                                    <td>" . $VEHICLE_NUMBER . "</td>
                                    <td>" . $row['mileage'] . "</td>
                                    <td>" . $DRIVER_NAME . "</td>
                                    <td>" . $CLEANER_NAME . "</td>
                                    <td>" . $row['department'] . "</td>
                                    <td>" . $row['run_no'] . "</td>
                                  </tr>
                                  <tr>";

                        }





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



