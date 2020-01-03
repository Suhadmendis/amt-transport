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
                            <th>QTY</th>
                            <th>QTY</th>
                            <th>QTY</th>
                            <th>QTY</th>
                            <th>QTY</th>
                            <th>QTY</th>
                            <th>QTY</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        require_once("./connection_sql.php");

                        $sql = "select * from trip Group by driver_ref";

                        $count = 1;
                        foreach ($conn->query($sql) as $row) {

                            $sqlDcount = "SELECT count(driver_ref) FROM trip where driver_ref = '" . $row['driver_ref'] . "'";
                            $result = $conn->query($sqlDcount);
                            $rowDcount = $result->fetch();
                            
                            
                            $sqlDname = "SELECT driver_name FROM driver_master_file where driver_ref = '" . $row['driver_ref'] . "'";
                            $result = $conn->query($sqlDname);
                            $rowDname = $result->fetch();


                            echo "<tr>";
                            echo "<td>" . $count . "</td>";
                            echo "<td>" . $rowDname['driver_name'] . "</td>";
                            echo "<td>" . $rowDcount[0] . "</td>";
                            echo "</tr>";


                            ++$count;
                        }
                        ?>

                    </tbody>
                </table>






            </div>
        </form>
    </div>

</section>
<script src="js/trip.js"></script>


<script>newent();</script>




