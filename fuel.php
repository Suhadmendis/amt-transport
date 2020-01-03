<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Fuel</b></h3>
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
                    <a onclick="NewWindow('search_fuel.php?stname=Master', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                    <a onclick="print();" class="btn btn-primary btn-sm" >
                        <span class="glyphicon glyphicon-print"></span> &nbsp; PRINT
                    </a>
                    <a style="float: right;margin-right: 10px;" onclick="NewWindow('list_fuel.php', 'mywin', '1920', '1080', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; List
                    </a>
                    
                    <a style="float: right;margin-right: 10px;" onclick="NewWindow('list_all_fuel.php', 'mywin', '1920', '1080', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; List All
                    </a>
                </div>
                <br>
                <div id="msg_box"  class="span12 text-center"  ></div>


                <div class="col-md-12">
                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Fuel Ref</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder=""  id="fuel_ref" class="form-control  input-sm" disabled="">
                            <input type="text" placeholder=""  id="uniq" class="form-control hidden input-sm">
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Vehicle Ref</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Vehicle Ref"  id="vehicle_ref" class="form-control  input-sm">
                        </div>
                       
                        <div class="col-sm-2">
                            <input type="text" placeholder="Vehicle Name"  id="vehicle_number" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-1">
                            <a href="" onclick="NewWindow('search_vehicle_master1.php?stname=fuel', 'mywin', '800', '700', 'yes', 'center');
                                    return false" onfocus="this.blur()">
                                <input type="button" name="searchcusti" id="searchcusti" value="..." class="btn btn-default btn-sm">
                            </a>
                        </div>
                        <label class="col-sm-1" for="c_code">Date</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Date"  id="date" class="form-control dt input-sm">
                        </div>

                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Fuel Type</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Fuel Type"  id="fuel_type_Text" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Rate" onkeyup="ltesCal();" id="rate" class="form-control  input-sm">
                        </div>
                    </div> 

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Ltrs</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Ltrs" onkeyup="ltesCal();" id="ltrs" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Amount</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder=""  id="amount" class="form-control  input-sm">
                        </div>
                    </div>
                    
                     <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Voucher No.</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder=""  id="voucher_no" class="form-control  input-sm">
                        </div>
                    </div>





                    <!--                         <div class="col-sm-12">
                                        <div id="itemdetails" >
                                            <div id="getTable">
                                                <table id="myTable" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10%;">Rec No</th>
                                                            <th style="width: 20%;">Product Code</th>
                                                            <th style="width: 40%;">Product Description</th>
                                                            <th style="width: 20%;">Quantity</th>
                                                            <th style="width: 10%;">UOM</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" placeholder="Rec No" id="rec_no" class="form-control input-sm">
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="Product Code"  id="product_code" class="form-control input-sm">
                                                            </td>
                                                            <td>
                                                                <input  type="text" placeholder="Product Description"  id="product_description" class="form-control input-sm">
                                                            </td>
                                                            <td>
                                                                <input  type="text" placeholder="Quantity"  id="quantity" class="form-control input-sm">
                                                            </td>
                                                            <td>
                                                                <input  type="text" placeholder="UOM"  id="umo" class="form-control input-sm">
                                                            </td>
                                                            <td><a onclick="add_tmp();" class="btn btn-default btn-sm"> <span class="fa fa-plus"></span> &nbsp; </a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>-->


                    <!--                   <div>
                                       
                    
                    <div class="form-group">
                    
                                        <label class="col-sm-2 labelColour input-sm" >Supplier</label>
                                        <div class="col-sm-2 form-group-sm">
                                            //<?php
//                        echo"<select id = \"supplier\" class =\"form-control input-sm\">";
//                        $sql = "select * from good_return_note_entry";
//                        foreach ($conn->query($sql) as $row) {
//                            echo "<b><option value='" . $row["supplier"] . "'>" . $row["supplier"] . "</option></b>";
//                        }
//                        echo"</select>";
//                        
                    ?>
                                        </div>
                                    </div>
                    
                    
                                    </div>    -->

                    <!--  <div class="col-sm-12">
                                        <div id="itemdetails" >
                                            <div id="getTable">
                                                <table id="myTable" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10%;">Rec No</th>
                                                            <th style="width: 20%;">Product Code</th>
                                                            <th style="width: 40%;">Product Description</th>
                                                            <th style="width: 20%;">Quantity</th>
                                                            <th style="width: 10%;">UOM</th>
                                                            <th style="width: 10%;">Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" placeholder="Rec No" id="rec_no" class="form-control input-sm">
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="Product Code"  id="product_code" class="form-control input-sm">
                                                            </td>
                                                            <td>
                                                                <input  type="text" placeholder="Product Description"  id="product_description" class="form-control input-sm">
                                                            </td>
                                                            <td>
                                                                <input  type="text" placeholder="Quantity"  id="quantity" class="form-control input-sm">
                                                            </td>
                                                            <td>
                                                                <input  type="text" placeholder="UOM"  id="umo" class="form-control input-sm">
                                                            </td>
                                                            <td><a onclick="add_tmp();" class="btn btn-default btn-sm"> <span class="fa fa-plus"></span> &nbsp; </a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>-->

                </div>

            </div>
        </form>
    </div>

</section>
<script src="js/fuel.js"></script>


<script>newent();</script>




