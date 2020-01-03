

<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Fuel Usage Report</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">


                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">

                    <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>


                    <a onclick="print();" class="btn btn-primary btn-sm" >
                        <span class="glyphicon glyphicon-print"></span> &nbsp; PRINT
                    </a>

                </div>
                <br>
                <div id="msg_box"  class="span12 text-center"  ></div>


                <div class="col-md-12">

                    <div class="form-group"></div>
                    <div class="form-group-sm">

                  
                 
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2 hidden" for="c_code">Code</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder=""  id="cdcode" class="form-control hidden input-sm" disabled="">
                            <input type="text" placeholder=""  id="uniq" class="form-control hidden input-sm">
                        </div>
                    </div>

                        <div class="form-group"></div>
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
                            <input type="text" placeholder="Date"  id="date"  class="form-control dt input-sm">
                        </div>

                    </div>


                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">From</label>
                        <div class="col-sm-2">
                            <input type="date" placeholder="From"  id="from_txt" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="c_code">To</label>
                        <div class="col-sm-2">
                            <input type="date" placeholder="To" id="to_txt" class="form-control  input-sm">
                        </div>
                    </div> 

                    
                </div>

            </div>
        </form>
    </div>

</section>
<script src="js/fuel_usage.js"></script>


<script>newent();</script>




