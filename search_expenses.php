<?php
session_start();
include_once './connection_sql.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />


        <title>Search Customer</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">


            <script language="JavaScript" src="js/search_expenses.js"></script>



    </head>

    <body>

        <?php if (isset($_GET['cur'])) { ?>
            <input type="hidden" value="<?php echo $_GET['cur']; ?>" id="cur" />
            <?php
        } else {
            ?>
            <input type="hidden" value="" id="cur" />
            <?php
        }
        ?>
        <table width="735"   class="table table-bordered">

            <tr>
                <?php
                $stname = "";
                if (isset($_GET['stname'])) {
                    $stname = $_GET["stname"];
                }
                ?>
                <td width="24" ><input type="text" size="20" name="cusno" id="cusno" value=""  class="form-control" tabindex="1" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <td width="24" ><input type="text" size="70" id="customername1" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <td width="24" ><input type="text" size="70" id="customername2" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <!--<td width="24" ><input type="text" size="70" name="customername" id="customername" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>-->
        </table>    
        <div id="filt_table" class="CSSTableGenerator">  <table width="735"   class="table table-bordered">
                <?php
              
                if ($stname == "gcode") {
                    $sql = "SELECT * from expense where entry_type = 'G' order by expense_ref desc";
                } 
                
                if ($stname == "vcode") {
                    echo "<tr>
                    <th>Expense Ref.</th>
                    <th>Expense Category</th>
                    <th>Vehicle</th>
                    <th>Amount</th>
                </tr>";
                    $sql = "SELECT * from expense where entry_type = 'V' order by expense_ref desc";
                }

                $stname = "";
                if (isset($_GET['stname'])) {
                    $stname = $_GET["stname"];
                }

                foreach ($conn->query($sql) as $row) {
                    $cuscode = $row['expense_ref'];
                    
                    if ($stname == "gcode") {
                        echo "<tr>                
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['expense_ref'] . "</a></td>
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['expense_category'] . "</a></td>
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['amount'] . "</a></td>
                             </tr>";
                    } 
                    
                    if ($stname == "vcode") {

                         $sqlv = "Select vehicle_number from vehicle_master1 where vehicle_ref = '".$row['vehicle_ref']."'";
                            $resultv = $conn->query($sqlv);
                            $rowv= $resultv->fetch();
                           


                        echo "<tr>                
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['expense_ref'] . "</a></td>
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['expense_category'] . "</a></td>
                              <td onclick=\"custno('$cuscode','$stname');\">" . $rowv['vehicle_number'] . "</a></td>
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['amount'] . "</a></td>
                             </tr>";
                    }
                    
                }
                ?>
            </table>
        </div>

    </body>
</html>
