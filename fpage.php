<!-- Main content -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Home Page</small>
    </h1>

</section>

<section class="content">


    <?php
    require_once("./connection_sql.php");

   $colors = array("bg-black","bg-gray","bg-silver","bg-white","bg-aqua","bg-blue","bg-navy","bg-teal","bg-green","bg-olive","bg-lime","bg-yellow","bg-orange","bg-red","bg-fuchsia","bg-purple","bg-maroon","bg-darken-1","bg-darken-2","bg-darken-3","bg-darken-4","bg-lighten-1","bg-lighten-2","bg-lighten-3","bg-lighten-4");


    
    
    
//    $sql = "Select * from doc order by grp";
    $sql = "select * from view_menu WHERE username = '" . $_SESSION['CURRENT_USER'] . "' AND doc_view = '1' ORDER BY grp";

    $grp = "";
    $colorCount = 3;
    //time
    $time = date('H');
    foreach ($conn->query($sql) as $row) {

        if ($grp != $row['grp']) {
            ++$colorCount;
            if ($grp!="") {
                 echo "</div>";
            }
           
            
            echo "<div class='row'>
                <h1>&nbsp;&nbsp;" . $row["grp"] . "</h1>
                    <div class='col-md-3'>
                        <div class='small-box " . $colors[$colorCount] . "'>
                            <div class='inner'>
                                <h3>" . $row["docname"] . "</h3>
                                <h4>" . $row["docname"] . "</h4>
                            </div>
                        <div class='icon'>
                            <i class='ion ion-bag'></i>
                        </div>
                        <a href='home.php?url=" . $row["name"] . "' target='_blank' class='small-box-footer'><i class='fa fa-arrow-circle-right'></i></a>
                    </div>
                </div>";
            $grp = $row['grp'];
        }else{
             echo "<div class='col-md-3'>
                        <div class='small-box " . $colors[$colorCount] . "'>
                            <div class='inner'>
                                <h3>" . $row["docname"] . "</h3>
                                <h4>" . $row["docname"] . "</h4>
                            </div>
                        <div class='icon'>
                            <i class='ion ion-bag'></i>
                        </div>
                        <a href='home.php?url=" . $row["name"] . "' target='_blank' class='small-box-footer'><i class='fa fa-arrow-circle-right'></i></a>
                    </div>
                </div>";
        }
    }
    ?>
    <!--
        <div class="row">
            <div class="col-md-12">
                <h2>Master Files</h2>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Cleaner Master</h3>
                        <h4>Cleaner Master</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=cleaner_master" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
    
            <div class="col-md-3">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Driver Master</h3>
                        <h4>Driver Master</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=driver_master" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Item Master</h3>
                        <h4>Item Master</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=item_master" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
    
            <div class="col-md-3">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Vehicle Master</h3>
                        <h4>Vehicle Master</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=vehicle_master" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    
    
        <div class="row">
            <div class="col-md-12">
                <h2>Add</h2>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Add Trip</h3>
                        <h4>Add Trip</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=trip" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
    
            <div class="col-md-3">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Driver Master</h3>
                        <h4>Driver Master</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=driver_master" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Item Master</h3>
                        <h4>Item Master</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=item_master" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
    
            <div class="col-md-3">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Vehicle Master</h3>
                        <h4>Vehicle Master</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=vehicle_master" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-12">
                <h2>Reports</h2>
            </div>
            <div class="col-md-4">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Fuel Usage Report</h3>
                        <h4>Fuel Usage Report</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=cleaner_master" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Vehicle</h3>
                        <h4>Driver Master</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=driver_master" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Item Master</h3>
                        <h4>Item Master</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=item_master" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Vehicle Master</h3>
                        <h4>Vehicle Master</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=vehicle_master" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Vehicle Master</h3>
                        <h4>Vehicle Master</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=vehicle_master" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Vehicle Master</h3>
                        <h4>Vehicle Master</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="home.php?url=vehicle_master" target="_blank" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>-->


</div>
</section>

