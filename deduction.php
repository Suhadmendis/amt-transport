<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Deduction</b></h3>
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

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Deduction Ref</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="OD Ref"  id="od_ref" class="form-control  input-sm" >
                            <input type="text" placeholder="OD Ref"  id="uniq" class="form-control hidden input-sm">
                            <input type="text" placeholder="OD Ref"  id="user" value="<?php echo $_SESSION['CURRENT_USER']; ?>" class="form-control hidden input-sm">
                        </div>
                         <div class="col-sm-1"></div>
                        <label class="col-sm-2" for="c_code">Date</label>
                        <div class="col-sm-3">
                            <input type="date" placeholder="Date"  id="date" class="form-control  input-sm">
                        </div>
                    </div>


<!--                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Vehicle Ref</label>
                        <div class="col-sm-1">
                            <input type="text" placeholder="Vehicle Ref"  id="vehicle_ref" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Vehicle Name"  id="vehicle_number" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-1">
                            <a href="" onclick="NewWindow('search_vehicle_master1.php?stname=trip', 'mywin', '800', '700', 'yes', 'center');
                                    return false" onfocus="this.blur()">
                                <input type="button" name="searchcusti" id="searchcusti" value="..." class="btn btn-default btn-sm">
                            </a>
                        </div>
                        <label class="col-sm-2" for="c_code">Date</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Date"  id="date" class="form-control dt input-sm">
                        </div>

                    </div>-->
                    
<!--                     <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Item Ref</label>
                        <div class="col-sm-1">
                            <input type="text" placeholder="Item Ref"  id="item_ref" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Item Name"  id="item_name" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-1">
                            <a href="" onclick="NewWindow('search_item_master_file.php?stname=trip', 'mywin', '800', '700', 'yes', 'center');
                                    return false" onfocus="this.blur()">
                                <input type="button" name="searchcusti" id="searchcusti" value="..." class="btn btn-default btn-sm">
                            </a>
                        </div>
                        <label class="col-sm-2" for="c_code">Run No.</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Run No."  id="run_no" class="form-control  input-sm">
                        </div>

                       

                    </div>-->


                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Driver Ref</label>
                        <div class="col-sm-1">
                            <input type="text" placeholder="Driver Ref"  id="driver_ref" class="form-control  input-sm">
                        </div>
                        
                         <div class="col-sm-2">
                            <input type="text" placeholder="Driver Name"  id="driver_name" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-1">
                            <a href="" onclick="NewWindow('search_driver_master_file.php?stname=trip', 'mywin', '800', '700', 'yes', 'center');
                                     return false" onfocus="this.blur()">
                                <input type="button" name="searchcusti" id="searchcusti" value="..." class="btn btn-default btn-sm">
                            </a>
                        </div>
<!--                        <label class="col-sm-2" for="c_code">Cleaner Ref</label>
                        <div class="col-sm-1">
                            <input type="text" placeholder="Cleaner Ref"  id="cleaner_ref" class="form-control  input-sm">
                        </div>
                         <div class="col-sm-2">
                            <input type="text" placeholder="Cleaner Name"  id="cleaner_name" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-1">
                            <a href="" onclick="NewWindow('search_cleaner_master.php?stname=trip', 'mywin', '800', '700', 'yes', 'center');
                                     return false" onfocus="this.blur()">
                                <input type="button" name="searchcusti" id="searchcusti" value="..." class="btn btn-default btn-sm">
                            </a>
                        </div>-->
                    </div>



<!--                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">a</label>
                        <div class="col-sm-1">
                            <input type="text" placeholder="Opening KM" onkeyup="maileageCal();" id="opening_km" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-3"></div>
                        <label class="col-sm-2" for="c_code">Closing KM</label>
                        <div class="col-sm-1">
                            <input type="text" placeholder="Closing KM" onkeyup="maileageCal();" id="closing_km" class="form-control  input-sm">
                        </div>
                    </div>-->





<!--                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Maileage</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Maileage"  id="mileage" class="form-control  input-sm">
                        </div>

                    </div>-->
                    <div class="col-sm-1"></div>
                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Amount</label>
                        <div class="col-sm-3">
                            <input type="number" placeholder="Amount" onkeyup="paymentCal();" id="amount" class="form-control  input-sm">
                        </div>
<!--                         <div class="col-sm-1"></div>
                        <label class="col-sm-2" for="c_code">Monthes</label>
                        <div class="col-sm-3">
                            <input type="number" placeholder="Monthes"  id="monthes" class="form-control  input-sm">
                        </div>-->

                    </div>


<!--                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Driver Salary</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Driver Salary"  id="driver_salary" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2" for="c_code">Cleaner Salary</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Cleaner Salary"  id="cleaner_salary" class="form-control  input-sm">
                        </div>
                    </div>-->
<!--                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Department</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Department"  id="department" class="form-control  input-sm">
                        </div>
                       
                    </div>-->

<!--                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Remark</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Remark"  id="remark" class="form-control  input-sm">
                        </div>
                    </div>-->

                </div>

            </div>
        </form>
    </div>

</section>
<script src="js/deduction.js"></script>


<script>newent();</script>




