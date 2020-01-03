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

            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css"/>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

                <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
                    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

                    <!-- Include Required Prerequisites -->
                    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
                    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

                    <!-- Include Date Range Picker -->
                    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
                    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

                    </head>

                    <style>
                        .button {

                            background-color: #4CAF50; /* Green */
                            border: none;
                            color: white;
                            padding: 8px 16px;
                            text-align: center;
                            text-decoration: none;
                            display: inline-block;
                            font-size: 13px;
                            margin: 4px 2px;
                            -webkit-transition-duration: 0.4s; /* Safari */
                            transition-duration: 0.4s;
                            cursor: pointer;
                        }



                        .button2 {
                            background-color: #337ab7; 
                            color: white; 
                            border: 2px solid #337ab7;
                        }

                        .button2:hover {
                            background-color: #204d74;
                            color: white;
                            border: 2px solid #204d74;
                        }

                        #demo {
                            width: 420px;
                            heignth: 41px;
                            padding: 15px;
                            margin: 50px auto;
                        }

                    </style>



                    <body>

                        <div class="container">



                        </div>




                        <!--                                                                                <h2> DATE AND TIME RANGE PICKER EXAMPLE </h2>
                                                                                                        
                        
                                                                                                        <input type="text" id="demo" name="datefilter" value="" />-->


                        <br>

                            <div style="margin-left: 2%;margin-right: 2%;">
                                <div id="getTable">

                                </div>
                            </div>

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

<!--                            <table class="table-bordered" width="2000">
     <tr style="text-align: center;">
         <td width="20">NO</td>
         <td width="200">NAME</td>
         <td width="100">BASIC SALARY</td>
         <td width="100">BUDGET ALLOW 2005</td>
         <td width="100">ALLOW/GO V.ALLOW 2016</td>
         <td width="100">O/T HRS</td>
         <td width="100">WOR DAYS</td>
         <td width="100">GROSS SALARY</td>
         <td width="100">OVER TIME & INCLUDE CL SALARY</td>
         <td width="100">NET SALARY</td>
         <td width="100">LOAN /OD</td>
         <td width="100">E.P.F</td>
         <td width="100">ADVANCE</td>
         <td width="100">TOTAL DEDUCTION</td>
         <td width="100">BALANCE PAY</td>
         <td width=180">O/L</td>
         <td width="200">SIG</td>
         
     </tr>
     
      <tr style="text-align: center;">
         <td width="20">1</td>
         <td width="200">BANDARA M.S.</td>
         <td width="100">3,473.08</td>
         <td width="100">269.23</td>
         <td width="100">673.08</td>
         <td width="100">51.95</td>
         <td width="100">7</td>
         <td width="100">4,415.38</td>
         <td width="100">15,584.62</td>
         <td width="100">20,000.00</td>
         <td width="100">-</td>
         <td width="100">353.23</td>
         <td width="100">7,100.00</td>
         <td width="100">7,453.23</td>
         <td width="100">12,546.77</td>
         <td width=180">-</td>
         <td width="200"></td>
         
     </tr>
 </table>-->

                                        <script>

                                    var tableToExcel = (function() {                                                                         var uri = 'data:application/vnd.ms-excel;base64,'
                            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
return function(table, name) {
if (!table.nodeType) table = document.getElementById(table)
var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
window.location.href = uri + base64(format(template, ctx))
}
})()
                            </script>

                    </body>
                    </html>
                    <script language="JavaScript" src="js/list_driver_salary_summary.js"></script>
                    <script>csChange();</script>

                    <script>
                                $('#demo').daterangepicker({
                                "showISOWeekNumbers": true,
                                        "timePicker": true,
                                        "autoUpdateInput": true,
                                        "locale": {
                                        "cancelLabel": 'Clear',
                                                "format": "MMMM DD, YYYY @ h:mm A",
                                                "separator": " - ",
                                                "applyLabel": "Apply",
                                                "cancelLabel": "Cancel",
                                                "fromLabel": "From",
                                                "toLabel": "To",
                                                "customRangeLabel": "Custom",
                                                "weekLabel": "W",
                                                "daysOfWeek": [
                                                        "Su",
                                                        "Mo",
                                                        "Tu",
                                                        "We",
                                                        "Th",
                                                        "Fr",
                                                        "Sa"
                                                ],
                                                "monthNames": [
                                                        "January",
                                                        "February",
                                                        "March",
                                                        "April",
                                                        "May",
                                                        "June",
                                                        "July",
                                                        "August",
                                                        "September",
                                                        "October",
                                                        "November",
                                                        "December"
                                                ],
                                                "firstDay": 1
                                        },
                                        "linkedCalendars": true,
                                        "showCustomRangeLabel": false,
                                        "startDate": 1,
                                        "endDate": "December 31, 2016 @ h:mm A",
                                        "opens": "center"
                                });
                    </script>