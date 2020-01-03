<?php
session_start();
include_once './connection_sql.php';
?>

<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Deduction</b></h3>
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
                            <th>Expense Ref</th>
                            <th>Vehicle</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Remark</th>
                         

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        require_once("./connection_sql.php");
                        
                       // $sql = "SELECT * FROM view_salary WHERE date BETWEEN '2019-02-01' AND '2019-02-15'";
                        
                        $sql = "select * from expense order by expense_category";
                        
                        $vehicleEx = "";
                        
                        $tot = 0.00;
                        $subtot = 0.00;
                        
                        

                        $sw01 = "OFF";
                        foreach ($conn->query($sql) as $row) {

                            if ($vehicleEx != $row['expense_category']) {

                                if ($sw01 == "ON") {
 
                                    echo "<tr>";
                                    echo "<td colspan='3'  style='text-align: right;'><b>Sub Total</b></td>";
                                    echo "<td><b>" . number_format($subtot,2) . "</b></td>";
                                    echo "<td></td>";
                                    echo "</tr>";
                                        
                                           $tot = $tot + $subtot;                                

                                }
                             
                                $sw01 = "ON";


                                echo "<tr>";
                                echo "<td colspan='5'><b>" . $row['expense_category'] . "</b></td>";
                                
                                echo "</tr>";

                                $vehicleEx  = $row['expense_category'];

                                  echo "<tr>";
                                echo "<td>" . $row['expense_ref'] . "</td>";
                                echo "<td>" . $row['vehicle_ref'] . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>" . $row['amount'] . "</td>";
                                echo "<td>" . $row['expense_category'] . "</td>";
                                echo "</tr>";
                                $subtot = $row['amount'];

                            }else{
                                  
                                
                                echo "<tr>";
                                echo "<td>" . $row['expense_ref'] . "</td>";
                                echo "<td>" . $row['vehicle_ref'] . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>" . $row['amount'] . "</td>";
                                echo "<td>" . $row['expense_category'] . "</td>";
                                echo "</tr>";

                                $subtot = $subtot + $row['amount'];
                            }
                           
                                 


                        }
                                    echo "<tr>";
                                    echo "<td colspan='3'  style='text-align: right;'><b>Sub Total</b></td>";
                                    echo "<td><b>" . number_format($subtot,2) . "</b></td>";
                                    echo "<td></td>";
                                    echo "</tr>";

                                    $tot = $tot + $subtot;
                        
                                    echo "<tr>";
                                    echo "<td colspan='3' style='text-align: right;'><b>Grand Total</b></td>";
                                    echo "<td><b>" . number_format($tot,2) . "</b></td>";
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



