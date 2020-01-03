<?php
session_start();
include_once './connection_sql.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />


        <title>Search Vehicle</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">


            <script language="JavaScript" src="js/search_cleaner_master.js"></script>



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
                <td width="122" ><input type="text" size="20" name="cusno" id="cleaner_ref_Text" value=""  class="form-control" tabindex="1" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <td width="200" ><input type="text" size="70" name="customername" id="cleaner_nic_Text" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <td width="200" ><input type="text" size="70" name="customername" id="cleaner_number_Text" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <td width="200" ><input type="text" size="70" name="customername" id="cleaner_name" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                
        </table>    
        <div id="filt_table" class="CSSTableGenerator">  <table width="735"   class="table table-bordered">
                <tr>
                    <th>VREF</th>
                    <th>Vehicle No</th>
                    <th>Department</th>
                    <th>Cleaner Name</th>
                  
                </tr>
                <?php
                $sql = "SELECT * from cleaner_master ";


                $sql = $sql . " order by cleaner_ref limit 50";

                $stname = "";
                if (isset($_GET['stname'])) {
                    $stname = $_GET["stname"];
                    
                }

                foreach ($conn->query($sql) as $row) {
                    $cuscode = $row['cleaner_ref'];
                    echo "<tr>               
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['cleaner_ref'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['cleaner_nic'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['cleaner_number'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['cleaner_name'] . "</a></td>
                           
                            </tr>";
                }
                ?>
            </table>
        </div>

            .
    </body>
</html>
