<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b> Pay</b></h3>
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
                        
                   <!--  <a onclick="delete1();" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE
                    </a> -->
                    <a onclick="NewWindow('search_pay.php', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                   
                </div>
                <br>
                <div id="msg_box"  class="span12 text-center"></div>


                <div class="col-md-12">

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code"> Pay Ref</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Pay Ref"  id="pay_ref" class="form-control  input-sm" >
                            <input type="text" placeholder="Pay Ref"  id="uniq" class="form-control hidden input-sm">
                            <input type="text" placeholder="Pay Ref"  id="user" value="<?php echo $_SESSION['CURRENT_USER']; ?>" class="form-control hidden input-sm">
                        </div>
                         <div class="col-sm-1"></div>
                        <label class="col-sm-2" for="c_code">Date</label>
                        <div class="col-sm-3">
                            <input type="date" placeholder="Date"  id="pdate" class="form-control  input-sm">
                        </div>
                    </div>




                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Driver Ref</label>
                        <div class="col-sm-2">
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

                    </div>




                    <div class="col-sm-1"></div>
                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Amount</label>
                        <div class="col-sm-3">
                            <input type="number" placeholder="Amount" id="amount" class="form-control  input-sm">
                        </div>

                    </div>



                </div>

            </div>
        </form>
    </div>

</section>
<script src="js/pay.js"></script>


<script>newent();</script>




