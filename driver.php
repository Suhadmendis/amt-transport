<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Summery</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">


                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">

                    <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a  onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; SAVE
                    </a>
                    <a onclick="edit();" class="btn btn-warning btn-sm ">
                        <span class="glyphicon glyphicon-edit"></span> &nbsp; EDIT
                    </a>       
                    <a onclick="delete1();" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE
                    </a>
                    <a onclick="NewWindow('search_driver_master_file.php', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                    <a onclick="print();" class="btn btn-primary btn-sm" >
                        <span class="glyphicon glyphicon-print"></span> &nbsp; PRINT
                    </a>
                </div>
                <br>
                <div id="msg_box"  class="span12 text-center"></div>


                <table id='myTable' class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>LORRY NO.</th>
                            <th>RUN NO.</th>
                            <th>AMOUNT</th>
                            <th>DAY PAY DRYVER</th>
                            <th>DRIVER'S SALARY</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        require_once("./connection_sql.php");

                        $sql = "select * from trip where driver_ref = 'CR/0000030'";

$amount = 0.00; 
$damount = 0.00; 
                        foreach ($conn->query($sql) as $row) {

                            $sqlDcount = "SELECT vehicle_number FROM vehicle_master1 where vehicle_ref = '" . $row['vehicle_ref'] . "'";
                            $result = $conn->query($sqlDcount);
                            $rowVname = $result->fetch();



                            echo "<tr>";

                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $rowVname[0] . "</td>";
                            echo "<td>" . $row['run_no'] . "</td>";
                            echo "<td>" . $row['amount'] . "</td>";
                            echo "<td>" . 0 . "</td>";
                            echo "<td>" . $row['damount'] . "</td>";


                            echo "</tr>";
                            
                            $amount = $amount + $row['amount']; 
                            $damount = $damount + $row['damount']; 
                            
                        }
                        
                        echo "<tr>";

                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td>" . $amount . "</td>";
                        echo "<td>" . 0 . "</td>";
                        echo "<td>" . $damount . "</td>";


                        echo "</tr>";
                        ?>

                    </tbody>
                </table>






            </div>
        </form>
    </div>

</section>
<script src="js/trip.js"></script>


<script>newent();</script>




